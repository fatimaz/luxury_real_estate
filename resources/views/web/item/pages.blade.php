<div class="col-md-3">
    {{--Categories--}}

  <form method="get" action="{{url('FilterAllProducts')}}">
      {{csrf_field()}}

    <a href="#demo1" class="list-group-item list-group-item-success strong" style="background: #f7f7f7;" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-photo"></i> All Categories <i class="fa fa-caret-down"></i></a>
    <div class="collapse list-group-submenu" id="demo1"  style="width: 250px;" >
        @foreach($subcategories as $subcategory)
            <a href="{{url('ShowAllBuilding?byCategory='.$subcategory->id)}}" class="list-group-item"><input type="radio" name="category" value ="{{$subcategory->id}}">
                     {{ucwords($subcategory->name)}}  <span class="pull-right">({{App\Item::where('category_id',$subcategory->id)->count()}})</span></a>
        @endforeach
    </div>
    <br>

      {{--<li class="{{setActive(['type','2'])}}">--}}
          {{--<input type="radio" name="category" value ="{{$category->id}}" class="list-group-item">--}}
          {{--<a href="{{url('ShowAllBuilding?byCategory='.$category->id)}}" ><i class="glyphicon glyphicon-user"></i>--}}
              {{-- {{ucwords($category->name)}}  <span class="pull-right">({{App\Bu::where('category_id',$category->id)->count()}})</span></a>--}}
      {{--</li>--}}
    {{--EndCategories--}}


    {{--Price--}}


    <a href="#demo5" class="list-group-item list-group-item strong" style="background: #f7f7f7;" data-toggle="collapse" data-parent="#MainMenu">
        <i class="fa fa-book"></i> Price <i class="fa fa-caret-down"></i></a>
    <div class="collapse list-group-submenu" id="demo5">

           From <input class="form-control" name="price_from" type="text" style="width: 50px;">To
           <input class="form-control" name="price_to" type="text" style="width: 50px;">

    </div>
<br>
      <button type="submit">Search</button>

  </form>
<br>


    {{--EndPrice--}}

    {{--<div class="profile-sidebar">--}}

        {{--<h2 style="margin-left:10px;"> Advanced search</h2>--}}
        {{--<div class="profile-usermenu" style="padding:10px;">--}}
            {{--{!! Form::open(['url' => 'search', 'method'=> 'get']) !!}--}}
            {{--<ul class="nav" style="margin-left:0px;">--}}
                {{--<li class="itemsearch">--}}
                    {{--{!! Form::text("bu_price_from", null, ['class'=> 'form-control' , 'placeholder'=> 'Price From']) !!}--}}
                {{--</li>--}}
                {{--<li class="itemsearch">--}}
                    {{--{!! Form::text("bu_price_to", null, ['class'=> 'form-control' , 'placeholder'=> 'Price To']) !!}--}}
                {{--</li>--}}
               {{-- <li class="itemsearch">--}}

                    {{--{!! Form::select("bu_type", bu_type(), null, ['class'=> 'form-control select2' , 'placeholder'=> 'Categories']) !!}--}}
                {{--</li>--}}
                {{--<li class="itemsearch">--}}

                    {{--{!! Form::select("ville", ville() , null, ['class'=> 'form-control select2' , 'placeholder'=> 'City']) !!}--}}
                {{--</li>--}}
                {{--<li class="itemsearch">--}}
                    {{--{!! Form::submit("search", ['class'=> 'banner_btn' ]) !!}--}}
                {{--</li>--}}


            {{--</ul>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
        {{--<!-- END MENU -->--}}
    {{--</div>--}}


    <br>

</div>