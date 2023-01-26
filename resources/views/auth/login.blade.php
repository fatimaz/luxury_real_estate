@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
        <div class="container" >
            <div class="row">

                <div class="col-md-6">
                    <br>
                    <div class="profile-sidebar" style="border: 1px solid #d3ced2;background:#ffffff;">

                                    <h2 class="text-center">Login</h2>
                                 <hr>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                                                <label for="email" class="control-label">E-Mail Address<em>*</em></label>

                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                             <strong>{{ $errors->first('email') }}</strong>
                                                         </span>
                                                    @endif

                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12">
                                                <label for="password" class="control-label">Password<em>*</em></label>
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                          <strong>{{ $errors->first('password') }}</strong>
                                                         </span>
                                                    @endif

                                            </div>
                                            <div class="form-group col-md-12">

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                        </label>
                                                    </div>

                                            </div>

                                            <div class="form-group col-md-12">

                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="fa fa-btn fa-sign-in" style="color:#ffffff"></i>
                                                        Login
                                                    </button>

                                                <a href="{{ route('password.request') }}" class="pull-right need-help">Forgot Your Password? </a><span class="clearfix"></span>

                                            </div>
                                        </form>
                                    </div>
                                    <br>
                    </div>

                </div>
<br>
                {{--<div class="profile-sidebar pull-right" style="border: 1px solid #d3ced2;background:#000000;float: left;">--}}
                    <div class="col-md-4" style="margin-left: 140px;border: 1px solid #d3ced2;">
                        <br>


                            <div class="container-info bottom-space">
                                <h2>Vous n'avez pas de compte?</h2>
                                <p>Créez un compte dès maintenant pour afficher, modifier et gérer vos annonces. C'est facile, rapide et gratuit!</p>
                                <br>
                                <a href="{{ route('register') }}">
                                    <button id="RegisterButton" class="button-open background-blue next">S'inscrire</button>
                                </a>
                            </div>

                    </div>

                {{--</div>--}}
           </div>
</div>




@endsection
