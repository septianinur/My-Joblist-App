@extends('layouts.admin')

@section('content')

    <h5 class="card-header">Daftar Posisi</h5>
    <div class="card-body">
        <a href="{{route('posisi.create')}}"><button class='btn btn-primary btn-sm'>Tambah</button></a>
        @include('positions.list')
    </div>

@endsection