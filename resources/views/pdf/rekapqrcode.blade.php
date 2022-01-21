<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
</head>

<body>
    @if (!empty($split))

        @for ($i = 0; $i < $index; $i++)
            <table width="100%" cellspacing="0" cellpadding="3" border="1"
                style="font-family: Courier New; font-size: 10pt">
                <tr style="text-align: center">
                    @for ($j = 0; $j < $i + 1; $j++)
                        @if ($j % 2 == 0)
                            @foreach ($split[$j] as $val)
                                <td style="text-align: center">
                                    <div class="form-group" style="text-align: center">
                                        <img
                                            src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($val->id),) }}}">
                                    </div>
                                    <div class="form-group" style="text-align: center; font-size: 20px">
                                    <strong> {{ $val->to_rumah->nama }}-{{ $val->norumah }} </strong>
                                    </div>
                                </td>
                            @endforeach
                        @endif
                    @endfor

                    @for ($k = $j; $k <= $j; $k++)
                        @if ($k % 2 !== 0)
                            @foreach ($split[$k] as $val)
                                <td style="text-align: center">
                                    <div class="form-group" style="text-align: center">
                                        <img
                                            src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($val->id),) }}}">
                                    </div>
                                    <div class="form-group" style="text-align: center; font-size: 20px">
                                    <strong> {{ $val->to_rumah->nama }}-{{ $val->norumah }} </strong>
                                    </div>
                                </td>
                            @endforeach
                        @endif
                    @endfor
                </tr>
        @endfor
        </table>
    @endif

</body>

</html>
