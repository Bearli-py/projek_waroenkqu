<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriRequest;
use App\Models\Galeri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GaleriController extends Controller
{
    public function index(): View
    {
        $galeris = Galeri::latest()->paginate(20);

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create(): View
    {
        return view('admin.galeri.create');
    }

    public function store(GaleriRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('filename')) {
            $path = $request->file('filename')->store('images/galeri', 'public');
            $data['filename'] = basename($path);
        }

        Galeri::create($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil diupload.');
    }

    public function edit(Galeri $galeri): View
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(GaleriRequest $request, Galeri $galeri): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('filename')) {
            if ($galeri->filename && Storage::disk('public')->exists('images/galeri/'.$galeri->filename)) {
                Storage::disk('public')->delete('images/galeri/'.$galeri->filename);
            }

            $path = $request->file('filename')->store('images/galeri', 'public');
            $data['filename'] = basename($path);
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri): RedirectResponse
    {
        if ($galeri->filename && Storage::disk('public')->exists('images/galeri/'.$galeri->filename)) {
            Storage::disk('public')->delete('images/galeri/'.$galeri->filename);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}