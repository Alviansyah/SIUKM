@extends('Pengurus.layout')

@section('title')
    <h3 class="">Form AD/ART</h3>
    <div class="divider"></div>
@endsection

@section('content')

    <!-- Items -->
    <div class="row">
        <div class="row">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m10 l8">
                        <form action='{{ isset($dana)? "/update/dana/$dana->idanggaran" : '/add/dana/' }}'
                              method="post" role="form" enctype="multipart/form-data" role="form">
                        {!! csrf_field() !!}
                        <!-- Basic Input Field-->
                            @if ($errors->first('nama'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('nama')  }}
                                </div>
                            @endif
                            <?php
                            $nama = old('nama');
                            $defaultnama = isset($dana) ? $dana->namakegiatan : "";
                            ?>
                            <div class="input-field">
                                <input value="{{ isset($nama) ? old('nama') :$defaultnama }}" name="nama" id="password"type="text" class="validate">
                                <label for="password" data-error="Invalid" data-success="Valid">Nama Kegiatan</label>
                            </div>

                            @if ($errors->first('doc'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('doc')  }}
                                </div>
                            @endif
                            <?php
                            $doc = old('doc');
                            $defaultdoc = isset($dana) ? $dana->anggarandanakegiatan : "";
                            ?>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Upload Dokumen</span>
                                    <input name="doc" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input placeholder="Anggaran Dana Kegiatan" name="doc2" value="{{ isset($doc) ? old('doc') : $defaultdoc }}" class="file-path validate" type="text">
                                </div>
                            </div>
                            <!-- Animated Basic Input Field-->


                            <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection