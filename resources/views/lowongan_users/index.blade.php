@extends('layouts.admin')

@section('content')

    <h5 class="card-header">Daftar User Melamar Lowongan</h5>
    <div class="card-body">
        @include('lowongan_users.list')
    </div>

@endsection