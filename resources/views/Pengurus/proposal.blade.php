@extends('Pengurus.layout')

@section('title')
    <h3 class="">Proposal</h3>
    <div class="divider"></div>
@endsection

@section('content')

    @if (Session::has('message'))
        <div class="card-panel blue lighten-2">{{ Session::get('message') }}</div>
        @endif
    <div class="row">
        <table class="responsive-table highlight">
            <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Kategori</th>
                <th>Tanggal Kegiatan</th>
                <th>Lokasi Kegiatan</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach($data as $value)
            <tr>
                <td>{{$value->namaKegiatan}}</td>
                <td>{{$value->kategori}}</td>
                <td>{{$value->tglKegiatan}}</td>
                <td>{{$value->tempat}}</td>
                <td>{{$value->deskripsi}}</td>
                <td>{{$value->fileProposal}}</td>
                <td><a href="/proposal/detail/{{$value->idkegiatan}}" class=""><i class="material-icons">search</i></a>
                    <a href="/proposal/edit/{{$value->idkegiatan}}" class=""><i class="material-icons">mode_edit</i></a>
                    <a href="/proposal/download/{{$value->idkegiatan}}" class=""><i class="material-icons">play_for_work</i></a></td>
                    
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/proposal/form" class="right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
    @endsection