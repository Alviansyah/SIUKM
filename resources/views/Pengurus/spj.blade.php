@extends('Pengurus.layout')

@section('title')
    <h3 class="">Surat Pertanggungjawaban</h3>
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
                <th>ID SPJ</th>
                <th>File</th>
                <th>Validasi Keuangan</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $value)
                <tr>
                    <td></td>
                    <td>{{$value->idspj}}</td>
                    <td>{{$value->namaFile}}</td>
                    <td>{{$value->validasi_BEM == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}</td>
                    <td><a href="/spj/download/{{$value->idspj}}" class=""><i class="material-icons">play_for_work</i></a>
                        <a href="/spj/edit/{{$value->idspj}}" class=""><i class="material-icons">mode_edit</i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/spj/form" class="right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
@endsection