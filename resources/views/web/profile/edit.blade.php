@extends('layouts.app')
@section('title')
   control user info
    {{$user->name}}
@endsection

@section('header')
    {!! Html::style('cus/buall.css') !!}

@endsection
@section('content')

    <div class="container">
        <div class="row profile">
            @include('web.item.pages')


            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="">control user info
                            {{$user->name}}</a></li>


                </ol>
                <div class="profile-content">

                    {!!Form::model($user,array('url'=>'/user/editSetting/'.$user->id, 'method' => 'PATCH'))!!}
                    @include('admin.user.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

@endsection

@section('footer')
@endsection
