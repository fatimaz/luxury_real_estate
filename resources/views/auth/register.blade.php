@extends('layouts.app')
@section('title')
    Register
@endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="container" >
            <div class="row">

                <div class="col-md-6">
                    <br>
                    <div class="profile-sidebar" style="border: 1px solid #d3ced2;background:#ffffff;">

                        <h2 class="text-center">Register</h2>
                        <hr>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}




                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12">
                            <label for="name" class="control-label">First Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} col-md-12">
                            <label for="lastname" class="control-label">Last Name</label>

                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                            <label for="email" class="control-label">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12">
                            <label for="password" class="control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group col-md-12">
                            <label for="password-confirm" class="control-label">Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<br>
                <div class="col-md-4" style="margin-left: 140px;border: 1px solid #d3ced2;">
                    <br>


                    <div class="container-info bottom-space">
                        <h2>Vous avez déjà un compte?</h2>
                        <p>Connectez-vous pour publier une annonce.</p>
                        <br>
                        <a href="{{ route('login') }}">
                            <button id="RegisterButton" class="button-open background-blue next">Connexion</button>
                        </a>
                    </div>

                </div>
             </div>
         </div>
    </div>
@endsection
