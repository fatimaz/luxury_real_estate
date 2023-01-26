@extends('layouts.app')
@section('title')
   Item is added successfuly
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
                    <li><a href="{{url('/user/create/building')}}">Add new Item</a></li>
                    <li class="active" ><a href="#">   Item is added successfuly</a></li>


                </ol>
                <div class="profile-content">
                    <div class="alert alert-success">
                        The item
                        <b> was added successfuly</b>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

@endsection

@section('footer')
@endsection
