@extends('Pengurus.layout')

@section('title')
    <h3 class="">AD/ART</h3>
    <div class="divider"></div>
@endsection

@section('content')

    @if (Session::has('message'))
        <div class="card-panel blue lighten-2">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        
    </div>
    <div class="row">
        <table class="highlight">
            <thead>
            <tr>
                <th>File</th>
                <th>Tahun</th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $value)
                <tr>
                    <td>{{$value->namaFile}}</td>
                    <td>{{$value->tahun}}</td>
                    <td>
                        <a href="/adart/edit/{{$value->idadart}}" class=""><i class="material-icons left">mode_edit</i></a>
                        <a href="/adart/download/{{$value->idadart}}" class=""><i class="material-icons left">play_for_work</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/adart/form" class="right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
@endsection