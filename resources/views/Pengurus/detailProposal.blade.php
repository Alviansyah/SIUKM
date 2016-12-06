@extends('Pengurus.layout')

@section('title')
    <h3 class="">Detail Proposal</h3>
    <div class="divider"></div>
@endsection

@section('content')
    <!-- Items -->
    <div class="row">
        <div class="row">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m10 l8">
                        <form action='{{ isset($data)? "/proposal/update/$data->idkegiatan" : "/proposal/add" }}' method="post" role="form" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            @if ($errors->first('namaKegiatan'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('namaKegiatan')  }}
                                </div>
                            @endif
                            <?php
                            $namaKegiatan = old('namaKegiatan');
                            $defaultnamaKegiatan = isset($data) ? $data->namaKegiatan : "";
                            ?>
                            <div class="input-field">
                                <input readonly value="{{ isset($namaKegiatan) ? old('namaKegiatan') :$defaultnamaKegiatan }}" name="namaKegiatan" id="namaKegiatan" type="text" class="">
                                <label for="namaKegiatan" data-error="Invalid" data-success="Valid">Nama Kegiatan</label>
                            </div>

                            @if ($errors->first('kategori'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('kategori')  }}
                                </div>
                            @endif
                            <?php
                            $kategori = old('kategori');
                            $defaultkategori = isset($data) ? $data->kategori : "";
                            ?>
                            <div class="input-field">
                                <div class="select-wrapper">    
                                    <input readonly value="{{ isset($kategori) ? old('kategori') : $defaultkategori }}" name="kategori" id="kategori" type="text" class="">
                                    <label for="kategori" data-error="Invalid" data-success="Valid">Kategori</label>
                                </div>
                            </div>

                            @if ($errors->first('tanggal'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('tanggal')  }}
                                </div>
                            @endif
                            <?php
                            $tanggalKegiatan = old('tanggalKegiatan');
                            $defaulttanggalKegiatan = isset($data) ? $data->tglKegiatan : "";
                            ?>
                            <div class="input-field">
                                <input readonly id="datepicker" name="tanggal" value="{{ isset($tanggalKegiatan) ? old('tanggalKegiatan') : $defaulttanggalKegiatan }}" type="text" class="">
                                <label for="datepicker">Tanggal Kegiatan</label>
                            </div>

                            @if ($errors->first('tempat'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('tempat')  }}
                                </div>
                            @endif
                            <?php
                            $tempat = old('tempat');
                            $defaulttempat = isset($data) ? $data->tempat : "";
                            ?>
                            <div class="input-field">
                                <input readonly value="{{ isset($tempat) ? old('tempat') : $defaulttempat }}" name="tempat" id="tempat" type="text" class="">
                                <label for="tempat" data-error="Invalid" data-success="Valid">Tempat Kegiatan</label>
                            </div>

                            @if ($errors->first('deskripsi'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('deskripsi')  }}
                                </div>
                            @endif
                            <?php
                            $deskripsi = old('deskripsi');
                            $defaultdeskripsi = isset($data) ? $data->deskripsi : "";
                            ?>
                            <div class="input-field">
                                <textarea readonly id="deskripsi" name="deskripsi" class="materialize-textarea">{{ isset($deskripsi) ? old('deskripsi') : $defaultdeskripsi }}</textarea>
                                <label for="deskripsi">Deskripsi</label>
                            </div>

                            @if ($errors->first('file'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('file')  }}
                                </div>
                            @endif
                            <?php
                            $file = old('file');
                            $defaultfile = isset($data) ? $data->fileProposal : "";
                            ?>
                            <div class="file-field input-field">
                                <div class="file-path-wrapper">
                                    <input readonly placeholder="Proposal Kegiatan" id="fileName" name="namaFile" value="{{ isset($file) ? old('file') : $defaultfile }}" class="file-path" type="text">
                                    <label for="fileName">File Proposal</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection