<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
</head>

<body>
    <table cellspacing="0" cellpadding="3" border="1" style="font-family: Courier New; font-size: 10pt">
        <thead>
            <tr>
                <th>
                    <div class="form-group" style="text-align: center">
                        <img src="data:image/png;base64, {!! $qrcode !!}">
                    </div>
                    <div class="form-group" style="text-align: center">
                        {{ $data->nama }}
                    </div>
                    
                </th>
            </tr>
        </thead>
    </table>

</body>

</html>
