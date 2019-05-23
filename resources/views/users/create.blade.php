@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 3%">
        <div class="card border-info mb-3" style="margin: auto;width: 70%">
            <div class="card-body">
                <form class="form-horizontal" method="POST" action=" {{route('user_detail.store')}} " autocomplete="off" enctype="multipart/form-data">
                    <fieldset>
                    {{ csrf_field() }}
                    <legend>Data Diri</legend>
                    <hr>

                    <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">

                    <div class="form-group row">
                        <label for="pas_foto" class="col-sm-3 col-form-label">Pas Foto</label>
                        <div class="col-sm-9">
                            <input id="pas_foto" type="file" class="form-control" name="pas_foto" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            <input id="nik" type="number" class="form-control" name="nik" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                                <option value="laki-laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea id="alamat" class="form-control" name="alamat" style="max-height: 80px" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
                        <div class="col-sm-9">
                            <input id="no_telp" type="text" class="form-control" name="no_telp" placeholder="No Telepon">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="pendidikan_terakhir" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                        <div class="col-sm-9">
                            <select name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir">
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
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="nilai" class="col-sm-3 col-form-label">Nilai Rata - Rata / IPK</label>
                        <div class="col-sm-9">
                            <input type="number" step="any" min="0" name="nilai" class="form-control" placeholder="Nilai">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cv_path" class="col-sm-3 col-form-label">CV Path</label>
                        <div class="col-sm-9">
                            <input id="cv_path" type="file" class="form-control" name="cv_path" accept="application/pdf">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" style="float: right">
                                Register
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection
