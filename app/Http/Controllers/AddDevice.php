<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AddDevice extends Controller
{
    public function adding(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'memory_configuration' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'cameras' => 'required|string|max:255',
            'image_link' => 'required|url',
        ]);

        $existingDevice = false;
        $phones = DB::select('select * from phone_specs');
        foreach ($phones as $phone){
            if($validatedData['name'] == $phone->name) { $existingDevice = true;}
        }

        if ($existingDevice) {
            return redirect()->back()->with('error', 'This device already exists');
        }

        DB::insert('insert into phone_specs (name, date, memory, SoC, cameras, thumbnail) values (?,?,?,?,?,?)',[$validatedData['name'],
            $validatedData['release_date'],$validatedData['memory_configuration'],$validatedData['processor'],
            $validatedData['cameras'],$validatedData['image_link']]);

        return redirect()->route('home')->with('success', 'Added successfully');
    }
}
