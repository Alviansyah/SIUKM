@extends('Pengurus.layout')

@section('title')
    <h3 class="">Form SPJ</h3>
    <div class="divider"></div>
@endsection

@section('content')

    <!-- Items -->
    <div class="row">
        <div class="row">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m10 l8">
                        <form action='{{ isset($data)? "/spj/update/$data->idspj" : "/spj/add"" }}'
                              method="post" role="form" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            @if ($errors->first('idkegiatan'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('idkegiatan')  }}
                                </div>
                            @endif
                            <?php
                            $idkegiatan = old('idkegiatan');
                            $defaultidkegiatan = isset($data) ? $data->idkegiatan : "";
                            ?>
                            <div class="input-field">
                                <input value="{{ isset($idkegiatan) ? old('idkegiatan') :$defaultidkegiatan }}" name="idkegiatan" id="idkegiatan" type="text" class="validate">
                                <label for="idkegiatan" data-error="Invalid" data-success="Valid">ID Kegiatan</label>
                            </div>

                            @if ($errors->first('doc'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('doc')  }}
                                </div>
                            @endif
                            <?php
                            $doc = old('doc');
                            $defaultdoc = isset($data) ? $data->fileSPJ : "";
                            ?>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Upload Dokumen</span>
                                    <input name="doc" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input placeholder="Anggaran Dana Kegiatan" name="docName" value="{{ isset($doc) ? old('doc') : $defaultdoc }}" class="file-path validate" type="text">
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