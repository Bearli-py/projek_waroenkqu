<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimoniRequest;
use App\Models\Testimoni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TestimoniController extends Controller
{
    public function index(): View
    {
        $testimonis = Testimoni::latest()->paginate(20);

        return view('admin.testimoni.index', compact('testimonis'));
    }

    public function create(): View
    {
        return view('admin.testimoni.create');
    }

    public function store(TestimoniRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('images/testimoni', 'public');
            $data['avatar'] = basename($path);
        }

        Testimoni::create($data);

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dibuat.');
    }

    public function edit(Testimoni $testimoni): View
    {
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(TestimoniRequest $request, Testimoni $testimoni): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            if ($testimoni->avatar && Storage::disk('public')->exists('images/testimoni/'.$testimoni->avatar)) {
                Storage::disk('public')->delete('images/testimoni/'.$testimoni->avatar);
            }

            $path = $request->file('avatar')->store('images/testimoni', 'public');
            $data['avatar'] = basename($path);
        }

        $testimoni->update($data);

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimoni $testimoni): RedirectResponse
    {
        if ($testimoni->avatar && Storage::disk('public')->exists('images/testimoni/'.$testimoni->avatar)) {
            Storage::disk('public')->delete('images/testimoni/'.$testimoni->avatar);
        }

        $testimoni->delete();

        return redirect()
            ->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}