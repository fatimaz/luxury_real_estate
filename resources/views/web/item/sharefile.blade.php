
@if(Request::is('ShowAllBuilding'))
<div class="featured-top">
    <h4 style="display: inline;">Recommended properties for You</h4>
    <div class="dropdown pull-right">

        <!-- category-change -->
        <div class="dropdown category-dropdown" style="line-height:inherit;">
            <h5 style="display: inline;">Sort by:</h5>
            <a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a>
            <ul class="dropdown-menu category-change">
                <li><a href="{{url('ShowAllBuilding')}}" >All</a></li>
                <li><a href="{{url('ShowAllBuilding?byLowestPrice=1')}}" >Lowest price</a></li>
                <li><a href="{{url('ShowAllBuilding?byHighestPrice=1')}}">Highest price</a></li>
                <li><a href="{{url('ShowAllBuilding?newlyListed=1')}}" >Newly listed</a></li>


            </ul>
        </div><!-- category-change -->
    </div>
</div><!-- featured-top -->

@endif
@if(count($item)>0)
    @foreach($item as $key => $itm)

        <div class="ad-item row" style=" height:  280px;">
            <div class="item-image-box col-sm-5">
                <!-- item-image -->
                <div class="item-image" style=" height:  280px;">
                    <a href="{{'/SingleBuilding/'.$itm->id}}">
                        <img src="{{checkIfAllImageExist( isset($itm->firstPhoto->pic_name)?$itm->firstPhoto->pic_name:'' , '/pictures/' , '/pictures/')}}"
                                class="img-responsive" style="width:372px; height: 280px;">
                    </a>
                </div><!-- item-image -->
            </div><!-- item-image-box -->

            <!-- rending-text -->
            <div class="item-info col-sm-7">
                <!-- ad-info -->
                <div class="ad-info">
                    <h4 class="item-title"> <a href="{{'/SingleBuilding/'.$itm->id}}">
                            <div class="producttitle" style="color:#000000">{{ $itm->name }}</div>
                        </a></h4>
                    <span class="icon"><i class="fa fa-map-marker"></i> {{ $itm->cities->name }}</span>

                    <h3 class="item-price"  style="color:#1565C0"> {{ $itm->price}} EUR</h3>

                    <div class="property-features">
                        <span style="margin-right:10px;"><i class="fa fa-square" style="margin-right:5px;"></i>{{ $itm->square }} m² </span>
                        <span style="margin-right:10px;"><i class="fa fa-bed" style="margin-right:5px;"></i> {{ $itm->rooms }}</span>
                         <span style="margin-right:10px;"><i class="fa fa-bath" style="margin-right:5px;"></i> {{ $itm->bath }}</span>

                        <span> {!! str_limit($itm->large_ds,250) !!}</span>
                    </div>


                </div><!-- ad-info -->

            </div><!-- item-info -->
        </div><!-- ad-item -->
    @endforeach

@else
    <div class="alert alert-danger">
        No properties available
    </div>
@endif