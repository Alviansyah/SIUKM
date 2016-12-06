@extends('Pengurus.layout')

@section('title')
    <h3 class="">Anggota</h3>
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
                <th data-field="name">Nama</th>
                <th data-field="price">NIM</th>
                <th data-field="price">TTL</th>
                <th data-field="price">Alamat</th>
                <th data-field="price">No Tlp</th>
                <th data-field="price">Email</th>
                <th data-field="price">Divisi</th>
                <th data-field="price">Password</th>
                <th data-field="price">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($anggotas as $i => $anggota)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$anggota->nama}}</td>
                <td>{{$anggota->nim}}</td>
                <td>{{$anggota->ttl}}</td>
                <td>{{$anggota->alamat}}</td>
                <td>{{$anggota->notlp}}</td>
                <td>{{$anggota->email}}</td>
                <td>{{$anggota->divisi}}</td>
                <td>{{$anggota->pass}}</td>
                <td><a href="/detail/anggota/{{$anggota->idAnggota}}" class="waves-effect waves-light"><i class="material-icons left">search</i></a>
                    <a href="/edit/anggota/{{$anggota->idAnggota}}" class="waves-effect waves-light"><i class="material-icons right">mode_edit</i></a></td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="/form/anggota" class="right btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
    @endsection