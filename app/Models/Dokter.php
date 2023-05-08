<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $keyType = 'string';

    protected $fillable = [
        'id_dokter',
        'nama_dokter',
        'no_hp_dokter',
        'images',
        'email_dokter',
        'jadwal_dokter',
        'str_dokter',
        'sip_dokter',
    ];
    
    public $incrementing = false;
    public $timestamps = false;

    //Generate Automatic ID
    public static function dokterGenerateID() {
        $id = Dokter::selectRaw('RIGHT (id_dokter, 3) AS id_dokter')->orderBy('id_dokter', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_dokter;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "DOK-".$f;
        } else {
            $final = "DOK-1";
        }

        return $final;
    }

    public static function deleteImage($id) {
        $id = Dokter::where('id_dokter', $id)->get();

        $count = count($id);

        if ($count != null) {
            $img = (String) $id[0] -> images;
            $filepath = public_path('/img/dokter/'.$img);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
    }
}
