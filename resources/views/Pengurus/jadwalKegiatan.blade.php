@extends('Pengurus.layout')

@section('title')
    <h3 class="">Jadwal Kegiatan</h3>
    <div class="divider"></div>
@endsection

@section('content')

    @if (Session::has('message'))
        <div class="card-panel blue lighten-2">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
    @foreach($data as $value)
        <div class="card grey lighten-4">
            <div class="card-content">
                <h5>{{$value->namaKegiatan}}</h5>
                <p>Waktu : {{$value->tglKegiatan}} | Tempat : {{$value->tempat}}</p>
                <p>{{$value->deskripsi}}</p>
            </div>
        </div>
        <div class="divider"></div>
    @endforeach
    </div>
@endsection