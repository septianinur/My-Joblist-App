@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 3%">
        <div class="card border-info mb-3" style="margin: auto;width: 50%">
            <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        <fieldset>
                        {{ csrf_field() }}
                        <legend>Daftar</legend>
                        <hr>
                        
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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
        </div>
        @endsection