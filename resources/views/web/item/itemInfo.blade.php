@extends('layouts.app')
@section('title')
    item {{$itemInfo->name}}
@endsection

@section('header')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    {!! Html::style('cus/itemall.css') !!}

    {{--{!! Html::style('css/bootstrap.min.css') !!}--}}
    {{--{!! Html::style('css/font-awesome.min.css') !!}--}}
    {!! Html::style('css/icofont.css') !!}
    {!! Html::style('css/owl.carousel.css') !!}
    {!! Html::style('css/slidr.css') !!}
    {!! Html::style('css/main.css') !!}
    {!! Html::style('css/responsive.css') !!}

    <link id="preset" rel="stylesheet" href="/css/presets/preset1.css">
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet'
          type='text/css'>

    <!-- icons -->
    <link rel="icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!---->

    <style>
        .itemsearch {
            margin-bottom: 10px;
        }
        .breadcrumb {
            background-color: #FFFFFF;
        }
    </style>
@endsection
@section('content')

    <div class="container" style="width:1250px;">
        <div class="row profile">
                <ol class="breadcrumb" style="color:#000000;">
                    <li><a href="{{url('/')}}"  style="color:#000000;">Home</a></li>
                    <li><a href="{{url('/ShowAllBuilding')}}" style="color:#000000;">All Items</a></li>
                    <li><a href="{{url('/SingleBuilding/'.$itemInfo->id)}}"  style="color:#000000;">{{$itemInfo->name}}</a></li>

                </ol>
                <br>
                <div class="profile-content">
                    <div class="btn-group" role="group" aria-label="...">
                        <div class="section slider">
                            <div class="row">
                                <!-- carousel -->


                                <div class="col-md-9">
                                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->

                                        <ol class="carousel-indicators">
                                            @forelse($itemInfo->photos as $key=>$photo)
                                                <li data-target="#product-carousel" data-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}"  style="border: 1px solid #2D383F;width: 95px; height:94px;">
                                                    <img src="{{checkIfAllImageExist($photo->pic_name)}}" alt="Carousel Thumb" class="img-responsive" style="border: 1px solid #2D383F;width: 95px; height:94px;">
                                                </li>
                                            @empty


                                            @endforelse
                                        </ol>
                              <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox" style="padding-bottom: 100px;">
                                        @forelse($itemInfo->photos as $key=>$photo)

                                            <!-- item -->
                                                <div class="item {{ $key == 0 ? 'active' : '' }}">
                                                    <div class="carousel-image" style="border: 1px solid #2D383F;  border-color: rgba(40,40,40,.6);">
                                                        <!-- image-wrapper -->
                                                        <img src="{{asset("pictures/{$photo->pic_name}")}}" alt="Featured Image" class="img-responsive" style="width:832px; height:552px;">
                                                    </div>
                                                </div><!-- item -->
                                            @empty
                                                <div class="item active">
                                                    <div class="carousel-image">
                                                        <!-- image-wrapper -->
                                                        <img src="{{checkIfAllImageExist('')}}" alt="Featured Image" class="img-responsive" style="border: 1px solid #2D383F;">
                                                    </div>
                                                </div><!-- item -->

                                            @endforelse

                                        </div><!-- carousel-inner -->

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                        <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
                                            <i class="fa fa-chevron-right"></i>
                                        </a><!-- Controls -->
                                    </div>
                                </div><!-- Controls -->

                                <!-- slider-text -->
                                <div class="col-md-3">

                                    <div class="slider-text">
                                        <h3><div class="producttitle" style="color:#2c3e50">{{ $itemInfo->name }}</div></h3>
                                        <h3>{{ $itemInfo->price }} EUR</h3>
                                        <hr>
                                        <h4 style="color:#303F9F"><bold>Genetal Info</bold></h4>

                                        <p><span><i class="fa fa-money"></i> Price: <a href="#">Euro {{ $itemInfo->price }}</a></span><br>
                                            <span class="icon"><i class="fa fa-map-marker"></i>Location :<a href="#"> {{ $itemInfo->cities->name }}</a></span><br>



                                        <!-- contact-with -->
                                        <div class="contact-with">
                                            <h4>Contact Us </h4>
                                       <a href="{{ url('/contact') }}" class="btn"><i class="fa fa-envelope-square"></i>Send an email</a>
                                        </div><!-- contact-with -->

                                        <!-- social-links -->

                                    </div>
                                </div><!-- slider-text -->
                            </div>

                        </div><!-- slider -->

                        <!---->
                        <hr class="style14" style="margin-top: 100px;">



                        <div class="description-info">
                            <div class="row">
                                <div class="col-md-8">

                                <div class="single-at-a-glance" style="padding: 20px 35px 35px;">

                                    <ul class="list-group ">
                                        <li class="list-group-item col-sm-6 col-xs-6"><i class="fa fa-money" style="margin-right:5px;"></i> Price </li>
                                        <li class="list-group-item col-sm-6 col-xs-6"> {{ $itemInfo->price }} Euro</li>

                                        <li class="list-group-item col-sm-6 col-xs-6"><i class="fa fa-building-o" style="margin-right:5px;"></i> Type </li>

                                        <li class="list-group-item col-sm-6 col-xs-6">{{ $itemInfo->subcategory->name }} </li>

                                        <li class="list-group-item col-sm-6 col-xs-6"><i class="fa fa-bed" style="margin-right:5px;"></i> Bedroom </li>

                                        <li class="list-group-item col-sm-6 col-xs-6"> {{ $itemInfo->rooms }} </li>

                                        <li class="list-group-item col-sm-6 col-xs-6"><i class="fa fa-shower" style="margin-right:5px;"></i>Bathroom </li>
                                        <li class="list-group-item col-sm-6 col-xs-6"> {{ $itemInfo->bath }} </li>

                                        <li class="list-group-item col-sm-6 col-xs-6"><i class="fa fa-folder-o" style="margin-right:5px;"></i> External area </li>

                                        <li class="list-group-item col-sm-6 col-xs-6"> {{ $itemInfo->square }} m² </li>

                                        <li class="list-group-item col-sm-6 col-xs-6"><i class="fa fa-arrows-alt " style="margin-right:5px;"></i>Internal Area </li>

                                        <li class="list-group-item col-sm-6 col-xs-6"> {{ $itemInfo->square_inter }} m² </li>



                                    </ul>
                                    <div class="clearfix"></div>

                                </div>
                                <!-- description -->

                                    <div class="description">
                                        <h4>Description</h4>
                                        <hr class="style14">
                                     <p> {!!  $itemInfo->large_ds !!} </p>
                                    </div>
                                </div><!-- description -->

                                <!-- description-short-info -->
                                <div class="col-md-4">
                                    <div class="short-info">
                                        <h4>Short Info</h4>
                                        <!-- social-icon -->
                                        <ul>

                                            <li><i class="fa fa-print"></i><a href="#">Print this ad</a></li>
                                            <li><i class="fa fa-reply"></i><a href="#">Send to a friend</a></li>
                                            <li><i class="fa fa-heart-o"></i><a href="#">Save ad as Favorite</a></li>
                                        </ul><!-- social-icon -->
                                    </div>
                                </div>

                            </div><!-- row -->
                        </div><!-- description-info -->
                        <!---->
                        <hr>

                    </div>
                 <br>
                </div>
            <br>
                    <div class="profile-content">
                        <h3>Other similar items
                            <hr>
                        </h3>
                        @include('web.item.sharefile', ['item'=> $same_transaction])

                    </div>

                </div>
        </div>

        <br>
    </div>

@endsection
@section('footer')
    <script>
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng(51.508742, -0.120850);
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>

    <!-- JS -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/modernizr.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="/js/gmaps.min.js"></script>
    <script src="/js/goMap.js"></script>
    <script src="/js/map.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/smoothscroll.min.js"></script>
    <script src="/js/scrollup.min.js"></script>
    <script src="/js/price-range.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/switcher.js"></script>
@endsection

