@extends('layouts.app')
@section('title')
    All items
@endsection
@section('header')
    {!! Html::style('cus/itemall.css') !!}
    {!! Html::style('css/main.css') !!}
    <style>
        .itemsearch{
            margin-bottom:10px;
        }
        .breadcrumb{
            background-color:#FFFFFF;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="width:1260px;">
        <div class="row profile">
            {{--@include('web.item.pages')--}}
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}" style="color:#000000;">Home</a></li>

                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key=> $value)

                                <li><a href="{{url('/search?'.$key. '='.$value)}}">{{searchnamefilled()[$key]}}->

                                        @if($key=='type')
                                            {{type()[$value]}}
                                        @else
                                        {{$value}}

                                        @endif</a></li>
                            @endforeach
                        @endif
                    @endif

                </ol>
                <div class="profile-content">
                    @include('web.item.sharefile', ['item' => $itemAll])
                    <div class="text-center">
                        {{  $itemAll->appends(Request::except('page'))->render() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

