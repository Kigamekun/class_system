@extends('layouts.app')

@section('content')
    <div style="border-radius:20px;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);width: 230px;">
        <center>
            <h1><b>ABSENSI</b></h1>
        </center>
        <div style="width: 230px; display:flex; flex-wrap: wrap;">
            @for ($i = 1; $i < $hari + 1; $i++)
                @if (is_null(
                    \App\Models\absen::where(['user_id' => $user])->where(['tanggal' => $tahun . '-' . $bulan . '-' . $i])->first(),
                ))
                    <div title="{{ $i . '-' . $bulan . '-' . $tahun }}" style="height: 40px;width:40px !important;margin:2px;"
                        class="btn btn-danger"></div>
                @else
                    <div title="{{ $i . '-' . $bulan . '-' . $tahun }}" style="height: 40px;width:40px !important;margin:2px;"
                        class="btn btn-success"></div>
                @endif
            @endfor
        </div>
        <hr>
        <center>
            <button style="margin-bottom: 10px;" class="btn btn-info">Absen!</button>
        </center>
    </div>
@endsection
