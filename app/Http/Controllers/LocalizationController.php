<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function setLanguage(Request $request, $locale)
    {
        session(['locale' => $locale]);

        return redirect()->back();
    }

}
