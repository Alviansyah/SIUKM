@extends('Pengurus.layout')

@section('title')
    <h3 class="">Anggota Non Pengurus</h3>
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
                <th data-field="name">Jabatan</th>
                <th data-field="name">Nama</th>
                <th data-field="price">NIM</th>
                <th data-field="price">No Tlp</th>
                <th data-field="price">Email</th>
                <th data-field="price">Divisi</th>
                <th data-field="price">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($anggotas as $i => $anggota)
                @if(empty($anggota->mPengurus->idpengurus))
                <tr>
                    <td>{{$i+1}}</td>
                    <td><a style="display: @if($errors->first("jabatan$anggota->idAnggota")) none @else  @endif"
                           id="asli{{$anggota->idAnggota}}" class="asli"></a>
                        <form style="display: @if($errors->first("jabatan$anggota->idAnggota"))  @else none @endif"
                              id="isi{{$anggota->idAnggota}}" action="/add/pengurus/{{$anggota->idAnggota}}"
                              method="post" class="isi" role="form">
                            {!! csrf_field() !!}
                            <?php
                            $jabatan[$anggota->idAnggota] = old("jabatan$anggota->idAnggota");
                            $defaultjabatan[$anggota->idAnggota] = isset($pengurus) ? $pengurus->jabatan : "";
                            ?>
                            @if ($errors->first("jabatan$anggota->idAnggota"))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first("jabatan$anggota->idAnggota")  }}
                                </div>
                            @endif

                            <div class="input-field">
                                <input value="{{ isset($jabatan[$anggota->idAnggota]) ? $jabatan[$anggota->idAnggota] : $defaultjabatan[$anggota->idAnggota] }}"
                                       name="jabatan{{$anggota->idAnggota}}"  type="text" id="hasil{{$anggota->idAnggota}}" class="hasil">
                            </div>

                            <button id="simpan{{$anggota->idAnggota}}" type="submit" class="waves-effect waves-light btn">
                                Simpan</button>
                            <a onclick="cancelRetur({{$anggota->idAnggota}})" id="hapus{{$anggota->idAnggota}}"
                               class="waves-effect waves-light btn">
                                Batal</a>
                        </form>
                        <a style="display: @if($errors->first("jabatan$anggota->idAnggota")) none @else  @endif"
                           id="edit{{$anggota->idAnggota}}" onclick="editRetur({{$anggota->idAnggota}})"
                           class="waves-effect waves-light btn">
                            Tambah Jabatan</a>
                    </td>
                    <td>{{$anggota->nama}}</td>
                    <td>{{$anggota->nim}}</td>
                    <td>{{$anggota->notlp}}</td>
                    <td>{{$anggota->email}}</td>
                    <td>{{$anggota->divisi}}</td>
                    <td><a href="/detail/anggota/{{$anggota->idAnggota}}" class="waves-effect waves-light btn"><i class="material-icons left">reorder</i>Detail</a>
                </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection