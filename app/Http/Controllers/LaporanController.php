<?php

namespace App\Http\Controllers;

use App\Models\Models\Warga;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan');
    }

    public function PDFQrcode()
    {
        $data = Warga::all();
        
        $pdf = PDF::loadView('pdf/rekapqrcode', compact('data'));

        return $pdf->stream('QRCode.pdf');
    }
}
