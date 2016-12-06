@extends('Pengurus.layout')

@section('title')
    <h3 class="">Form Proposal</h3>
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
                                <input value="{{ isset($namaKegiatan) ? old('namaKegiatan') :$defaultnamaKegiatan }}" name="namaKegiatan" id="namaKegiatan" type="text" class="validate">
                                <label for="namaKegiatan" data-error="Invalid" data-success="Valid">Nama Kegiatan</label>
                            </div>

                            @if ($errors->first('kategori'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('kategori')  }}
                                </div>
                            @endif
                            <?php
                            $kategori = old('kategori');
                            $defaultkategori = isset($data) ? $data->idkategori : "0";
                            ?>
                            <div class="input-field">
                                <div class="select-wrapper">    
                                    <select id="kategori" name="kategori">
                                        <option value="" disabled <?php if($defaultkategori=="0") echo "selected"; ?>>Kategori</option>
                                        <option value="1" <?php if($defaultkategori=="1") echo "selected"; ?>>Honorarium</option>
                                        <option value="2" <?php if($defaultkategori=="2") echo "selected"; ?>>Pengadaan Barang dan Jasa</option>
                                        <option value="3" <?php if($defaultkategori=="3") echo "selected"; ?>>Konsumsi</option>
                                        <option value="4" <?php if($defaultkategori=="4") echo "selected"; ?>>Perjalanan Dinas</option>
                                    </select>
                                </div>
                            </div>

                            @if ($errors->first('tanggal'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('tanggal')  }}
                                </div>
                            @endif
                            <?php
                            $tanggalKegiatan = old('tanggalKegiatan');
                            $defaulttanggalKegiatan = isset($data) ? $data->tanggalKegiatan : "";
                            ?>
                            <div class="input-field">
                                <input id="datepicker" name="tanggal" value="{{ isset($tanggalKegiatan) ? old('tanggalKegiatan') : $defaulttanggalKegiatan }}" type="date" class="datepicker">
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
                                <input value="{{ isset($tempat) ? old('tempat') : $defaulttempat }}" name="tempat" id="tempat" type="text" class="validate">
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
                                <textarea id="deskripsi" name="deskripsi" class="materialize-textarea">{{ isset($deskripsi) ? old('deskripsi') : $defaultdeskripsi }}</textarea>
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
                                <div class="btn">
                                    <span>Upload Dokumen</span>
                                    <input name="file" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input placeholder="Proposal Kegiatan" name="namaFile" value="{{ isset($file) ? old('file') : $defaultfile }}" class="file-path validate" type="text">
                                </div>
                            </div>

                            <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection