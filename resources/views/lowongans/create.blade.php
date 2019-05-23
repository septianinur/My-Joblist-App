@extends('layouts.admin')

@section('content')
    <h5 class="card-header">Membuat Lowongan Baru</h5>
  <div class="card-body">
    <form action=" {{route('lowongan.store')}} " class="form-horizontal" role="form" method="post" autocomplete="off">
    {{ csrf_field() }}

    <div class='form-group'>
        <div class="col-md-12">
            <label for="posisi_id" class="col-md-12 control-label">Posisi - Dept</label>
            <select name="posisi_id" class="col-md-12 form-control" id="posisi_id">
                @foreach ($posisis as $posisi)
                    <option value="{!! $posisi->id !!}">{!! $posisi->posisi !!} - {!! $posisi->departemen !!}</option>
                @endforeach
            </select>
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-12">
            <label for="deskripsi" class="col-md-12 control-label">Deskripsi Pekerjaan</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
            <div class="text-danger"></div>
        </div>
    </div>
    
    <div class='form-group'>
        <div class="col-md-12">
            <label for="pengalaman_minimal" class="col-md-12 control-label">Pengalaman Bekerja (0 jika fresh-graduate diperbolehkan)</label>
            <input type="number" name="pengalaman_minimal" class="form-control" placeholder="bulan">
            <div class="text-danger"></div>
        </div>
    </div>
    
    <div class='form-group'>
        <div class="col-md-12">
            <label for="pendidikan_minimal" class="col-md-12 control-label">Pendidikan Minimal</label>
            <select name="pendidikan_minimal" class="col-md-12 form-control" id="pendidikan">
                <option value='SD / MI / Sederajat'>SD / MI / Sederajat</option>
                <option value='SMP / Mts / Sederajat'>SMP / Mts / Sederajat</option>
                <option value='SMA / SMK / MA / Sederajat'>SMA / SMK / MA / Sederajat</option>
                <option value='D1'>D1</option>
                <option value='D2'>D2</option>
                <option value='D3'>D3</option>
                <option value='D4'>D4</option>
                <option value='S1'>S1</option>
                <option value='S2'>S2</option>
            </select>
            <div class="text-danger"></div>
        </div>
    </div>
    
    <div class='form-group'>
        <div class="col-md-12">
            <label for="nilai_minimal" class="col-md-12 control-label">Nilai Minimal</label>
            <input type="number" step="any" min="0" name="nilai_minimal" class="form-control">
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-12">
            <label for="deadline" class="col-md-12 control-label">Deadline</label>
            <input type="date" name="deadline" class="form-control">
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <input type="submit" class="btn btn-raised btn-primary" value="Save">
            <div class="clear"></div> 
        </div>
    </div>

    </form>
  </div>    
    @endsection