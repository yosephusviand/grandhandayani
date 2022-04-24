@php
if ($bulan == 1) {
    $bulans = 'Januari';
} elseif ($bulan == 2) {
    $bulans = 'Februari';
} elseif ($bulan == 3) {
    $bulans = 'Maret';
} elseif ($bulan == 4) {
    $bulans = 'April';
} elseif ($bulan == 5) {
    $bulans = 'Mei';
} elseif ($bulan == 6) {
    $bulans = 'Juni';
} elseif ($bulan == 7) {
    $bulans = 'Juli';
} elseif ($bulan == 8) {
    $bulans = 'Agustus';
} elseif ($bulan == 9) {
    $bulans = 'September';
} elseif ($bulan == 10) {
    $bulans = 'Oktober';
} elseif ($bulan == 11) {
    $bulans = 'November';
} else {
    $bulans = 'Desember';
}
@endphp
<div>
    <h4 style="text-align: center">Rekap Jimpitan {{ $bulans }} {{ $tahun }}</h4>
</div>
<table width="100%" cellspacing="0" cellpadding="3" border="1" style="font-family: Courier New; font-size: 10px">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Rumah</th>
            <th colspan="31">Tanggal</th>
            <th rowspan="2">Total</th>
            <th rowspan="2">Tagihan</th>
        </tr>
        @php
            $e = 0;
        @endphp
        <tr>
            @for ($n = 1; $n <= date('t', $date); $n++)
                @php
                    $e = $n;
                @endphp
                <th>{{ $n }}</th>
            @endfor
        </tr>

    </thead>
    <tbody>
        @php
            $satu = 0;
            $dua = 0;
            $tiga = 0;
            $empat = 0;
            $lima = 0;
            $enam = 0;
            $tujuh = 0;
            $delapan = 0;
            $sembilan = 0;
            $sepuluh = 0;
            $sebelas = 0;
            $duabelas = 0;
            $tigabelas = 0;
            $empatbelas = 0;
            $limabelas = 0;
            $enambelas = 0;
            $tujuhbelas = 0;
            $delpanbelas = 0;
            $sembilanbelas = 0;
            $duabuluh = 0;
            $duasatu = 0;
            $duadua = 0;
            $duatiga = 0;
            $duaempat = 0;
            $dualima = 0;
            $duaenam = 0;
            $duatujuh = 0;
            $duadelapan = 0;
            $duasembilan = 0;
            $tigapuluh = 0;
            $tigasatu = 0;
            $nominal = 0;
            $tag = 0;
            $tagbulan = 0;
        @endphp
        @foreach ($data as $i => $val)
            @php
                $satu += $val->nominal1;
                $dua += $val->nominal2;
                $tiga += $val->nominal3;
                $empat += $val->nominal4;
                $lima += $val->nominal5;
                $enam += $val->nominal6;
                $tujuh += $val->nominal7;
                $delapan += $val->nominal8;
                $sembilan += $val->nominal9;
                $sepuluh += $val->nominal10;
                $sebelas += $val->nominal11;
                $duabelas += $val->nominal12;
                $tigabelas += $val->nominal13;
                $empatbelas += $val->nominal14;
                $limabelas += $val->nominal15;
                $enambelas += $val->nominal16;
                $tujuhbelas += $val->nominal17;
                $delpanbelas += $val->nominal18;
                $sembilanbelas += $val->nominal19;
                $duabuluh += $val->nominal20;
                $duasatu += $val->nominal21;
                $duadua += $val->nominal22;
                $duatiga += $val->nominal23;
                $duaempat += $val->nominal24;
                $dualima += $val->nominal25;
                $duaenam += $val->nominal26;
                $duatujuh += $val->nominal27;
                $duadelapan += $val->nominal28;
                $duasembilan += $val->nominal29;
                $tigapuluh += $val->nominal30;
                $tigasatu += $val->nominal31;
                if ($val->del != null) {
                    $nominal += 0;
                } else {
                    $nominal += $val->nominalbulan;
                }
                if ($val->deleted != null) {
                    $tagihan = 0;
                } elseif ($val->jim == 1) {
                    $tagihan = $e * 500 - $val->total;
                } elseif ($val->jim == 2) {
                    $tagihan = $val->nominalbulan;
                }
                $tag += $tagihan;
            @endphp
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $val->nama }}
                    @if ($val->deleted)
                        {{ ' (Deleted)' }}
                    @endif
                </td>
                <td>{{ $val->blok . ' ' . $val->nomor }}</td>
                @if ($val->jim == 1 and $val->deleted == null)
                    <td>{{ $val->nominal1 ?? '' }}</td>
                    <td>{{ $val->nominal2 ?? '' }}</td>
                    <td>{{ $val->nominal3 ?? '' }}</td>
                    <td>{{ $val->nominal4 ?? '' }}</td>
                    <td>{{ $val->nominal5 ?? '' }}</td>
                    <td>{{ $val->nominal6 ?? '' }}</td>
                    <td>{{ $val->nominal7 ?? '' }}</td>
                    <td>{{ $val->nominal8 ?? '' }}</td>
                    <td>{{ $val->nominal9 ?? '' }}</td>
                    <td>{{ $val->nominal10 ?? '' }}</td>
                    <td>{{ $val->nominal11 ?? '' }}</td>
                    <td>{{ $val->nominal12 ?? '' }}</td>
                    <td>{{ $val->nominal13 ?? '' }}</td>
                    <td>{{ $val->nominal14 ?? '' }}</td>
                    <td>{{ $val->nominal15 ?? '' }}</td>
                    <td>{{ $val->nominal16 ?? '' }}</td>
                    <td>{{ $val->nominal17 ?? '' }}</td>
                    <td>{{ $val->nominal18 ?? '' }}</td>
                    <td>{{ $val->nominal19 ?? '' }}</td>
                    <td>{{ $val->nominal20 ?? '' }}</td>
                    <td>{{ $val->nominal21 ?? '' }}</td>
                    <td>{{ $val->nominal22 ?? '' }}</td>
                    <td>{{ $val->nominal23 ?? '' }}</td>
                    <td>{{ $val->nominal24 ?? '' }}</td>
                    <td>{{ $val->nominal25 ?? '' }}</td>
                    <td>{{ $val->nominal26 ?? '' }}</td>
                    <td>{{ $val->nominal27 ?? '' }}</td>
                    <td>{{ $val->nominal28 ?? '' }}</td>
                    <td>{{ $val->nominal29 ?? '' }}</td>
                    <td>{{ $val->nominal30 ?? '' }}</td>
                    <td>{{ $val->nominal31 ?? '' }}</td>
                @elseif ($val->deleted != null)
                    <td colspan="31" style="text-align: center"><strong> Deleted </strong></td>
                @else
                    <td colspan="31" style="text-align: center"><strong> Bulanan </strong></td>
                @endif
                @if ($val->jim == 1)
                    <th style="text-align: right">{{ number_format($val->total, 0, ',', '.') ?? '' }}</th>
                @elseif($val->del != null)
                    <th style="text-align: right">{{ number_format(0, 0, ',', '.') ?? '' }}</th>
                @else
                    <th style="text-align: right">{{ number_format($val->nominalbulan, 0, ',', '.') ?? '' }}</th>
                @endif
                <th style="text-align: right">{{ number_format($tagihan, 0, ',', '.') }}</th>

            </tr>
        @endforeach
    </tbody>
    <tfoot>
        @php
            $total = $satu + $dua + $tiga + $empat + $lima + $enam + $tujuh + $delapan + $sembilan + $sepuluh + $sebelas + $duabelas + $tigabelas + $empatbelas + $limabelas + $enambelas + $tujuhbelas + $delpanbelas + $sembilanbelas + $duabuluh + $duasatu + $duadua + $duatiga + $duaempat + $dualima + $duaenam + $duatujuh + $duadelapan + $duasembilan + $tigapuluh + $tigasatu + $nominal;
        @endphp
        <tr>
            <th colspan="3">TOTAL</th>
            <th> {{ number_format($satu, 0, ',', '.') }}</th>
            <th> {{ number_format($dua, 0, ',', '.') }}</th>
            <th> {{ number_format($tiga, 0, ',', '.') }}</th>
            <th> {{ number_format($empat, 0, ',', '.') }}</th>
            <th> {{ number_format($lima, 0, ',', '.') }}</th>
            <th> {{ number_format($enam, 0, ',', '.') }}</th>
            <th> {{ number_format($tujuh, 0, ',', '.') }}</th>
            <th> {{ number_format($delapan, 0, ',', '.') }}</th>
            <th> {{ number_format($sembilan, 0, ',', '.') }}</th>
            <th> {{ number_format($sepuluh, 0, ',', '.') }}</th>
            <th> {{ number_format($sebelas, 0, ',', '.') }}</th>
            <th> {{ number_format($duabelas, 0, ',', '.') }}</th>
            <th> {{ number_format($tigabelas, 0, ',', '.') }}</th>
            <th> {{ number_format($empatbelas, 0, ',', '.') }}</th>
            <th> {{ number_format($limabelas, 0, ',', '.') }}</th>
            <th> {{ number_format($enambelas, 0, ',', '.') }}</th>
            <th> {{ number_format($tujuhbelas, 0, ',', '.') }}</th>
            <th> {{ number_format($delpanbelas, 0, ',', '.') }}</th>
            <th> {{ number_format($sembilanbelas, 0, ',', '.') }}</th>
            <th> {{ number_format($duabuluh, 0, ',', '.') }}</th>
            <th> {{ number_format($duasatu, 0, ',', '.') }}</th>
            <th> {{ number_format($duadua, 0, ',', '.') }}</th>
            <th> {{ number_format($duatiga, 0, ',', '.') }}</th>
            <th> {{ number_format($duaempat, 0, ',', '.') }}</th>
            <th> {{ number_format($dualima, 0, ',', '.') }}</th>
            <th> {{ number_format($duaenam, 0, ',', '.') }}</th>
            <th> {{ number_format($duatujuh, 0, ',', '.') }}</th>
            <th> {{ number_format($duadelapan, 0, ',', '.') }}</th>
            <th> {{ number_format($duasembilan, 0, ',', '.') }}</th>
            <th> {{ number_format($tigapuluh, 0, ',', '.') }}</th>
            <th> {{ number_format($tigasatu, 0, ',', '.') }}</th>
            <th style="text-align: right"> {{ number_format($total, 0, ',', '.') }}</th>
            <th style="text-align: right"> {{ number_format($tag, 0, ',', '.') }}</th>
        </tr>
    </tfoot>

</table>
