<table class="table table-sm" width="100%" cellspacing="0" cellpadding="3" border="1"
    style="font-family: Courier New; font-size: 10pt">
    @foreach ($split as $div_item)
        <tr>
            @foreach ($div_item as $val)
                <td style="text-align: center; height: 200px">
                    <div class="form-group" style="text-align: center">
                        <img
                            src="data:image/png;base64,{{ base64_encode(QrCode::format('svg')->size(150)->errorCorrection('H')->generate($val->id),) }}}">
                    </div>
                    <div class="form-group" style="text-align: center; font-size: 20px">
                    <strong> {{ $val->to_rumah->nama }}-{{ $val->norumah }} </strong>
                    </div>
                </td>
            @endforeach
        </tr>
    @endforeach
</table>
