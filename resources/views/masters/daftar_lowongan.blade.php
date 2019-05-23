@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
    @foreach ($lowongans as $lowongan)
    <div class="col-md-4" style="margin:2% auto;">
            <div class="card" style="height: 200px;">
                <div class="card-body">
                    @foreach ($posisis as $posisi)
                        @if ($lowongan->posisi_id == $posisi->id)
                            <h4 class="card-title">{!! $posisi->posisi !!}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{!! $posisi->departemen !!}</h6>
                        @endif
                    @endforeach
                <p class="card-text">{!! str_limit($lowongan->deskripsi, 100) !!} ... </p>
                <hr>
                <a href=" {{url('detail_lowongan', $lowongan->id)}} " class="card-link" style="text-align: right">Detail Lowongan</a>
              </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection