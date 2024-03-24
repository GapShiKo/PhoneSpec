<?php

namespace App\Http\Controllers;

use App\Models\PhoneSpec;
use Illuminate\Http\Request;
class PhoneShowController extends Controller
{
    public function show(PhoneSpec $phone)
    {
        return view('phone', ['phone' => $phone]);
    }

    public function edit(PhoneSpec $phone)
    {
        return view('edit', ['phone' => $phone]);
    }
}
