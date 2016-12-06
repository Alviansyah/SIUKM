@extends('Pengurus.layout')

@section('title')
    <h3 class="">Detail Surat Keluar</h3>
    <div class="divider"></div>
@endsection

@section('content')

    <!-- Items -->
    <div class="row">
        <div class="row">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m10 l8">
                        <form method="post" role="form" enctype="multipart/form-data" role="form">
                        {!! csrf_field() !!}
                        <!-- Basic Input Field-->

                            @if ($errors->first('jenis'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('jenis')  }}
                                </div>
                            @endif
                            <?php
                            $jenis = old('jenis');
                            $defaultjenis = isset($surat) ? $surat->jenisSurat : "";
                            ?>
                            <div class="input-field">
                                <div class="select-wrapper">
                                    <select disabled name="jenis">
                                        <option <?php if (isset($jenis) && $jenis == 'Perijinan') echo 'selected="selected"';
                                        elseif ($defaultjenis == "Perijinan") echo 'selected="selected"'; ?> value="Perijinan"
                                        >Surat Perijinan</option>
                                        <option <?php if (isset($jenis) && $jenis == 'Undangan') echo 'selected="selected"';
                                        elseif ($defaultjenis == "Undangan") echo 'selected="selected"'; ?>value="Undangan"
                                        >Surat Undangan</option>
                                        <option <?php if (isset($jenis) && $jenis == 'Peminjaman') echo 'selected="selected"';
                                        elseif ($defaultjenis == "Peminjaman") echo 'selected="selected"'; ?> value="Peminjaman"
                                        >Surat Peminjaman</option>
                                        <option <?php if (isset($jenis) && $jenis == 'Kerjasama') echo 'selected="selected"';
                                        elseif ($defaultjenis == "Kerjasama") echo 'selected="selected"'; ?> value="Kerjasama"
                                        >Surat Kerjasama</option>
                                    </select>
                                </div>
                                <label>Jenis Surat</label>
                            </div>
                            <br>
                            @if ($errors->first('nomor'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('nomor')  }}
                                </div>
                            @endif
                            <?php
                            $nomor = old('nomor');
                            $defaultnomor = isset($surat) ? $surat->noSurat : "";
                            ?>
                            <div class="input-field">
                                <input disabled value="{{ isset($nomor) ? old('nomor') :$defaultnomor }}" name="nomor"
                                       type="text" class="validate">
                                <label data-error="Invalid" data-success="Valid">Nomor Surat</label>
                            </div>

                            @if ($errors->first('hal'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('hal')  }}
                                </div>
                            @endif
                            <?php
                            $hal = old('hal');
                            $defaulthal = isset($surat) ? $surat->hal : "";
                            ?>
                            <div class="input-field">
                                <textarea disabled name="hal"
                                          type="text" class="materialize-textarea">{{ isset($hal) ? old('hal') :$defaulthal }}</textarea>
                                <label data-error="Invalid" data-success="Valid">Hal</label>
                            </div>

                            @if ($errors->first('nama'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('nama')  }}
                                </div>
                            @endif
                            <?php
                            $nama = old('nama');
                            $defaultnama = isset($surat) ? $surat->namaKegiatan : "";
                            ?>
                            <div class="input-field">
                                <input disabled value="{{ isset($nama) ? old('nama') :$defaultnama }}" name="nama"
                                       type="text" class="validate">
                                <label data-error="Invalid" data-success="Valid">Nama Kegiatan</label>
                            </div>


                            @if ($errors->first('waktu'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('waktu')  }}
                                </div>
                            @endif
                            <?php
                            $waktu = old('waktu');
                            $defaultwaktu = isset($surat) ? $surat->waktu : "";
                            ?>
                            <div class="input-field">
                                <input disabled value="{{ isset($waktu) ? old('waktu') :$defaultwaktu }}" name="waktu" id="ttl" type="text"
                                       class="datepicker validate">
                                <label for="ttl" data-error="Invalid" data-success="Valid">Waktu</label>
                            </div>

                            @if ($errors->first('tempat'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('tempat')  }}
                                </div>
                            @endif
                            <?php
                            $tempat = old('tempat');
                            $defaulttempat = isset($surat) ? $surat->tempat : "";
                            ?>
                            <div class="input-field">
                                <input disabled value="{{ isset($tempat) ? old('tempat') :$defaulttempat }}" name="tempat"
                                       type="text" class="validate">
                                <label data-error="Invalid" data-success="Valid">Tempat</label>
                            </div>

                            @if ($errors->first('tujuan'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('tujuan')  }}
                                </div>
                            @endif
                            <?php
                            $tujuan = old('tujuan');
                            $defaulttujuan = isset($surat) ? $surat->tujuan : "";
                            ?>
                            <div class="input-field">
                                <input disabled value="{{ isset($tujuan) ? old('tujuan') :$defaulttujuan }}" name="tujuan"
                                       type="text" class="validate">
                                <label data-error="Invalid" data-success="Valid">Tujuan</label>
                            </div>

                            <div class="input-field">
                                <input disabled value="{{$surat->namaKegiatan}}.{{$surat->mime}}" name="doc"
                                       type="text" class="validate">
                                <label data-error="Invalid" data-success="Valid">Tujuan</label>
                            </div>
                            <!-- Animated Basic Input Field-->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection