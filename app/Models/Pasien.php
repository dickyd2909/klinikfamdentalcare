<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $keyType = 'string';

    protected $fillable = [
        'id_pasien',
        'nama_pasien',
        'tanggal_janji',
        'email_pasien',
        'no_hp_pasien',
        'alamat_pasien',
        'keluhan_pasien',
        'total_harga_pasien',
        'tindakan_pasien'
    ];

    public $incrementing = false;
    public $timestamps = false;

    //Generate Automatic ID
    public static function pasienGenerateID() {
        $id = Pasien::selectRaw('RIGHT (id_pasien, 3) AS id_pasien')->orderBy('id_pasien', 'desc')->limit(1)->get();

        $count = count($id);

        if ($count != null) {
            $idn = $id[0] -> id_pasien;

            $a = substr($idn, -3);

            $f = $a+1;

            $final = "PAS-00".$f;
        } else {
            $final = "PAS-001";
        }

        return $final;
    }

}