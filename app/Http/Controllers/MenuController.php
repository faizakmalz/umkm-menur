<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Toko;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with(['menus.toko'])->get();
        $tokos = Toko::all();

        return view('pages.belanja', compact('categories', 'tokos'));
    }

    public function adminIndex(Toko $toko)
    {
        $menus = $toko->menus()->latest()->paginate(10);
        return view('admin.menus.index', compact('menus', 'toko'));
    }

    public function create(Toko $toko)
    {
        return view('admin.menus.create', compact('toko'));
    }

    public function store(Request $request, Toko $toko)
    {
        $data = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $data['toko_id'] = $toko->id;
        $toko->menus()->create($data);

        return redirect()->route('admin.menus.index', $toko)->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $menu->update($data);
        return redirect()->route('admin.menus.index', $menu->toko_id)->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('success', 'Menu berhasil dihapus.');
    }

}
