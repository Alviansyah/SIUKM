@extends('Pengurus.layout')

@section('title')
    <h3 class="">Surat Masuk</h3>
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
                <th data-field="id">#</th>
                <th data-field="name">Jenis Surat</th>
                <th data-field="price">Nomor Surat</th>
                <th data-field="price">Nama Kegiatan</th>
                <th data-field="price">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($surats as $i => $surat)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$surat->jenisSurat}}</td>
                    <td>{{$surat->noSurat}}</td>
                    <td>{{$surat->namaKegiatan}}</td>
                    <td><a href="/download/surat/{{$surat->idSurat}}" class="waves-effect waves-light btn"><i class="material-icons left">play_for_work</i>Unduh</a>
                        <a href="/detail/surat/Masuk/{{$surat->idSurat}}" class="waves-effect waves-light btn"><i class="material-icons left">reorder</i>Detail</a>
                        <a href="/edit/surat/Masuk/{{$surat->idSurat}}" class="waves-effect waves-light btn"><i class="material-icons right">mode_edit</i>Ubah</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/form/surat/Masuk" class="right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
@endsection