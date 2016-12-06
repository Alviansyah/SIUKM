@extends('layout')

@section('title')
    <h3 class="">Surat Keluar</h3>
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
                <th data-field="price">UKM</th>
                <th data-field="name">Jenis Surat</th>
                <th data-field="price">Nomor Surat</th>
                <th data-field="price">Nama Kegiatan</th>
                <th data-field="price">Validasi BEM</th>
                <th data-field="price">Validasi PD3</th>
                <th data-field="price">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($surats as $i => $surat)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$surat->mUKM->namaukm}}</td>
                    <td>{{$surat->jenisSurat}}</td>
                    <td>{{$surat->noSurat}}</td>
                    <td>{{$surat->namaKegiatan}}</td>
                    <td>{{$surat->validasiBEM == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}</td>
                    <td>@if($surat->validasiBEM == 1)
                            @if($surat->validasiPD3 == 0)
                                <a style="width: 180px" href="/validasi/pd3/surat/Keluar/{{$surat->idSurat}}" class="waves-effect waves-light btn"><i class="material-icons left">done</i>Validasi</a>
                            @else
                                Tervalidasi
                                <a href="/batal/pd3/surat/Keluar/{{$surat->idSurat}}" class="waves-effect waves-light btn"><i class="material-icons left">not_interested</i>Batal</a>
                            @endif
                        @else
                            {{$surat->validasiPD3 == 1 ? 'Tervalidasi' : 'Belum Divalidasi'}}
                        @endif
                    </td>
                    <td><a href="/download/surat/{{$surat->idSurat}}" class="waves-effect waves-light btn"><i class="material-icons left">play_for_work</i>Unduh</a>
                        <a href="/detail/surat/Keluar/{{$surat->idSurat}}" class="waves-effect waves-light btn"><i class="material-icons left">reorder</i>Detail</a>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection