<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
</head>

<body>
    <table width="100%" cellspacing="0" cellpadding="3" border="1" style="font-family: Courier New; font-size: 10pt">
        @for ($i = 0; $i < count($data); $i++)
            <tr>
                <th>
                    @if ($i % 2 === 0)
                        {{-- {{ $i }} --}}
                        <div class="form-group" style="text-align: center">
                            <img
                                src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(120)->errorCorrection('H')->generate($data[$i]->id),) }}}">
                        </div>
                        <div class="form-group" style="text-align: center; font-size: 20px">
                            {{ $data[$i]->to_rumah->nama }}-{{ $data[$i]->norumah }}
                            {{ $data[$i]->nama }}
                        </div>

                    @endif
                </th>
                <th>
                    @if ($i % 2 === 1)

                        {{-- {{ $i }} --}}
                        <div class="form-group" style="text-align: center">
                            <img
                                src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(120)->errorCorrection('H')->generate($data[$i]->id),) }}}">
                        </div>
                        <div class="form-group" style="text-align: center; font-size: 20px">
                            {{ $data[$i]->to_rumah->nama }}-{{ $data[$i]->norumah }}
                            {{ $data[$i]->nama }}
                        </div>
                    @endif
                </th>
            </tr>
        @endfor
    </table>

</body>

</html>
