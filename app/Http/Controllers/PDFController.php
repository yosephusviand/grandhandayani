<?php

namespace App\Http\Controllers;

use App\Models\Models\Jimpitan;
use App\Models\Models\Warga;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generatePDF($id)
    {
        $data = Warga::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(300)->errorCorrection('H')->generate($data->id));

        $pdf = PDF::loadView('pdf/qrcode', compact('data', 'qrcode'));

        return $pdf->stream($data->nama . '_QRCode.pdf');
    }

    public function kosong(Request $request)
    {
        // $date   =   date($request->tahun .'-'. $request->bulan);
        // $date = date('F Y');
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $date = mktime(0, 0, 0, $request->bulan, 1, $request->tahun);
        $data   =   DB::select("SELECT a.*, b.*, c.*,d.*,e.*,f.*,g.*, h.*, i.*, j.*, k.*, l.*, m.*, n.*, o.*,p.*, q.*, r.*, s.*, t.*, u.*, v.*, w.*, x.*, y.*, z.*, aa.*, ab.*, ac.*, ad.*, ae.*, af.*,
        (IFNULL(b.nominal1,0) + IFNULL(c.nominal2,0) + IFNULL(d.nominal3,0) + IFNULL(e.nominal4,0) + IFNULL(f.nominal5,0) + IFNULL(g.nominal6,0) + IFNULL(h.nominal7,0) + IFNULL(i.nominal8,0) + IFNULL(j.nominal9,0) + IFNULL(k.nominal10,0) + IFNULL(l.nominal11,0) + IFNULL(m.nominal12,0) + IFNULL(n.nominal13,0) + IFNULL(o.nominal14,0) + IFNULL(p.nominal15,0) + IFNULL(q.nominal16,0) + IFNULL(r.nominal17,0) + IFNULL(s.nominal18,0) + IFNULL(t.nominal19 ,0)+ IFNULL(u.nominal20,0) + IFNULL(v.nominal21,0) + IFNULL(w.nominal22,0) + IFNULL(x.nominal23,0) + IFNULL(y.nominal24,0) + IFNULL(z.nominal25,0) + IFNULL(aa.nominal26,0) + IFNULL(ab.nominal27,0) + IFNULL(ac.nominal28,0) + IFNULL(ad.nominal29,0) + IFNULL(ae.nominal30,0) + IFNULL(af.nominal31,0)) as total
        FROM
        (
        SELECT
        warga.id as ida,
        warga.nama,
        rumah.nama as blok,
        warga.norumah as nomor
        FROM
        warga
        INNER JOIN rumah ON warga.block = rumah.id
        WHERE
        warga.status = 1
        ) as a
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idb,
        jimpitan.tanggal as tanggal1,
        jimpitan.nominal as nominal1
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-1')
        ) as b on a.ida = b.idb
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idc,
        jimpitan.tanggal as tanggal2,
        jimpitan.nominal as nominal2
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-2')
        ) as c on a.ida = c.idc
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idd,
        jimpitan.tanggal as tanggal3,
        jimpitan.nominal as nominal3
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-3')
        ) as d on a.ida = d.idd
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as ide,
        jimpitan.tanggal as tanggal4,
        jimpitan.nominal as nominal4
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-4')
        ) as e on a.ida = e.ide
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idf,
        jimpitan.tanggal as tanggal5,
        jimpitan.nominal as nominal5
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-5')
        ) as f on a.ida = f.idf
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idg,
        jimpitan.tanggal as tanggal6,
        jimpitan.nominal as nominal6
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-6')
        ) as g on a.ida = g.idg
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idh,
        jimpitan.tanggal as tanggal7,
        jimpitan.nominal as nominal7
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-7')
        ) as h on a.ida = h.idh
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idi,
        jimpitan.tanggal as tanggal8,
        jimpitan.nominal as nominal8
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-8')
        ) as i on a.ida = i.idi
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idj,
        jimpitan.tanggal as tanggal9,
        jimpitan.nominal as nominal9
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-9')
        ) as j on a.ida = j.idj
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idk,
        jimpitan.tanggal as tanggal10,
        jimpitan.nominal as nominal10
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-10')
        ) as k on a.ida = k.idk
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idl,
        jimpitan.tanggal as tanggal11,
        jimpitan.nominal as nominal11
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-11')
        ) as l on a.ida = l.idl
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idm,
        jimpitan.tanggal as tanggal12,
        jimpitan.nominal as nominal12
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-12')
        ) as m on a.ida = m.idm
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idn,
        jimpitan.tanggal as tanggal13,
        jimpitan.nominal as nominal13
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-13')
        ) as n on a.ida = n.idn
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as ido,
        jimpitan.tanggal as tanggal14,
        jimpitan.nominal as nominal14
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-14')
        ) as o on a.ida = o.ido
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idp,
        jimpitan.tanggal as tanggal15,
        jimpitan.nominal as nominal15
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-15')
        ) as p on a.ida = p.idp
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idq,
        jimpitan.tanggal as tanggal16,
        jimpitan.nominal as nominal16
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-16')
        ) as q on a.ida = q.idq
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idr,
        jimpitan.tanggal as tanggal17,
        jimpitan.nominal as nominal17
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-17')
        ) as r on a.ida = r.idr
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as ids,
        jimpitan.tanggal as tanggal18,
        jimpitan.nominal as nominal18
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-18')
        ) as s on a.ida = s.ids
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idt,
        jimpitan.tanggal as tanggal19,
        jimpitan.nominal as nominal19
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-19')
        ) as t on a.ida = t.idt
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idu,
        jimpitan.tanggal as tanggal20,
        jimpitan.nominal as nominal20
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-20')
        ) as u on a.ida = u.idu
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idv,
        jimpitan.tanggal as tanggal21,
        jimpitan.nominal as nominal21
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-21')
        ) as v on a.ida = v.idv
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idw,
        jimpitan.tanggal as tanggal22,
        jimpitan.nominal as nominal22
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-22')
        ) as w on a.ida = w.idw
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idx,
        jimpitan.tanggal as tanggal23,
        jimpitan.nominal as nominal23
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-23')
        ) as x on a.ida = x.idx
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idy,
        jimpitan.tanggal as tanggal24,
        jimpitan.nominal as nominal24
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-24')
        ) as y on a.ida = y.idy
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idz,
        jimpitan.tanggal as tanggal25,
        jimpitan.nominal as nominal25
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-25')
        ) as z on a.ida = z.idz
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idaa,
        jimpitan.tanggal as tanggal26,
        jimpitan.nominal as nominal26
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-26')
        ) as aa on a.ida = aa.idaa
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idab,
        jimpitan.tanggal as tanggal27,
        jimpitan.nominal as nominal27
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-27')
        ) as ab on a.ida = ab.idab
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idac,
        jimpitan.tanggal as tanggal28,
        jimpitan.nominal as nominal28
        FROM
        jimpitan
        where
        jimpitan.tanggal = ('$request->tahun-$request->bulan-28')
        ) as ac on a.ida = ac.idac
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idad,
        jimpitan.tanggal as tanggal29,
        jimpitan.nominal as nominal29
        FROM
        jimpitan
        where
        jimpitan.tanggal = DATE(IFNULL('$request->tahun-$request->bulan-29',NULL))
        ) as ad on a.ida = ad.idad
        LEFT JOIN
        (
        SELECT
        jimpitan.warga as idae,
        jimpitan.tanggal as tanggal30,
        jimpitan.nominal as nominal30
        FROM
        jimpitan
        where
        jimpitan.tanggal = DATE(IFNULL('$request->tahun-$request->bulan-30',NULL))
        ) as ae on a.ida = ae.idae
        LEFT JOIN
        (SELECT 
        jimpitan.warga as idaf,
        jimpitan.tanggal as tanggal31,
        jimpitan.nominal as nominal31
        FROM
        jimpitan
        where
        jimpitan.tanggal =  DATE(IFNULL('$request->tahun-$request->bulan-31',NULL))
        )as af on a.ida = af.idaf
        ORDER BY
        a.blok,
        a.nomor");

        $pdf = PDF::loadView('pdf/kosong', compact('date', 'data', 'tahun', 'bulan'))->setPaper('legal', 'landscape');

        return $pdf->stream($request->tahun . '-' . $request->bulan . '.pdf');
        // return view('pdf.kosong', compact('date','data','tahun', 'bulan'));
    }
}
