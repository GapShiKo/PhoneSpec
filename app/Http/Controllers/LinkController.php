<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    public function click($id)
    {
        $link = DB::table('link_counter')->where('id', $id)->first();

        if (!$link) {
            return redirect()->back()->with('error', 'Link is not found');
        }

        $newCount = $link->count + 1;

        $flag = DB::table('link_counter')->where('id', $id)->update(['count' => $newCount]);

        if (!$flag) {
            return redirect()->back()->with('error', 'Error while updating');
        }

        return redirect($link->website);
    }
}
