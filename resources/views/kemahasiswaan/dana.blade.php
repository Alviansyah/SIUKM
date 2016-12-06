@extends('layout')

@section('title')
    <h3 class="">Anggaran Dana</h3>
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
                <th data-field="name">Nama Kegiatan</th>
                <th data-field="price">Dokumen Anggaran Dana</th>
                <th data-field="price">Validasi BEM</th>
                <th data-field="price">Validasi PD3</th>
                <th data-field="price">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($danas as $i => $dana)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$dana->mUKM->namaukm}}</td>
                    <td>{{$dana->namakegiatan}}</td>
                    <td>{{$dana->namakegiatan}}.{{$dana->mime}}</td>
                    <td>{{$dana->validasi_BEM == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}</td>
                    <td>{{$dana->validasi_PD3 == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}</td>
                    <td><a href="/download/dana/{{$dana->idanggaran}}" class="waves-effect waves-light btn"><i class="material-icons left">play_for_work</i>Unduh</a>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection