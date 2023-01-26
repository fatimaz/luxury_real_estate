@extends('layouts.app')
@section('title')
    All items
@endsection

@section('header')
    {!! Html::style('cus/itemall.css') !!}

@endsection
@section('content')

    <div class="container">
        <div class="row profile">



            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"> <a href="">Add new Item</a></li>


                </ol>
                <div class="profile-content" style="width:900px;">
                    {!! Form::open( ['url' => '/user/create/building' , 'method' => 'post','files' =>true]) !!}
                    <!--hna kan3ti 9ima l user = 1 bach t7ayad dik admin--!>
                   {{--@include('admin.bu.form' , ['user' => 1])--}}
                        @include('admin.item.form' )
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
