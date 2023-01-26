@extends('layouts.app')
@section('title')
{{$messageTitle}}
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
                    <li><a href="{{url('/ShowAllBuilding')}}">All Items</a></li>
                    <li><a href="{{url('/SingleBuilding/'.$buInfo->id)}}">{{$buInfo->bu_name}}</a></li>

                </ol>
                <div class="profile-content">

                    <div class="alert alert-danger">
                            <b>important</b>
                        {{$messageBody}}

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
