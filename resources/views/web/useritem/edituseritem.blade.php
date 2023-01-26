@extends('layouts.app')
@section('title')
    Edit item
    {{ $item -> name }}
@endsection

@section('header')
    {!! Html::style('cus/itemall.css') !!}

@endsection
@section('content')

    <div class="container">
        <div class="row profile">
            @include('web.item.pages')


            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"> <a href="{{url('/user/buildingShow')}}">My Items </a></li>
                    <li class="active"> <a href="{{url('/user/edit/building/'.$item->id)}}">Edit Item  {{ $item -> name }}</a></li>


                </ol>
                <div class="profile-content">
                    <!--fach kanbghi ndawaz data l edit kandir model--!>
                    {!! Form::model( $item, ['url' => '/user/update/building' , 'method' => 'patch','files' =>true]) !!}
                        <input type="hidden" name="bu_id" value="{{$item->id}}"/>
                    @include('admin.item.form' , ['user' => 1])
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
