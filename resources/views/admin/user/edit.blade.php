@extends('admin.layouts.layout')

@section('title')

    Add member
    |

@endsection

@section('header')

@endsection


@section('content')

    <section class="content-header">
        <h1>
            Edit member
{{$user->name}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/users')}}">Control members</a></li>
            <li class="active"><a href="{{url('/adminpanel/users/'.$user->id.'edit')}}">Edit member {{$user->name}}</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit member {{$user->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        {!! Form::model( $user,array ('url' => '/adminpanel/users/'.$user->id , 'method' => 'PATCH')) !!}
                            @include('admin.user.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Change password of the user  {{$user->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                       {!! Form::open( ['url' => '/adminpanel/users/changePassword', 'method' => 'post']) !!}
                        <input type="hidden" value="{{$user->id}}" name="user_id">
                        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                                         <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    Change password
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('footer')

@endsection

