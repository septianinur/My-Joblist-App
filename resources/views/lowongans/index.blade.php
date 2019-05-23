@extends('layouts.admin')

@section('content')

    <h5 class="card-header">Daftar Lowongan</h5>
    <div class="card-body">
        <a href="{{route('lowongan.create')}}"><button class='btn btn-primary btn-sm'>Tambah</button></a>
        @include('lowongans.list')
    </div>

@endsection