@extends('Pengurus.layout')

@section('title')
    <h3 class="center">WELCOME, {{Auth::user()->username}}</h3>
    <div class="divider"></div>
    @endsection

@section('content')
    <div class="row">
    <!-- AD/ART -->
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="large material-icons">insert_chart</i>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">AD/ART<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">AD/ART<i class="material-icons right">close</i></span>
                <div class="row">
                    <div class="col offset-s1 offset-m1 offset-l1">
                        <ul>
                            <li><a href=""><text class="grey-text">Upload AD/ART Baru</text></a></li>
                            <li><a href="/adart/2016" target="blank"><text class="grey-text">View AD/ART</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Anggota -->
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="large material-icons">supervisor_account</i>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">ANGGOTA<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Anggota<i class="material-icons right">close</i></span>
                <div class="row">
                    <div class="col offset-s1 offset-m1 offset-l1">
                        <ul>
                            <li><a href=""><text class="grey-text">Tambah Data Anggota</text></a></li>
                            <li><a href="/anggota" target="blank"><text class="grey-text">Lihat Data Anggota</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Surat -->
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="large material-icons">message</i>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">SURAT<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Surat<i class="material-icons right">close</i></span>
                <div class="row">
                    <div class="col offset-s1 offset-m1 offset-l1">
                        <ul>
                            <li><a href=""><text class="grey-text">Surat Perizinan</text></a></li>
                            <li><a href=""><text class="grey-text">Surat Undangan</text></a></li>
                            <li><a href=""><text class="grey-text">Surat Kerjasama</text></a></li>
                            <li><a href=""><text class="grey-text">Surat Peminjaman</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Pengurus -->
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="large material-icons">settings</i>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">PENGURUS<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Pengurus<i class="material-icons right">close</i></span>
                <div class="row">
                    <div class="col offset-s1 offset-m1 offset-l1">
                        <ul>
                            <li><a href=""><text class="grey-text">Update Data Pengurus</text></a></li>
                            <li><a href="/pengurus/2016"target="blank" ><text class="grey-text">View Data Pengurus</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kegiatan -->
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="large material-icons">grade</i>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">KEGIATAN<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Kegiatan<i class="material-icons right">close</i></span>
                <div class="row">
                    <div class="col offset-s1 offset-m1 offset-l1">
                        <ul>
                            <li><a href="/dana" target="blank"><text class="grey-text">Anggaran Dana</text></a></li>
                            <li><a href=""><text class="grey-text">Dokumentasi</text></a></li>
                            <li><a href=""><text class="grey-text">Jadwal Kegiatan</text></a></li>
                            <li><a href="/lpj"><text class="grey-text">LPJ</text></a></li>
                            <li><a href="/spj"><text class="grey-text">SPJ</text></a></li>
                            <li><a href=""><text class="grey-text">Proposal</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <div class="col s12 m6 l4">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="large material-icons">info_outline</i>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">TENTANG<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Tentang<i class="material-icons right">close</i></span>
                <div class="row">
                    <div class="col offset-s1 offset-m1 offset-l1">
                        <ul>
                            <li><a href=""><text class="grey-text">Deskripsi UKM</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection