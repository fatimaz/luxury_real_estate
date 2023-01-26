
<li class=""><a href="{{url('/adminpanel')}}"><i class="fa fa-home"></i> Main Page</a></li>
<li class=""><a href="{{url('/adminpanel/sitesetting')}}"><i class="fa fa-gears"></i> Settings</a></li>


{{--users--}}

<li class="treeview active">
    <a href="#">
        <i class="fa fa-users pull-left"></i>
        <span style="margin-right:20px">Control Users</span>

              <i class="fa fa-angle-left pull-right"></i>
            <div class="clearfix"></div>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{url('/adminpanel/users')}}"><i class="fa fa-circle-o"></i> All user</a></li>
    </ul>
</li>

    {{--items--}}

<li class="treeview active">
    <a href="#">
        <i class="fa fa-building"></i>
        <span style="margin-right:20px">Control Items</span>

        <i class="fa fa-angle-left pull-right"></i>
        <div class="clearfix"></div>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{url('/adminpanel/item')}}"><i class="fa fa-building"></i> All items</a></li>
        <li><a href="{{url('/adminpanel/subcategory')}}"><i class="fa fa-building"></i> SubCategories</a></li>
        <li><a href="{{url('/adminpanel/category')}}"><i class="fa fa-building"></i>Categories</a></li>
        {{--<li><a href="{{url('/adminpanel/item')}}"><i class="fa fa-building"></i> Pictures</a></li>--}}
    </ul>
</li>

{{--International--}}

<li class="treeview active">
    <a href="#">
        <i class="fa fa-building"></i>
        <span style="margin-right:20px">Countries</span>

        <i class="fa fa-angle-left pull-right"></i>
        <div class="clearfix"></div>
    </a>
    <ul class="treeview-menu">
        <li class="active"><a href="{{url('/adminpanel/city/create')}}"><i class="fa fa-circle-o"></i>Add City</a></li>
        <li><a href="{{url('/adminpanel/city')}}"><i class="fa fa-building"></i> All Cities</a></li>
    </ul>
</li>

<li><a href="{{url('/adminpanel/buYear/statics')}}"><i class="fa fa-building"></i> Statics</a></li>

{{--International--}}

<li class="treeview active">

    <ul class="treeview-menu">
        <li><a href="{{url('/adminpanel/contact')}}"><i class="fa fa-building"></i> All messages</a></li>
    </ul>
</li>

