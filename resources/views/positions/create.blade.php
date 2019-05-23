@extends('layouts.admin')

@section('content')
    <h5 class="card-header">Membuat Posisi Baru</h5>
  <div class="card-body">
    <form action=" {{route('posisi.store')}} " class="form-horizontal" role="form" method="post" autocomplete="off">
    {{ csrf_field() }}

    <div class='form-group'>
        <div class="col-md-12">
            <label for="departemen" class="col-md-12 control-label">Departemen</label>
            <select name="departemen" class="col-md-12 form-control" autofocus="true" id="departemen">
                <option value='HRD'>HRD</option>
                <option value='GA'>GA</option>
                <option value='Purchasing'>Purchasing</option>
                <option value='IT'>IT</option>
                <option value='Engineering'>Engineering</option>
            </select>
            <div class="text-danger"></div>
        </div>
    </div>

    <div class='form-group'>
        <div class="col-md-12">
            <label for="posisi" class="col-md-12 control-label">Posisi</label>
            <input type="text" name="posisi" class="col-md-12 form-control" id="posisi">
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