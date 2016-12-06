@extends('KetuaPssi.layout')

@section('title')
    <h3 class="">AD/ART</h3>
    <div class="divider"></div>
@endsection

@section('content')

    @if (Session::has('message'))
        <div class="card-panel blue lighten-2">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        @foreach($tts as $tt)
            <a href="/pengurus/{{$tt}}" class="waves-effect waves-light btn">{{$tt}}</a>
        @endforeach
    </div>
    <div class="row">
        <table class="highlight">
            <thead>
            <tr>
                <th data-field="id">#</th>
                <th data-field="name">UKM</th>
                <th data-field="name">Tahun</th>
                <th data-field="name">AD</th>
                <th data-field="price">ART</th>
            </tr>
            </thead>

            <tbody>
            @foreach($ads as $i => $ad)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$ad->mUkm->namaukm}}</td>
                    <td>{{$ad->tahun}}</td>
                    <td>{{$ad->AD}}</td>
                    <td>{{$ad->ART }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection