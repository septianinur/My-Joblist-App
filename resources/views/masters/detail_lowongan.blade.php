@extends('layouts.master')

@section('content')
<div class="col">
        <div class='col'>
            <div class="col-md-12" style="border: 2px solid #ddd; height: 250px; margin:10px;">
                    @foreach ($posisis as $posisi)
                        @if ($lowongan->posisi_id == $posisi->id)
                            <h4>{!! $posisi->posisi !!} | Dept. {!! $posisi->departemen !!} </h4>
                        @endif
                    @endforeach
                    <p>Deskripsi Pekerjaan : {!! $lowongan->deskripsi !!}</p>
                    <p>Pendidikan Minimal : {!! $lowongan->pendidikan_minimal !!}</p>
                    @if ($lowongan->pengalaman_minimal == 0)
                        <p> Fresh Graduate Dipersilahkan </p>
                    @else
                        <p> Pengalaman Kerja Minimal {{$lowongan->pengalaman_minimal}} bulan </p>
                    @endif
                    <footer>deadline : {!! $lowongan->deadline !!} </footer>
                @guest
                    Silahkan Masuk / Daftar untuk Apply
                    <a href="{{ route('login') }}" class='btn btn-primary btn-sm'>Login</a>
                    <a href="{{ route('register') }}"  class='btn btn-primary btn-sm'>Register</a>
                @endguest

                @if ( Auth::User()->hasRole('User') )
                    @forelse ($lowongan_users as $lowongan_user)
                        @if ($lowongan->id == $lowongan_user->lowongan_id && Auth::user()->id == $lowongan_user->user_id)
                            <button class="btn btn-primary btn-sm" disabled>APPLIED</button>
                        @else
                            <form action="{{route('lowongan_user.store')}}" method="POST">
                                {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$lowongan->id}}">
                                <button type="submit" class="btn btn-primary btn-sm">APPLY</button>
                            </form>
                        @endif
                    @empty
                        <form action="{{route('lowongan_user.store')}}" method="POST">
                            {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$lowongan->id}}">
                            <button type="submit" class="btn btn-primary btn-sm">APPLY</button>
                        </form>
                    @endforelse
                @endif
               
                </div>
        </div>
        
</div>


@endsection