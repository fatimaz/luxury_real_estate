<style>

    #social-fb:hover {
        color: #3B5998;
    }
    #social-tw:hover {
        color: #4099FF;
    }
    #social-gp:hover {
        color: #d34836;
    }
    #social-em:hover {
        color: #f39c12;
    }

    .social:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
    }
    .social {
        -webkit-transform: scale(0.8);
        /* Browser Variations: */

        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }
</style>

<footer>


    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3> About Us </h3>
                    <ul>
                        <li> <a href="#"> This site acts as the crossroad for real estates.</a> </li>
                        <li> <a href="#"> You can be a potential buyer, or a seller.</a> </li>
                        <li> <a href="#">This site will open many doors for a dispersed range of people.</a></li>
                        <li> <a href="#"> Whether you are a first time buyer, investor or looking for a bargain, check us out!</a></li>

                    </ul>
                </div>


                <div class="col-md-4">
                    <h3> Location </h3>
                    <ul>

                        @foreach($cities as $city)

                            <li><a href="{{url('ShowAllBuilding?byCity='.$city->id)}}">{{$city->name}}</a></li>

                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3> Contact </h3>
                                <a href="{{getSetting('facebook')}}"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                                <a href= "{{url ('/contact')}}"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                </div>

            </div>

            <!--/.row-->
        </div>
        <!--/.container-->
    </div>

    <!--/.footer-->


    <div class="footer-bottom">
        <div class="container">
            <p class=""> Copyright © 2017, luxuryaqar.com. All rights reserved.</p>

        </div>
    </div>
    <!--/.footer-bottom-->
</footer>