@extends('Pengurus.layout')

@section('title')
    <h3 class="">Detail Anggota</h3>
    <div class="divider"></div>
@endsection

@section('content')

    <!-- Items -->
    <div class="row">
        <div class="row">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m10 l8">
                        <form>
                        {!! csrf_field() !!}

                        <!-- NAMA -->
                            @if ($errors->first('nama'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('nama')  }}
                                </div>
                            @endif
                            <?php
                            $nama = old('nama');
                            $defaultnama = isset($anggota) ? $anggota->nama : "";
                            ?>
                            <div class="input-field">
                                <input readonly value="{{ isset($nama) ? old('nama') :$defaultnama }}" name="nama" id="password"
                                       type="text" class="">
                                <label for="password" data-error="Invalid" data-success="Valid">Nama</label>
                            </div>

                            <!-- NIM -->
                            @if ($errors->first('nim'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('nim')  }}
                                </div>
                            @endif
                            <?php
                            $nim = old('nim');
                            $defaultnim = isset($anggota) ? $anggota->nim : "";
                            ?>
                            <div class="input-field">
                                <input readonly value="{{ isset($nim) ? old('nim') :$defaultnim }}" name="nim" id="nim" type="text" class="">
                                <label for="nim" data-error="Invalid" data-success="Valid">Nim</label>
                            </div>

                            <!-- TTL -->
                            @if ($errors->first('tl1'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('tl1')  }}
                                </div>
                            @endif
                            <?php
                            $tl1 = old('tl1');
                            $defaulttl1 = isset($anggota) ? $anggota->tempatlahir : "";
                            ?>
                            @if ($errors->first('tl2'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2">
                                    {{ $errors->first('tl2')  }}
                                </div>
                            @endif
                            <?php
                            $tl2 = old('tl2');
                            $defaulttl2 = isset($anggota) ? $anggota->tanggallahir : "";
                            ?>
                            <div class="input-field col s6">
                                <input readonly value="{{ isset($tl1) ? old('tl1') :$defaulttl1 }}" name="tl1" id="ttl" type="text" class="">
                                <label for="ttl" data-error="Invalid" data-success="Valid">Tempat Lahir</label>
                            </div>
                            <div class="input-field col s6">
                                <input readonly value="{{ isset($tl2) ? old('tl2') :$defaulttl2 }}" name="tl2" id="ttl" type="text" class="">
                                <label for="ttl" data-error="Invalid" data-success="Valid">Tanggal Lahir</label>
                            </div>

                            <!-- ALAMAT -->
                            @if ($errors->first('alamat'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2 col s12">
                                    {{ $errors->first('alamat')  }}
                                </div>
                            @endif
                            <?php
                            $alamat = old('alamat');
                            $defaultalamat = isset($anggota) ? $anggota->alamat : "";
                            ?>
                            <div class="input-field col s12">
                                <input readonly value="{{ isset($alamat) ? old('alamat') :$defaultalamat }}" name="alamat" id="Alamat" type="text" class="">
                                <label for="Alamat" data-error="Invalid" data-success="Valid">Alamat</label>
                            </div>

                            <!-- TELEPON -->
                            @if ($errors->first('notlp'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2 col s12">
                                    {{ $errors->first('notlp')  }}
                                </div>
                            @endif
                            <?php
                            $notlp = old('notlp');
                            $defaultnotlp = isset($anggota) ? $anggota->notlp : "";
                            ?>
                            <div class="input-field col s12">
                                <input readonly value="{{ isset($notlp) ? old('notlp') :$defaultnotlp }}" name="notlp" id="Nomor" type="text" class="">
                                <label for="Nomor" data-error="Invalid" data-success="Valid">Nomor Telepon</label>
                            </div>

                            <!-- EMAIL -->
                            @if ($errors->first('email'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2 col s12">
                                    {{ $errors->first('email')  }}
                                </div>
                            @endif
                            <?php
                            $email = old('email');
                            $defaultemail = isset($anggota) ? $anggota->email : "";
                            ?>
                            <div class="input-field col s12">
                                <input readonly value="{{ isset($email) ? old('email') :$defaultemail }}" name="email" id="email" type="email" class="">
                                <label for="email" data-error="Invalid" data-success="Valid">Email</label>
                            </div>

                            <!-- DIVISI -->
                            @if ($errors->first('divisi'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2  col s12">
                                    {{ $errors->first('divisi')  }}
                                </div>
                            @endif
                            <?php
                            $divisi = old('divisi');
                            $defaultdivisi = isset($anggota) ? $anggota->divisi : "";
                            ?>
                            <div class="input-field col s12">
                                <input readonly value="{{ isset($divisi) ? old('divisi') :$defaultdivisi }}" name="divisi" id="Divisi" type="text" class="">
                                <label for="Divisi" data-error="Invalid" data-success="Valid">Divisi</label>
                            </div>
                            <!-- PASSWORD -->
                            @if ($errors->first('pass'))
                                <div style="margin-bottom: 0; padding-bottom: 0;padding-top: 0" class="card-panel red lighten-2  col s12">
                                    {{ $errors->first('pass')  }}
                                </div>
                            @endif
                            <?php
                            $pass = old('pass');
                            $defaultpass = isset($anggota) ? $anggota->pass : "";
                            ?>
                            <div class="input-field col s12">
                                <input readonly value="{{ isset($pass) ? old('pass') :$defaultpass }}" name="pass" id="password" type="text" class="">
                                <label for="password" data-error="Invalid" data-success="Valid">Password</label>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection