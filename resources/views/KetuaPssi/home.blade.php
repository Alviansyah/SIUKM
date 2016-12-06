@extends('KetuaPssi.layout')

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
                            <li><a href=""><text class="/adart/2016">View AD/ART</text></a></li>
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
                            <li><a href="/anggota"><text class="grey-text">Lihat Data Anggota</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Surat -->
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
                            <li><a href="/pengurus/2016"><text class="grey-text">View Data Pengurus</text></a></li>
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
                            <li><a href="/dana"><text class="grey-text">Anggaran Dana</text></a></li>
                            <li><a href=""><text class="grey-text">Dokumentasi</text></a></li>
                            <li><a href=""><text class="grey-text">Jadwal Kegiatan</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
</div>
    @endsection