<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $keyType = 'string';

    protected $fillable = [
        'id_galeri',
        'id_kategori',
        'judul',
        'deskripsi',
        'images',
        'nama_kategori',
    ];
    
    public $incrementing = false;
    public $timestamps = false;

    public static function vgaleri() {
        $query = DB::table('galeri');
        return $query;
    }

    public static function kategori() {
        $query = DB::table('kategori');
        return $query;
    }

    public static function deleteImage($id) {
        $id = Galeri::where('id_galeri', $id)->get();

        $count = count($id);

        if ($count != null) {
            $img = (String) $id[0] -> images;
            $filepath = public_path('/img/gallery/'.$img);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
    }

    //Generate Automatic ID : Gallery
    public static function galleryGenerateID() {
        $id = Galeri::selectRaw('RIGHT (id_galeri, 3) AS id_galeri')->orderBy('id_galeri', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_galeri;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "GL-".$f;
        } else {
            $final = "GL-1";
        }

        return $final;
    }

    public static function categoryGenerateID() {
        $id = Galeri::kategori()->selectRaw('RIGHT (id_kategori, 3) AS id_kategori')->orderBy('id_kategori', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_kategori;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "KT-".$f;
        } else {
            $final = "KT-1";
        }

        return $final;
    }
}
