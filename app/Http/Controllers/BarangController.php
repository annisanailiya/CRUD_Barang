<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('inventor.dashboard-inventor', compact('barangs'));
    }

    public function indexUser()
    {
        $barangs = Barang::all();
        return view('user.dashboard', compact('barangs'));
    }


    public function createBarang()
    {
        return view('inventor.tambah-barang');
    }

    public function storeBarang(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_baru' => 'required|integer',
            'stok_bekas' => 'required|integer',
            'kondisi' => 'required|string',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $barang = new Barang();
        $barang->nama_barang = $request->input('nama_barang');
        $barang->stok_baru = $request->input('stok_baru');
        $barang->stok_bekas = $request->input('stok_bekas');
        $barang->kondisi = $request->input('kondisi');
        $barang->kategori = $request->input('kategori');
        $barang->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('barang_images', 'public');
            $barang->gambar = $gambarPath;
        }

        $barang->save();

        return redirect()->route('inventor.dashboard-inventor')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function editBarang($id)
    {
        $barang = Barang::findOrFail($id);
        return view('inventor.edit-barang', compact('barang'));
    }

    public function updateBarang(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_baru' => 'required|integer|min:0',
            'stok_bekas' => 'required|integer|min:0',
            'kategori' => 'required|string|max:255',
            'kondisi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok_baru' => $request->stok_baru,
            'stok_bekas' => $request->stok_bekas,
            'kategori' => $request->kategori,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('inventor.dashboard-inventor')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroyBarang($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            $barang->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    public function detailBarang($id)
    {
        $barang = Barang::findOrFail($id);
        return view('inventor.detail-barang', compact('barang'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function showImage($id)
    {
        $barang = Barang::findOrFail($id);
        $image = $barang->gambar;
        $mimeType = mime_content_type($image);

        return Response::make($image, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="barang-'.$barang->id.'.'.$mimeType.'"',
        ]);
    }
}
