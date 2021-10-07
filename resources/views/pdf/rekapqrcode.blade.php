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
                    @for ($j = $i; $j < $i + 1; $j++)
                        @if ($j % 2 == 0)
                            <th>
                                @foreach ($split[$j] as $val)
                                    <table class="tb-first" style="width: 100%" border="1">
                                        <tr style="text-align: center">
                                            <td style="text-align: center">

                                                <div class="form-group" style="text-align: center">
                                                    <img
                                                        src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($val->id),) }}}">
                                                </div>
                                                <div class="form-group" style="text-align: center; font-size: 20px">
                                                    {{ $val->to_rumah->nama }}-{{ $val->norumah }}
                                                    {{ $val->nama }}
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                @endforeach
                            </th>
                        @endif
                    @endfor

                    @for ($k = $j; $k <= $j; $k++)
                        @if ($k % 2 !== 0)
                            <th>
                                @foreach ($split[$k] as $val)
                                <table class="tb-first" style="width: 100%" border="1">
                                    <tr style="text-align: center">
                                        <td style="text-align: center">

                                            <div class="form-group" style="text-align: center">
                                                <img
                                                    src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($val->id),) }}}">
                                            </div>
                                            <div class="form-group" style="text-align: center; font-size: 20px">
                                                {{ $val->to_rumah->nama }}-{{ $val->norumah }}
                                                {{ $val->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                @endforeach
                            </th>
                        @endif
                    @endfor

                </tr>
        @endfor
        </table>
    @endif

</body>

</html>
