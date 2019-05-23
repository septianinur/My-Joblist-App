@extends('layouts.admin')

@section('content')
    <h5 class="card-header">Membuat Posisi Baru</h5>
  <div class="card-body">
    <form action=" {{route('posisi.update', $posisi->id)}} " class="form-horizontal" role="form" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class='form-group'>
        <div class="col-md-12">
            <label for="departemen" class="col-md-12 control-label">Departemen</label>
            <select name="departemen" class="col-md-12 form-control" autofocus="true" id="departemen">
                <option value='HRD' {{$posisi->departemen == 'HRD' ? "selected": ""}}>HRD</option>
                <option value='GA' {{$posisi->departemen == 'GA' ? "selected": ""}}>GA</option>
                <option value='Purchasing' {{$posisi->departemen == 'Purchasing' ? "selected": ""}}>Purchasing</option>
                <option value='IT' {{$posisi->departemen == 'IT' ? "selected": ""}}>IT</option>
                <option value='Engineering' {{$posisi->departemen == 'Engineering' ? "selected": ""}}>Engineering</option>
            </select>
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-12">
            <label for="posisi" class="col-md-12 control-label">Posisi</label>
            <input type="text" name="posisi" class="col-md-12 form-control" id="posisi" value="{{$posisi->posisi}}">
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