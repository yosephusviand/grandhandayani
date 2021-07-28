<?php

namespace App\Http\Controllers;

use App\Models\Models\Warga;
use Illuminate\Http\Request;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $data = Warga::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($data->id));
        
        $pdf = PDF::loadView('pdf/qrcode', compact('data', 'qrcode'));

        return $pdf->download($data->nama.'_QRCode.pdf');
    }
}
