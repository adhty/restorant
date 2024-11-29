<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('Menu.index', compact('menu'));
    }

    public function create()
    {
        return view('Menu.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar'=> 'required|image|mimes:jpeg,png,jpg'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public', $gambar->hashName());

        Menu::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar->hashName()
        ]);

        return redirect()->route('menu.index')->with('succes', 'Add Menu Succes');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);

        $menu->nama = $request->nama;
        $menu->harga = $request->harga;
        $menu->deskripsi = $request->deskripsi;

        if($request->file('gambar')){
            Storage::disk('local')->delete('public/', $menu->gambar);
            $gambar = $request->file('gambar');
            $gambar->storeAs('public', $gambar->hashName());
            $menu->gambar = $gambar->hashName();
        }
        $menu->update();
        return redirect()->route('menu.index')->with('succes', 'update Menu Succes');
    }

    public function destroy(Menu $menu){
        if($menu->gambar == "noimage.png"){
            Storage::disk('local')->delete('public/', $menu->gambar);
        }

        $menu->delete();

        return redirect()->Route('menu.index')->with('Success', 'Delete Menu Success');
    }

}
