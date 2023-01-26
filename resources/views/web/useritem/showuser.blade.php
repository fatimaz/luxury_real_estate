@extends('layouts.app')
@section('title')
    User Items
    {{$user->name}}
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
                    <li><a href="{{url('/ShowAllBuilding')}}">All Items</a></li>
                    <li class="active"><a href="#"> User Items {{$user->name}}</a></li>

                </ol>
                <div class="profile-content">
                    @include('web.item.sharefile', ['item' => $item])
                    <div class="text-center">
                        {{  $item->appends(Request::except('page'))->render() }}
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
