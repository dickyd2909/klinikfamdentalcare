<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Galeri;
use App\Models\Tentang;
use App\Models\User;
use App\Models\Counter;
use App\Models\Dokter;
use App\Models\Pasien;

class AdminController extends Controller
{
    public function index() {
        $countinformation = Tentang::count();
        $countcategory = Galeri::kategori()->count();
        //$countgallery = Galeri::vgaleri()->count();
        // $countorganization = Organisasi::count();
        $countuser = User::count();
        $countervisits = Counter::getCounterData();

        return view('admin.index', [
            'title' => "Beranda",
            'menu' => "home",
            'information_count' => $countinformation,
            'category_count' => $countcategory,
            //'gallery_count' => $countgallery,
            'user_count' => $countuser,
            'countervisit' => $countervisits,
        ]);
    }

    //dokter Page

    public function dokter() {
        $dokter = Dokter::paginate(8);

        return view('admin.dokter', [
            'title' => "Data dokter",
            'menu' => "dokter",
            'dokter' => $dokter,
        ]);
    }

    public function dokter_new() {
        return view('admin.dokter_new', [
            'menu' => "dokter",
            'title' => "Tambah dokter Baru",
        ]);
    }

    //Gallery Controller 

    public function gallery() {
        $gallery = Galeri::paginate(8);

        return view('admin.gallery', [
            'title' => "Galeri",
            'menu' => "galeri",
            'gallery' => $gallery,
       ]);
   }

    public function gallery_new() {
        $category = Galeri::kategori()->get();

        return view('admin.gallery_new', [
            'category' => $category,
            'menu' => "galeri",
            'title' => "Upload Foto Baru",
        ]);
    }

    //Activity Controller 

    public function activity() {

        return view('admin.activity', [
            'menu' => "kegiatan",
            'title' => 'Data Agenda Kegiatan',
        ]);
    }

    public function activity_new() {

        return view('admin.activity_new', [
            'menu' => "kegiatan",
            'title' => 'Data Agenda Kegiatan Baru'
        ]);
    }

    //Tentang

    public function about() {
        $about = Tentang::get();

        return view('admin.about', [
            'menu' => "informasi",
            'title' => 'Data Informasi Umum',
            'about' => $about,
        ]);
    }

    //Category Controller 

    public function kategori() {
        $category = Galeri::kategori()->paginate(20);

        return view('admin.gallery_category', [
            'category' => $category,
            'menu' => "kategori",
            'title' => "Kategori Foto"
        ]);
    }

    public function kategori_new() {

        return view('admin.gallery_category_new', [
            'menu' => "kategori",
            'title' => "Kategori Foto Baru"
        ]);
    }

    public function login() {
        return view('admin.login', [
            'title' => 'Login Page'
        ]);
    }

    public function account() {
        $account = User::paginate(20);

        return view('admin.account', [
            'menu' => "pengguna",
            'title' => 'Data Pengguna',
            'account' => $account
        ]);
    }

    public function account_new() {
        return view('admin.account_new', [
            'menu' => "pengguna",
            'title' => 'Data Pengguna Baru'
        ]);
    }

     //CPasien Controller

    public function pasien() {
        $pasien = Pasien::paginate(10);

        return view('admin.pasien', [
            'title' => 'pasien Page',
            'menu' => 'pasien',
            'pasien' => $pasien,
        ]);
    }
}
