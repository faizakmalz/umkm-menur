<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    //
    public function index()
    {
        $tokos = Toko::all(); // Fetch all toko entries
        return view('pages.tokos', compact('tokos'));
    }

    public function show($id)
    {
        $toko = Toko::with('menus')->findOrFail($id);
        return view('pages.toko-detail', compact('toko'));
    }

    public function adminIndex()
    {
        $tokos = Toko::latest()->paginate(30);
        return view('admin.tokos.index', compact('tokos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.tokos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'no_telepon' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'menus' => 'nullable|array',
            'menus.*.nama_menu' => 'required_with:menus|string|max:255',
            'menus.*.harga' => 'required_with:menus|numeric',
            'menus.*.deskripsi' => 'nullable|string',
            'menus.*.category_id' => 'nullable|exists:categories,id',
            'menus.*.gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama_toko', 'deskripsi', 'no_telepon']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // ✅ Create the toko first
        $toko = Toko::create($data);

        // ✅ Create new menus, if any
        $menuInputs = $request->input('menus', []);

        foreach ($menuInputs as $key => $menuData) {
            $menu = new Menu();
            $menu->toko_id = $toko->id;
            $menu->nama_menu = $menuData['nama_menu'];
            $menu->harga = $menuData['harga'];
            $menu->deskripsi = $menuData['deskripsi'] ?? '';
            $menu->category_id = $menuData['category_id'] ?? null;

            if ($request->hasFile("menus.$key.gambar")) {
                $menu->gambar = $request->file("menus.$key.gambar")->store('menus', 'public');
            }

            $menu->save();
        }

        return redirect()->route('admin.tokos.index')->with('success', 'Toko dan menunya berhasil ditambahkan.');
    }


    public function edit(Toko $toko)
    {
        $categories = \App\Models\Category::all();
        return view('admin.tokos.edit', compact('toko', 'categories'));
    }

    public function update(Request $request, Toko $toko)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'no_telepon' => 'nullable|string|max:20',
            'logo' => 'nullable|image|max:2048',
            'menus' => 'nullable|array',
            'menus.*.nama_menu' => 'required_with:menus|string|max:255',
            'menus.*.harga' => 'required_with:menus|numeric',
            'menus.*.deskripsi' => 'nullable|string',
            'menus.*.category_id' => 'nullable|exists:categories,id',
            'menus.*.gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama_toko', 'deskripsi', 'no_telepon']);

        if ($request->hasFile('logo')) {
            if ($toko->logo && Storage::disk('public')->exists($toko->logo)) {
                Storage::disk('public')->delete($toko->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $toko->update($data);

        $menuInputs = $request->input('menus', []);
        $existingMenuIds = [];

        foreach ($menuInputs as $key => $menuData) {
            $menuId = $menuData['id'] ?? null;

            if ($menuId) {
                $menu = Menu::where('id', $menuId)->where('toko_id', $toko->id)->first();
                if (!$menu) continue;
            }
            else {
                $menu = new Menu();
                $menu->toko_id = $toko->id;
            }

            $menu->nama_menu = $menuData['nama_menu'];
            $menu->harga = $menuData['harga'];
            $menu->deskripsi = $menuData['deskripsi'] ?? '';
            $menu->category_id = $menuData['category_id'] ?? null;

            if ($request->hasFile("menus.$key.gambar")) {
                if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                    Storage::disk('public')->delete($menu->gambar);
                }
                $menu->gambar = $request->file("menus.$key.gambar")->store('menus', 'public');
            }

            $menu->save();
            $existingMenuIds[] = $menu->id;
        }

        $toko->menus()->whereNotIn('id', $existingMenuIds)->delete();

        return redirect()->route('admin.tokos.index')->with('success', 'Toko dan menu berhasil diperbarui.');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();
        return back()->with('success', 'Toko berhasil dihapus.');
    }

}
