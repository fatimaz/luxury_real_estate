<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!}
    {!! Html::script('website/js/jquery.min.js') !!}
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    @if(Request::is('/'))
    <style>
        .flipkart-navbar {
            background: url(" {{checkIfImageExists(getSetting('main_slider'), '/public/website/slider/','/website/slider/')}}") no-repeat center;
            min-height: 620px;
            width: 100%;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding-bottom: 100px;
        }
        .searchform{
            width:100%;
            background:rgba(255,255,255,.7);
            margin-top:170px;
        }
        .nav li a,
        .navbar-default .navbar-nav>li>a {
            color: #ffffff;
        }

    </style>
    @else
        <style>
        .flipkart-navbar {
         background:#ffffff;
        }
        .nav li a,
        .navbar-default .navbar-nav>li>a {
            color: #0a0a0a;

        }
        .searchform{
            width:100%;
            background: rgba(0, 0, 0, 0.3);
            margin-top:100px;
        }
        </style>
    @endif

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>


    <title>
        {{getSetting()}}
        |
        @yield('title')

    </title>
    <link rel="icon" href="{{Request::root()}}/website/images/home.png"/>
    {!! Html::style('cus/css/select2.css') !!}
    @yield('header')
</head>
<body>


<div class="flipkart-navbar">
    {{--<br> <span style="color:#660000;">JusThe</span><span style="color:#003300;"><bold>Luxe</bold></span>--}}
    <div class="container"> <a class="navbar-brand" href="{{ url('/') }}">

            <i class="fa fa-home" style="color:#BF360C;"></i> <span style="color:#660000;">Maghreb</span><span style="color:#003300;"><bold>RealEstate</bold></span>
            <br> <span style="font-size: 15px; margin-left: 40px;"> Moroccan Real Estate</span></a>


        {{--menu--}}
        <div class="menu" > <a class="toggleMenu" href="#"><img src="{{Request::root()}}/website/images/nav_icon.png" alt="" /> </a>
            <ul class="nav" id="nav">
                <li class="{{setActive(['home'],'current')}}"><a href="{{ url('/') }}">Home</a></li>

                <li class="{{setActive(['ShowAllBuilding'],'current')}}">
                    <a href="{{ url('/ShowAllBuilding') }}">All Properties</a></li>


                <li class="{{setActive(['1'],'current')}}">
                    <a href="{{url('ShowAllBuilding?ForRent=1')}}">
                        Rent
                    </a>
                </li>
                <li class="{{setActive(['ShowAllBuilding?'],'current')}}">
                    <a href="{{url('ShowAllBuilding?ForSale=1')}}">
                        Buy
                    </a>

                </li>


                {{--<li><a href="about.html">About Us</a></li>--}}
                <li class="{{setActive(['contact'],'current')}}"><a href="{{url ('/contact')}}">Contact Us</a></li>
                <div class="clear"></div>

            </ul>
        </div>

        {{--menuend--}}

        {{--container--}}
        <div class="searchform">
            <div class="container">

            <div class="col-md-12" style="margin-top:10px;margin-bottom:5px;">

                <form method="get" action="{{url('FilterAllProducts')}}">
                {{--<form  action="/search" class="form-horizontal form-horizontal_x" method="get" >--}}
                    {{ csrf_field() }}

                    <div class="form-group">

                        <div class="col-md-3" style="padding:1px;">
                            {!! Form::select("transaction" , transaction() , null ,['class' => 'form-control', 'style' =>'height: 50px']) !!}
                        </div>
                        <div class="col-md-3" style="padding:1px;">
                            <select  name="subcategory" id="subcategory" required="" class="form-control" style="height: 50px;">
                                <option value="0" selected="">Property Type</option>
                                @foreach($subcategories  as $subcategory)
                                    <option value="{{ $subcategory->id }}">
                                        {{ $subcategory->name }}</option>
                                    {{--<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>--}}
                                @endforeach
                            </select>

                            <!-- <input type="text" class="form-control" id="email" placeholder="Enter email"> -->
                        </div>

                        {{--cities--}}


                        <div class="col-md-4" style="padding:1px;">
                            <select  name="city" id="city" required="" class="form-control" style="height: 50px;">
                                <option value="0" selected="">Cities</option>


                                @foreach($cities  as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    {{--<option value="{{$city->id}}"   @if (old('city')) selected="selected" @endif> {{$city->name}} </option>--}}
                                @endforeach
                            </select>

                            <!-- <input type="text" class="form-control" id="email" placeholder="Enter email"> -->
                        </div>

                        {{----}}
                        <div class="" style="padding:1px;">

                            <button type="submit" style="background:#BF360C; width:150px; height: 50px;">
                             <bold style="color:#ffffff">Find</bold>
                            </button>
                        </div>
          @if(Request::is('/'))
                            <div></div>

           @else

                        <div class="col-md-2" style="padding:1px;">
                            {!! Form::select("rooms_from" , rooms() , null ,['class' => 'form-control', 'placeholder' => 'Min. bed', 'style' =>'height: 50px' ]) !!}
                        </div>
                        <div class="col-md-2" style="padding:1px;">
                            {!! Form::select("rooms_to" , rooms() , null ,['class' => 'form-control', 'placeholder' => 'Max. bed', 'style' =>'height: 50px']) !!}
                        </div>


                        <div class="col-md-3" style="padding:1px;">
                            <input class="form-control" name="price_from" type="text" placeholder="Min. Price" style="height: 50px;">

                        </div>
                        <div class="col-md-3" style="padding:1px;">
                            <input class="form-control" name="price_to" type="text" placeholder="Max. Price"  style="height: 50px;">
                        </div>
              @endif

                    </div>


                </form>
            </div>

      </div>
        </div>
        {{--container--}}
        @if(Request::is('/'))
                <a href= "{{ url('/ShowAllBuilding') }}" class="btn btn-info btn-lg" style= "margin: -20px -50px;
                   position:relative;
                   top:100px; background:lightblue;
                   left:50%;"><i class="fa fa-search-plus" style="margin-right:10px; color:#ffffff;"></i>Advanced Search</a>
        @else

        @endif
    </div>
    <br>
</div>


{{--@endif--}}


{{--@include('layouts.message')--}}
        @yield('content')
<br>
@include('layouts.footer')

        {!! Html::script('website/js/responsive-nav.js') !!}
        {!! Html::script('website/js/bootstrap.min.js') !!}
        {!! Html::script('website/js/jquery.flexslider.js') !!}
        {!! Html::script('cus/js/select2.js') !!}
            <script type="text/javascript">
             $('.select2').select2();
            </script>

@yield('footer')

</body>
</html>
