@extends('KetuaPssi.layout')

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
                <th data-field="name">UKM</th>
                <th data-field="name">Nama</th>
                <th data-field="price">NIM</th>
                <th data-field="price">No Tlp</th>
                <th data-field="price">Email</th>
                <th data-fiedl="price">Divisi</th>
                <th data-field="price">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($anggotas as $i => $anggota)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$anggota->mUkm->namaukm}}</td>
                    <td>{{$anggota->nama}}</td>
                    <td>{{$anggota->nim}}</td>
                    <td>{{$anggota->notlp}}</td>
                    <td>{{$anggota->email}}</td>
                    <td>{{$anggota->divisi}}</td>
                <td><a href="/detail/anggota/{{$anggota->idAnggota}}" class="waves-effect waves-light btn"><i class="material-icons left">reorder</i>Detail</a>

            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection