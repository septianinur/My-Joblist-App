@extends('layouts.admin')

@section('content')

    <h5 class="card-header">Daftar User</h5>
    <div class="card-body">
        <table class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>E-Mail</th>
                        {{-- <th>No. Telepon</th>
                        <th>Isi Profil</th> --}}
                    </tr>
                </thead>
                <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{!!$user->name!!}</td>
                    <td>{!!$user->email!!}</td>
                    {{-- @foreach ($user_details as $detail)
                        @if ($detail->user_id == $user->id)
                            <td>{!!$detail->no_telp!!}</td>
                            <td>Completed</td>
                        @else
                            <td>-</td>
                            <td>Belum Isi</td>
                        @endif
                    @endforeach --}}
                </tr>
            @endforeach
                </tbody>
            </table>
    </div>

@endsection