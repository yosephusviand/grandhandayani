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

        $split = '';

                if(count($data) > 0){
                    foreach($data as $data){
                        $array[] = $data;
                    }
                    $split = array_chunk($array, 2);
                }
                
        $index = count($split);
        
        $pdf = PDF::loadView('pdf/rekapqrcode', compact('split', 'index'));

        return $pdf->stream('QRCode.pdf');
    }
}
