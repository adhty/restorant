<?php

namespace App\Http\Controllers;

use App\Models\create;
use Illuminate\Http\Request;

class createController extends Controller
{
    // public function index(){
    //     $create = create::all();
    //     return view('Menu.index', compact('menu'));
        

    // }

    // public function create()
    // {
    //     return view('Menu.create');
    // }

    public function index()
    {
        $create = create::all();
        return view('Menu.index', compact('menu'));
    }
}
