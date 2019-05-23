@extends('layouts.admin')

@section('content')
    <h5 class="card-header">Mengubah Lowongan Baru</h5>
  <div class="card-body">
    <form action=" {{route('lowongan.update', $lowongan->id)}} " class="form-horizontal" role="form" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class='form-group'>
        <div class="col-md-12">
            <label for="posisi_id" class="col-md-12 control-label">Posisi - Dept</label>
            <select name="posisi_id" class="col-md-12 form-control" id="posisi_id">
                @foreach ($posisis as $posisi)
                    <option value="{!! $posisi->id !!}" {{$lowongan->posisi_id ==  $posisi->id ? "selected": ""}}>{!! $posisi->posisi !!} - {!! $posisi->departemen !!}</option>
                @endforeach
            </select>
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-12">
            <label for="deskripsi" class="col-md-12 control-label">Deskripsi Pekerjaan</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{!!$lowongan->deskripsi!!}</textarea>
            <div class="text-danger"></div>
        </div>
    </div>
    
    <div class='form-group'>
        <div class="col-md-12">
            <label for="pengalaman_minimal" class="col-md-12 control-label">Pengalaman Bekerja (dalam bulan)</label>
            <input type="number" name="pengalaman_minimal" class="form-control" value='{!!$lowongan->pengalaman_minimal!!}'>
            <div class="text-danger"></div>
        </div>
    </div>
    
    <div class='form-group'>
        <div class="col-md-12">
            <label for="pendidikan_minimal" class="col-md-12 control-label">Pendidikan Minimal</label>
            <select name="pendidikan_minimal" class="col-md-12 form-control" id="pendidikan">
                <option value='SD / MI / Sederajat' {{$lowongan->pendidikan_minimal == 'SD / MI / Sederajat' ? "selected": ""}}>SD / MI / Sederajat</option>
                <option value='SMP / Mts / Sederajat' {{$lowongan->pendidikan_minimal == 'SMP / Mts / Sederajat' ? "selected": ""}}>SMP / Mts / Sederajat</option>
                <option value='SMA / SMK / MA / Sederajat' {{$lowongan->pendidikan_minimal == 'SMA / SMK / MA / Sederajat' ? "selected": ""}}>SMA / SMK / MA / Sederajat</option>
                <option value='D1' {{$lowongan->pendidikan_minimal == 'D1' ? "selected": ""}}>D1</option>
                <option value='D2' {{$lowongan->pendidikan_minimal == 'D2' ? "selected": ""}}>D2</option>
                <option value='D3' {{$lowongan->pendidikan_minimal == 'D3' ? "selected": ""}}>D3</option>
                <option value='D4' {{$lowongan->pendidikan_minimal == 'D4' ? "selected": ""}}>D4</option>
                <option value='S1' {{$lowongan->pendidikan_minimal == 'S1' ? "selected": ""}}>S1</option>
                <option value='S2' {{$lowongan->pendidikan_minimal == 'S2' ? "selected": ""}}>S2</option>
            </select>
            <div class="text-danger"></div>
        </div>
    </div>
    
    <div class='form-group'>
        <div class="col-md-12">
            <label for="nilai_minimal" class="col-md-12 control-label">Nilai Minimal</label>
            <input type="number" step="any" min="0" name="nilai_minimal" class="form-control" value='{!!$lowongan->nilai_minimal!!}'>
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-12">
            <label for="deadline" class="col-md-12 control-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" value='{!!$lowongan->deadline!!}'>
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <input type="submit" class="btn btn-raised btn-primary" value="Ubah">
            <div class="clear"></div> 
        </div>
    </div>

    </form>
  </div>    
    @endsection