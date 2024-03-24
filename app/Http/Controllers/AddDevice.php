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
            'memory_configuration' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'cameras' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ограничиваем типы файлов и их размер
        ]);

        $existingDevice = DB::table('phone_specs')->where('name', $validatedData['name'])->exists();

        if ($existingDevice) {
            return redirect()->back()->with('error', 'This device already exists');
        }

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName); // Перемещаем загруженное изображение в public/images

        DB::table('phone_specs')->insert([
            'name' => $validatedData['name'],
            'date' => $validatedData['release_date'],
            'memory' => $validatedData['memory_configuration'],
            'SoC' => $validatedData['processor'],
            'cameras' => $validatedData['cameras'],
            'thumbnail' => $imageName, // Сохраняем имя файла в БД
        ]);

        return redirect()->route('home')->with('success', 'Added successfully');
    }

    public function update(Request $request,PhoneSpec $prphone)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z0-9+ ]+$/', 'max:255'],
            'release_date' => ['required', 'regex:/^\d{2}-\d{2}-\d{4}$/'],
            'memory_configuration' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'cameras' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ограничиваем типы файлов и их размер
        ]);

        $phone = DB::table('phone_specs')->select()->where($prphone->name);

        if ($phone == null) {
            return redirect()->back()->with('error', 'Device not found');
        }

        $updateData = [
            'name' => $validatedData['name'],
            'date' => $validatedData['release_date'],
            'memory' => $validatedData['memory_configuration'],
            'SoC' => $validatedData['processor'],
            'cameras' => $validatedData['cameras'],
        ];

        // Если загружено новое изображение, обновляем его
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName); // Перемещаем загруженное изображение в public/images
            $updateData['thumbnail'] = $imageName;
        }

        $phone->update($updateData);
        return redirect()->route('home')->with('success', 'Device updated successfully');
    }

}
