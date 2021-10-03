<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
</head>

<body>
    <table width="100%" cellspacing="0" cellpadding="3" border="1" style="font-family: Courier New; font-size: 10pt">
        <thead>
            @foreach ( $data as $val)
            <tr>
                <th>
                    <div class="form-group" style="text-align: center">
                        <img src="data:image/png;base64,{{  base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($val->id)) }}}">
                    </div>
                    <div class="form-group" style="text-align: center; font-size: 20px">
                        {{ $val->to_rumah->nama }}-{{ $val->norumah }} {{ $val->nama }}
                    </div>
                    
                </th>
                {{-- <th></th>
                <th>
                    <div class="form-group" style="text-align: center">
                        <img src="data:image/png;base64,{{  base64_encode(QrCode::format('svg')->size(300)->errorCorrection('H')->generate($val->id)) }}}">
                    </div>
                    <div class="form-group" style="text-align: center; font-size: 20px">
                        {{ $val->to_rumah->nama }}-{{ $val->norumah }} {{ $val->nama }}
                    </div>
                    
                </th> --}}
            </tr>
            <tr>
                <th style="height: 10px"></th>
                {{-- <th></th>
                <th></th> --}}
            </tr>
            @endforeach
        </thead>
    </table>

</body>

</html>
