@extends('Pengurus.layout')

@section('title')
    <h3 class="">Pengurus</h3>
    <div class="divider"></div>
@endsection

@section('content')

    @if (Session::has('message'))
        <div class="card-panel blue lighten-2">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <table class="highlight">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Periode Awal</th>
                <th>Periode Akhir</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $value)
                <tr>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->jabatan}}</td>
                    <td>{{$value->periodepelantikan}}</td>
                    <td>{{$value->periodeakhir}}</td>
                    <td><a href="/detail/anggota/{{$value->idAnggota}}" class=""><i class="material-icons">search</i></a>
                        <a href="/delete/pengurus/{{$value->idpengurus}}" class=""><i class="material-icons">not_interested</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/form/pengurus" class="right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
@endsection