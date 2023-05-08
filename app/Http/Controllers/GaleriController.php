<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    // Fungsi Galeri

    public function gallery_submit(Request $request) {
        $img = $request->foto;
        $imgext = $request->foto->extension();
        $imgname = time().'-'.Galeri::galleryGenerateID().'.'.$imgext;

        $request->merge([
            'images' => $imgname,
            'id_galeri' => Galeri::galleryGenerateID(),
        ]);

        //Not makeing new category, directly add data to gallery
        if (is_null($request->kategori_new)) {
            $validated = $request->validate([
                'id_galeri' => 'required|unique:galeri',
                'judul' => 'required|max:100',
                'deskripsi' => 'required|max:300',
                'images' => 'required',
            ]);

            $query = Galeri::insert($validated);

        }

        $img->move(public_path('/img/gallery'), $imgname);

        if ($query == true) {
            return redirect('/admin-area/galeri')->with('success', 'Berhasil mengunggah foto.');
        } else {
            return redirect('/admin-area/galeri')->with('error', 'Terjadi kesalahan dalam mengunggah foto.');
        }
    }

    public function gallery_edit($id) {
        //Get data
		$gallery = Galeri::vgaleri()->where('id_galeri', decrypt($id))->get();

		//Send result to view 
		return view('admin.gallery_edit', [
            'gallery' => $gallery,
            'title' => 'Edit Foto',
            'menu' => 'galeri'
        ]);
    }

    public function gallery_update(Request $request) {
        $img = $request->foto;

        if ($img != null) {
            $imgext = $request->foto->extension();
            $imgname = time().'-'.$request->id_galeri.'.'.$imgext;

            $request->merge([
                'images' => $imgname,
            ]);

            $validated = $request->validate([
                'judul' => 'required|max:100',
                'deskripsi' => 'required|max:300',
                'images' => 'required',
            ]);
            
            Galeri::deleteImage($request->id_galeri);
            
            $query = Galeri::where('id_galeri', $request->id_galeri)->update($validated);

            $img->move(public_path('/img/gallery'), $imgname);
        } else {
            $validated = $request->validate([
                'judul' => 'required|max:100',
                'deskripsi' => 'required|max:300'
            ]);

            $query = Galeri::where('id_galeri', $request->id_galeri)->update($validated);
        }

        if ($query == true) {
            return redirect('/admin-area/galeri')->with('success', 'Berhasil mengedit foto.');
        } else {
            return redirect('/admin-area/galeri')->with('error', 'Terjadi kesalahan dalam mengedit foto.');
        }
    }

    public function gallery_delete($id) {
        Galeri::deleteImage(decrypt($id));

        $query = Galeri::destroy(decrypt($id));

		if ($query == true) {
            return redirect('/admin-area/galeri')->with('success', 'Berhasil menghapus foto.');
        } else {
            return redirect('/admin-area/galeri')->with('error', 'Terjadi kesalahan dalam menghapus foto.');
        }
	}

    public function gallery_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Galeri::vgaleri()->where('judul', 'like',$validated)->orWhere('id_galeri', 'like',$validated)->paginate(8);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data galeri tidak ditemukan.');
            } else {
                return view('admin.gallery', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'galeri',
                    'gallery' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }

   

   
}
