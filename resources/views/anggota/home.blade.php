@extends('Anggota.layout')

@section('title')
    <h3 class="center">WELCOME, {{Auth::user()->username}}</h3>
    <div class="divider"></div>
    @endsection

@section('content')
    <div class="row">
    <!-- AD/ART -->
    <!-- Anggota -->
    <div class="col s6">
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
                            <li><a href=""><text class="/anggota">Lihat Data Anggota</text></a></li>
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
    <div class="col s6">
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
                            <li><a href=""><text class="/pengurus/2016">Data Pengurus</text></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kegiatan -->

    <!-- About -->

</div>
    @endsection