@extends('Pengurus.layout')

@section('title')
    <h3 class="">Form LPJ</h3>
    <div class="divider"></div>
@endsection

@section('content')

    <!-- Items -->
    <div class="row">
        <div class="row">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m10 l8">
                        <form action='{{ isset($data)? "/lpj/update/$data->idlpj" : "/lpj/add" }}'
                              method="post" role="form" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            @if ($errors->first('idspj'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('idspj')  }}
                                </div>
                            @endif
                            <?php
                            $idspj = old('idspj');
                            $defaultidspj = isset($data) ? $data->idspj : "";
                            ?>
                            <div class="input-field">
                                <input value="{{ isset($idspj) ? old('idspj') :$defaultidspj }}" name="idspj" id="idspj" type="text" class="validate">
                                <label for="idspj" data-error="Invalid" data-success="Valid">ID Kegiatan</label>
                            </div>

                            @if ($errors->first('doc'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('doc')  }}
                                </div>
                            @endif
                            <?php
                            $doc = old('doc');
                            $defaultdoc = isset($data) ? $data->fileLPJ : "";
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