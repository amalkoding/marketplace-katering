<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with(['user'])->where('user_id', auth()->user()->id)->get();

        return view('pages.merchant.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('pages.merchant.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('menu_photos', 'public');

        Menu::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $photoPath,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        return view('pages.merchant.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $menu->photo);
            $photoPath = $request->file('photo')->store('menu_photos', 'public');
            $menu->photo = $photoPath;
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        Storage::delete('public/' . $menu->photo);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
