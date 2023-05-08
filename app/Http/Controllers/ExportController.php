<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\PasienExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index()
    {
        return Excel::download(new PasienExport, 'Pasien.xlsx');
    }
}
