@extends('layout')

@section('title')
    <h3 class="">ORMAWA</h3>
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
                <th data-field="price">UKM</th>
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
                    <td>@if($dana->validasi_BEM == 0)
                        <a href="/validasi/bem/dana/{{$dana->idanggaran}}" class="waves-effect waves-light btn"><i class="material-icons left">done</i>Validasi</a>
                    @else
                            Tervalidasi
                        <a href="/batal/bem/dana/{{$dana->idanggaran}}" class="waves-effect waves-light btn"><i class="material-icons left">not_interested</i>Batal</a>
                    @endif</td>
                    <td>{{$dana->validasi_PD3 == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}</td>
                    <td><a href="/download/dana/{{$dana->idanggaran}}" class="waves-effect waves-light btn"><i class="material-icons left">play_for_work</i>Unduh</a>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection