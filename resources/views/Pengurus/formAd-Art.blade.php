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
                        <form action='{{ isset($data)? "/adart/update/$data->idadart" : "/adart/add" }}' method="post" role="form" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            <!-- File -->
                            @if ($errors->first('file'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('file')}}
                                </div>
                            @endif
                            <?php
                                $file = old('file');
                                $defaultfile = isset($data) ? $data->fileADART : "";
                            ?>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Upload Dokumen</span>
                                    <input name="file" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input placeholder="AD/ART" name="fileName" value="{{ isset($file) ? old('file') : $defaultfile }}" class="file-path validate" type="text">
                                </div>
                            </div>

                            <button class="right waves-effect waves-light btn" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection