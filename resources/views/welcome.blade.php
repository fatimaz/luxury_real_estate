@extends('layouts.app')
@section('title')
    Welcome
@endsection
@section('header')
    {!! Html::style('cus/itemall.css') !!}
    {!! Html::style('css/main.css') !!}
    <link rel="stylesheet" href="{{Request::root()}}/main/css/reset.css"> <!-- Resource style -->
    <link rel="stylesheet" href="{{Request::root()}}/main/css/categoriesstyle.css"> <!-- categories style -->
    <link rel="stylesheet" href="{{Request::root()}}/main/css/style.css"> <!-- Resource style -->
    <script src="{{Request::root()}}/main/js/modernizr.js"></script> <!-- Modernizr -->
@endsection

@section('content')
     <hr class="style14">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="  vc_custom_1492762335737">
                        <div class="section-header-style-3">
                            <div class="row">
                                <div class="col-xs-12"><h2 class="main-title">WHERE ARE YOU LOOKING?</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row cat-wrapper" data-boxcattit="25" data-boxquan="6" data-catlayout="3" data-call="9">
                                @foreach($cities as $key => $city)
                                    <div class="col-md-4 col-sm-6 col-xs-12 category-box-outter cl_category-box-outter-3"
                                         id="cat-98">
                                        <div class="cl_category-box-3">
                                            <div class="category-inner-box">
                                                <div class="category-title-v3" style="margin-top: 80px;">
                                                    <a href="{{url('ShowAllBuilding?byCity='.$city->id)}}">
                                                        <h4 style="font-size: 30px;">{{$city->name}} </h4>
                                                    </a>
                                                </div>
                                                <div class="category-thumb-v3">
                                                    <img src="{{checkIfImageExists($city->image)}}" class="img-responsive">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                </div>
            </div>
        </div>
    
        <!-------categories--->
        <!-------categories--->
        <!-------categories--->
     <hr class="style14">
     <div class="wpb_column vc_column_container vc_col-sm-12">
         <div class="vc_column-inner ">
             <div class="wpb_wrapper">
                 <div class="  vc_custom_1492762335737">
                     <div class="section-header-style-3">
                         <div class="row">
                             <div class="col-xs-12"><h2 class="main-title">Latest properties</h2>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class=" ">
                     <section id="" class="cat-box-contain">
                         <div class="row cat-wrapper" data-boxcattit="25" data-boxquan="6" data-catlayout="3"
                              data-call="9">
                             <?php $counter = 0; $image=""?>

                             @foreach($item as $key => $itm)


                                 <div class="col-md-4 col-sm-6 col-xs-12 category-box-outter cl_category-box-outter-3"
                                      id="cat-98">
                                     <div class="cl_category-box-3">
                                         <div class="category-inner-box">

                                             <div class="category-title-v3">
                                                 <a href="{{url('ShowAllBuilding?byCity='.$city->id)}}">
                                                       @if($itm->transaction==0)
                                                         <div class="forsale pull-left">For Sale</div>
                                                           @else
                                                         <div class="forsale pull-left">For Rent</div>
                                                           @endif

                                                 </a>
                                             </div>
                                             <div class="category-thumb-v3">
                                                 {{--haddi foto --}}
                                                 <a href="{{'/SingleBuilding/'.$itm->id}}"><img
                                                             src="{{checkIfAllImageExist( isset($itm->firstPhoto->pic_name)?$itm->firstPhoto->pic_name:'' , '/pictures/' , '/pictures/')}}"

                                                             class="img-responsive" style="width:394px; height: 270px;"></a>
                                                 {{--<img src="{{checkIfImageExists($category->image)}}" width="394px"--}}
                                                      {{--height="270px" class="img-responsive">--}}
                                                 <div class="category-thumb-overlay"></div>
                                                 <a href=""class="anchor-link"></a>
                                             </div>
                                             <div class="category-content-v3">

                                                 <ul>
                                                     <li>
                                                             <a href="{{'/SingleBuilding/'.$itm->id}}">
                                                                 <div class="producttitle pull-left" style="color:#1565C0">{{ $itm->name }}</div>
                                                             </a>

                                                      </li>

                                                     <p class="text-justify" style="margin-left:10px;"> <span style="margin-left:20px; font-weight:bold;">{{ $itm->subcategory->name  }}</span>

                                                      <span style="margin-right:10px;margin-left:30px;"> {{ $itm->rooms  }}<i class="fa fa-bed" style="margin-left:5px;"> </i></span>
                                                         <span style="margin-right:30px;margin-left:20px;"> {{ $itm->bath  }} <i class="fa fa-bath" style="margin-left:5px;"> </i></span>

                                                         {{--<i class="fa fa-bed"></i>--}}
                                                        <bold style="color:#1565C0"> <i class="fa fa-money" style="margin-right:3px;margin-left:10px;"> </i>{{ $itm->price}} EUR</bold></p>


                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                 </div>


                             @endforeach


                         </div>
                     </section>
                 </div>
             </div>
         </div>
     </div>


@endsection

@section('footer')
    <script src="{{Request::root()}}/main/js/jquery-2.1.1.js"></script>
    <script src="{{Request::root()}}/main/js/velocity.min.js"></script>
    <script>
        function urlHome() {
            return '{{request::root()}}';
        }
        function noImageUrl() {
            return '{{getsetting('no_image')}}';
        }
    </script>
    <script src="{{Request::root()}}/main/js/main.js"></script> <!-- Resource jQuery -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp7SCRxP7IADMrLiNHgnpxhJbEfhnXtlk&libraries=places"
            type="text/javascript"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', intilize);
        function intilize() {
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById("txtautocomplete"));

            google.maps.events.AddListener(autocomplete, 'place_changed', function () {

                var place = autocomplete.getplace();
                var location = "Address: " + place.formatted_address + "<br/>";
                location += "Latitude: " + place.geometry.location.lat() + "<br/>";
                location += "Longitude: " + place.geometry.location.lng();
                document.getElementById('lblresult').innerHTML = location
            });

        };


        // hada dial slider
        $(document).ready(function () {
            $('#myCarousel').carousel({
                interval: 10000
            })

            $('#myCarousel').on('slid.bs.carousel', function () {
                //alert("slid");
            });
        });

    </script>
@endsection