@extends('Pengurus.layout')

@section('title')
    <h3 class="">Laporan Pertanggungjawaban</h3>
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
                <th>#</th>
                <th>ID Kegiatan</th>
                <th>File</th>
                <th>Validasi BEM</th>
                <th>Validasi PD III</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $value)
                <tr>
                    <td></td>
                    <td>{{$value->idlpj}}</td>
                    <td>{{$value->namaFile}}</td>
                    <td>{{$value->validasi_BEM == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}</td>
                    <td>{{$value->validasi_PD3 == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}</td>
                    <td><a href="/lpj/download/{{$value->idlpj}}" class="waves-effect waves-light btn"><i class="material-icons left">play_for_work</i></a>
                        <a href="/lpj/edit/{{$value->idlpj}}" class="waves-effect waves-light btn"><i class="material-icons right">mode_edit</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/lpj/form" class="right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
@endsection