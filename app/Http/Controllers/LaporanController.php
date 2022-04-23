<?php

namespace App\Http\Controllers;

use App\Models\Models\Warga;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.laporanlucid');
    }

    public function PDFQrcode()
    {
        $data = Warga::orderBy('block')->orderBy('norumah')->get();

        $split = '';

        if (count($data) > 0) {
            foreach ($data as $data) {
                $array[] = $data;
            }
            $split = array_chunk($array, 3);
        }

        $index = count($split);

        $pdf = PDF::loadView('pdf/newrekap', compact('split', 'index', 'data'));

        return $pdf->stream('QRCode.pdf');
    }
}
