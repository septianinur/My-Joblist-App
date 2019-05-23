@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 3%">
        <div class="card border-info mb-3" style="margin: auto;">
            <div class="card-body">
            @foreach ($user_detail as $detail)
                <blockquote class="blockquote">
                    <h2>Data Diri</h2>
                    <hr>
                        <table>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{$detail->nik}}</td>
                                <td rowspan="5"><img src=" {!! asset($detail->pas_foto) !!} " alt="" style="width:200px; height:200px; border-radius:100px; margin-bottom: 5%" class="img-responsive"/></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{Auth::user()->name}}</td>
                            </tr>    
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{$detail->jenis_kelamin}}</td>
                            </tr>   
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$detail->alamat}}</td>
                            </tr>  
                            <tr>
                                <td>No Telp</td>
                                <td>:</td>
                                <td>{{$detail->no_telp}}</td>
                            </tr>  
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{$detail->tempat_lahir}} , {{Auth::user()->tanggal_lahir}}</td>
                                <td></td>
                            </tr>  
                            <tr>
                                <td>Pendidikan Terakhir</td>
                                <td>:</td>
                                <td>{{$detail->pendidikan_terakhir}}</td>
                                <td></td>
                            </tr>  
                            <tr>
                                <td>Nilai</td>
                                <td>:</td>
                                <td>{{$detail->nilai}}</td>
                                <td></td>
                            </tr>  
                        </table>
                        <hr>

                        <a href="{{route('user_detail.edit', $detail->id)}}"><button class="btn btn-primary" style="float: right">
                                <i class="fas fa-cog"></i> Ubah Data Diri</button></a>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <div>
            <h3>Notifikasi CV</h3>
            <hr>
            <table class="table">
                <tr class="table-success">
                    <th>Posisi</th>
                    <th>Departemen</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Status CV</th>
                </tr>
                @foreach ($lowongan_users as $lowongan_user)
                    @if ($users->id == $lowongan_user->user_id)
                        <tr>
                        @foreach ($lowongans as $lowongan)
                            @if ($lowongan->id == $lowongan_user->lowongan_id)
                                @foreach ($posisis as $posisi)
                                    @if ($posisi->id == $lowongan->posisi_id)
                                        <td>{!!$posisi->posisi!!}</td>
                                        <td>{!!$posisi->departemen!!}</td>
                                    @endif
                                @endforeach
                                        <td>{!!$lowongan->deskripsi!!}</td>
                                        <td>{!!$lowongan->deadline!!}</td>
                            @endif
                        @endforeach
                            @if ($lowongan_user->status_cv == 'unread')
                                        <td><span class="badge badge-primary">Unread</span></td>
                            @endif
                            @if ($lowongan_user->status_cv == 'accept')
                                        <td><span class="badge badge-info">Accept</span></td>
                            @endif
                            @if ($lowongan_user->status_cv == 'reject')
                                        <td><span class="badge badge-danger">Reject</span></td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            </table>
            <hr>    
        </div>
    </div>
@endsection
