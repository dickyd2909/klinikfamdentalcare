<?php

namespace App\Exports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PasienExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pasien::select('nama_pasien', 'tanggal_janji', 'email_pasien', 'no_hp_pasien', 'alamat_pasien',
        'keluhan_pasien', 'total_harga_pasien', 'tindakan_pasien')->get();
    }

    public function headings(): array
    {
        return ["Nama Pasien", "Tanggal", "Email", "No HP", "Alamat", "Keluhan", "Total Harga", "Tindakan"];
    }
}
