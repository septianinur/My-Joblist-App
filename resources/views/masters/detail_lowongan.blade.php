@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row" style="margin-top: 3%">
            <div class="card border-info mb-3" style="margin: auto;">
                <div class="card-body">
                    <blockquote class="blockquote">
                    @foreach ($posisis as $posisi)
                        @if ($lowongan->posisi_id == $posisi->id)
                            <h3>{!! $posisi->posisi !!} | Dept. {!! $posisi->departemen !!}</h3>
                            <hr>
                        @endif
                    @endforeach
                        <p class="mb-0">Deskripsi Pekerjaan : {!! $lowongan->deskripsi !!}</p>
                        <p class="mb-0">Pendidikan Minimal : {!! $lowongan->pendidikan_minimal !!}</p>
                      
                    @if ($lowongan->pengalaman_minimal == 0)
                        <p> Fresh Graduate Dipersilahkan </p>
                    @else
                        <p> Pengalaman Kerja Minimal {{$lowongan->pengalaman_minimal}} bulan </p>
                    @endif
                        <hr>
                        <footer class="blockquote-footer">Deadline : {!! $lowongan->deadline !!}</footer>
                        <hr>
                        
                        <a href="{{ url('daftar_lowongan') }}"  class='btn btn-primary' style="float: left;">Kembali</a>
                        @guest
                            <a href="{{ route('register') }}"  class='btn btn-primary' style="float: right;">Daftar</a>
                        @else

                        @if ( Auth::User()->hasRole('User') )
                            @forelse ($lowongan_users as $lowongan_user)
                                @if (Auth::user()->user_details)
                                    @if ($lowongan->id == $lowongan_user->lowongan_id && Auth::user()->id == $lowongan_user->user_id)
                                        <button class="btn btn-primary" style="float: right" disabled>APPLIED</button>
                                    @else
                                        <form action="{{route('lowongan_user.store')}}" method="POST">
                                            {{ csrf_field() }}
                                        
                                            <input type="hidden" name="id" value="{{$lowongan->id}}">
                                            <button type="submit" class="btn btn-primary" style="float: right">APPLY</button>
                                        </form>
                                    @endif
                                @else
                                    <a  href="{{route('user_detail.create')}}"><button class="btn btn-primary" style="float: right">Isi Profil</button></a>
                                @endif
                                
                            @empty
                            
                            <form action="{{route('lowongan_user.store')}}" method="POST">
                            {{ csrf_field() }}
                            
                                <input type="hidden" name="id" value="{{$lowongan->id}}">
                                <button type="submit" class="btn btn-primary" style="float: right">APPLY</button>
                            </form>
                            
                            @endforelse
                        @endif
                        @endguest

                    </blockquote>
                </div>
            </div>
        </div>
    </div>
@endsection