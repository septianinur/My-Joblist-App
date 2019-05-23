@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 3%">
        <div class="card border-info mb-3" style="margin: auto;width: 50%">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    <fieldset>
                        <legend>Masuk</legend>
                        <hr>
                        
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary" style="float: right">Masuk</button>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
