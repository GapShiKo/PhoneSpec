<?php

namespace App\Http\Controllers;

use App\Models\PhoneSpec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddDevice extends Controller
{
    public function adding(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z0-9+ ]+$/', 'max:255'],
            'release_date' => ['required', 'regex:/^\d{2}-\d{2}-\d{4}$/'],
            'memory_configuration' => ['required', 'regex:/^[0-9,\/ ]+$/', 'max:255'],
            'processor' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/', 'max:255'],
            'cameras' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $existingDevice = DB::table('phone_specs')->where('name', $validatedData['name'])->exists();

        if ($existingDevice) {
            return redirect()->back()->with('error', 'This device already exists');
        }

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        DB::table('phone_specs')->insert([
            'name' => $validatedData['name'],
            'date' => $validatedData['release_date'],
            'memory' => $validatedData['memory_configuration'],
            'SoC' => $validatedData['processor'],
            'cameras' => $validatedData['cameras'],
            'thumbnail' => $imageName,
        ]);

        return redirect()->route('home')->with('success', 'Added successfully');
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z0-9+ ]+$/', 'max:255'],
            'release_date' => ['required', 'regex:/^\d{2}-\d{2}-\d{4}$/'],
            'memory_configuration' => ['required', 'regex:/^[0-9,\/ ]+$/', 'max:255'],
            'processor' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/', 'max:255'],
            'cameras' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $phone = DB::table('phone_specs')->where('id', $id)->first();

        if ($phone == null) {
            return redirect()->back()->with('error', 'Device not found'.$id.'error');
        }

        $updateData = [
            'name' => $validatedData['name'],
            'date' => $validatedData['release_date'],
            'memory' => $validatedData['memory_configuration'],
            'SoC' => $validatedData['processor'],
            'cameras' => $validatedData['cameras'],
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $updateData['thumbnail'] = $imageName;
        }

        $flag = DB::table('phone_specs')->where('id', $id)->update($updateData);

        if ($flag == null) {
            return redirect()->back()->with('error', 'Error during update');
        }

        return redirect()->route('home')->with('success', 'Device updated successfully');
    }

    public function delete($id)
    {
        $phone = DB::table('phone_specs')->where('id', $id)->first();

        if (!$phone) {
            return redirect()->back()->with('error', 'Device not found');
        }

        $flag = DB::table('phone_specs')->where('id', $id)->delete();

        if ($flag == null) {
            return redirect()->back()->with('error', 'Error during update');
        }

        if ($phone->thumbnail) {
            $imagePath = public_path('images') . '/' . $phone->thumbnail;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        return redirect()->route('home')->with('success', 'Device deleted successfully');
    }

}
