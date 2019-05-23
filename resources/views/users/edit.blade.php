@extends('layouts.master')

@section('content')

<div class="page-header">
    <h1 style="text-align: center">Biodata</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="{{route('user_detail.update', $user_detail->id)}}" autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
                <div class="form-group">
                    <div class="col-md-6">
                            <img src="{{ asset($user_detail->pas_foto) }}" height="50" />
                            <label for="pas_foto" class="control-label">Pas Foto</label>
                            <input id="pas_foto" type="file" class="form-control" name="pas_foto">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="nik" class="control-label">NIK</label>
                        <input id="nik" type="number" class="form-control" name="nik" autofocus value="{{$user_detail->nik}}">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                        <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin">
                            <option value="laki-laki" {{$user_detail->jenis_kelamin ==  "laki-laki" ? "selected": ""}}>Laki - Laki</option>
                            <option value="perempuan" {{$user_detail->jenis_kelamin ==  "perempuan" ? "selected": ""}}>Perempuan</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="alamat" class="control-label">Alamat</label>
                        <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat">{{$user_detail->alamat}}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="no_telp" class="control-label">No. Telepon</label>
                        <input id="no_telp" type="text" class="form-control" name="no_telp" value="{{$user_detail->no_telp}}">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{$user_detail->tempat_lahir}}">
                    </div>
                </div>
    
                <div class='form-group'>
                    <div class="col-md-6">
                        <label for="pendidikan_terakhir" class="control-label">Pendidikan Terakhir</label>
                        <select name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir">
                                <option value='SD / MI / Sederajat' {{$user_detail->pendidikan_terakhir == 'SD / MI / Sederajat' ? "selected": ""}}>SD / MI / Sederajat</option>
                                <option value='SMP / Mts / Sederajat' {{$user_detail->pendidikan_terakhir == 'SMP / Mts / Sederajat' ? "selected": ""}}>SMP / Mts / Sederajat</option>
                                <option value='SMA / SMK / MA / Sederajat' {{$user_detail->pendidikan_terakhir == 'SMA / SMK / MA / Sederajat' ? "selected": ""}}>SMA / SMK / MA / Sederajat</option>
                                <option value='D1' {{$user_detail->pendidikan_terakhir == 'D1' ? "selected": ""}}>D1</option>
                                <option value='D2' {{$user_detail->pendidikan_terakhir == 'D2' ? "selected": ""}}>D2</option>
                                <option value='D3' {{$user_detail->pendidikan_terakhir == 'D3' ? "selected": ""}}>D3</option>
                                <option value='D4' {{$user_detail->pendidikan_terakhir == 'D4' ? "selected": ""}}>D4</option>
                                <option value='S1' {{$user_detail->pendidikan_terakhir == 'S1' ? "selected": ""}}>S1</option>
                                <option value='S2' {{$user_detail->pendidikan_terakhir == 'S2' ? "selected": ""}}>S2</option>
                        </select>
                        <div class="text-danger"></div>
                    </div>
                </div>
    
                <div class='form-group'>
                    <div class="col-md-6">
                        <label for="nilai" class="control-label">Nilai Rata - Rata / IPK</label>
                        <input type="number" step="any" min="0" name="nilai" class="form-control" value="{{$user_detail->nilai}}">
                        <div class="text-danger"></div>
                    </div>
                </div>
                
                <div class="form-group">
                        <div class="col-md-6">
                            <label for="cv_path" class="control-label">CV Path</label>
                            <input id="cv_path" type="file" class="form-control" name="cv_path" placeholder="CV Path">
                        </div>
                    </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
