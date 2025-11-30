<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(): View
    {
        $menus = Menu::latest()->paginate(12);

        return view('admin.menu.index', compact('menus'));
    }

    public function create(): View
    {
        return view('admin.menu.create');
    }

    public function store(MenuRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images/menu', 'public');
            $data['gambar'] = basename($path);
        }

        Menu::create($data);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil dibuat.');
    }

    public function edit(Menu $menu): View
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(MenuRequest $request, Menu $menu): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($menu->gambar && Storage::disk('public')->exists('images/menu/'.$menu->gambar)) {
                Storage::disk('public')->delete('images/menu/'.$menu->gambar);
            }

            $path = $request->file('gambar')->store('images/menu', 'public');
            $data['gambar'] = basename($path);
        }

        $menu->update($data);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        if ($menu->gambar && Storage::disk('public')->exists('images/menu/'.$menu->gambar)) {
            Storage::disk('public')->delete('images/menu/'.$menu->gambar);
        }

        $menu->delete();

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}