<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PasienExport;

class PasienController extends Controller
{
    public function pasien_submit(Request $request) { 

        $query = $request->validate([
            'id_pasien' => 'unique:pasien',
            'nama_pasien' => 'required',
            'tanggal_janji' => 'required',
            'email_pasien' => 'required',
            'no_hp_pasien' => 'required',
            'alamat_pasien' => 'required',
            'keluhan_pasien' => 'required',
            'total_harga_pasien' => '',
            'tindakan_pasien' => ''
        ]); 

        $query = Pasien::insert($query);

        if ($query == true) {
            Alert::success('Berhasil', 'Success Message');
            return redirect('/appointment')->with('sent-message', 'Transaksi berhasil.');
        } else {
            return redirect('/appointment')->with('error', 'Terjadi kesalahan dalam menambahkan data pasien.');
        }
    }

    public function pasien_edit($id) {
        //Get data from 4 table
        $pasien = pasien::where('id_pasien', decrypt($id))->get();

        //Send result to view 
        return view('admin.pasien_edit', [
            'pasien' => $pasien,
            'title' => 'Pembayaran',
            'menu' => 'Pasien'
        ]);
    }

    public function pasien_delete($id) {
        Pasien::deleteImage(decrypt($id));

        $query = Pasien::destroy(decrypt($id));

		if ($query == true) {
            return redirect('/admin-area/pasien')->with('success', 'Berhasil menghapus data pasien.');
        } else {
            return redirect('/admin-area/pasien')->with('error', 'Terjadi kesalahan dalam menghapus data pasien.');
        }
	}

    public function pasien_update(Request $request) {        
    
            $query = $request->validate([
                'nama_pasien' => 'required',
                'tanggal_janji' => 'required',
                'email_pasien' => 'required',
                'no_hp_pasien' => 'required',
                'alamat_pasien' => 'required',
                'keluhan_pasien' => 'required',
                'total_harga_pasien' => 'required',
                'tindakan_pasien' => 'required'
            ]);

            $query = Pasien::where('id_pasien', $request->id_pasien)->update($query);
        if ($query == true) {
            return redirect('/admin-area/pasien')->with('success', 'Berhasil mengedit data pasien.');
        } else {
            return redirect('/admin-area/pasien')->with('error', 'Terjadi kesalahan dalam mengedit data pasien.');
        }
    }

    public function pasien_search(Request $request) {
        $request->merge([
            'cari' => '%'.$request->cari.'%',
        ]);

        $validated = $request->validate([
            'cari' => 'required',
        ]);

        $query = Pasien::where('id_pasien', 'like',$validated)->orWhere('nama_pasien', 'like',$validated)->orWhere('no_hp_pasien', 'like',$validated)->paginate(8);

        if ($query == true) {
            if (count($query) == 0) {
                return redirect()->back()->with('message', 'Data pasien tidak ditemukan.');
            } else {
                return view('admin.pasien', [
                    'title' => 'Hasil Pencarian : '.$request->cari,
                    'menu' => 'pasien',
                    'pasien' => $query,
                ]);
            }
        } else {
            return redirect()->back()->with('message', 'Terjadi kesalahan dalam pencarian data.');
        }
    }

    public function export(){
        return Excel::download(new PasienExport, 'Pasien.xlsx');
    }

}
