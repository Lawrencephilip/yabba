@extends('layouts.frontend')

@section('content')
    <div class="banner-section">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="slider-info">
                            <img src="images/ba1.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="container">
                            <div class="banner-text">
                                <h3>Outdoor & Indoor Comfort</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider-info">
                            <img src="images/ba2.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="container">
                            <div class="banner-text">
                                <h3>Best Accomodation Around</h3>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider-info">
                            <img src="images/ba3.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="container">
                            <div class="banner-text">
                                <h3>Yabba Hostels</h3>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $(function(){
                SyntaxHighlighter.all();
            });
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        <!-- FlexSlider -->
        <!-- slider -->
    </div>
    <div class="welcome">
        <div class="container">
            <h2 class="tittle">Welcome To Yabba Hostels</h2>
            <hr>
            {{--<p class="wel text">Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.</p>--}}
            <div class="wel-grids">
                <div class="col-md-3 wel-grid">
                    <img src="images/w1.jpg" class="img-responsive gray" alt=""/>
                    <h4>Peniel Hostel</h4>
                    <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed.</p>
                </div>
                <div class="col-md-3 wel-grid">
                    <img src="images/w2.jpg" class="img-responsive gray" alt=""/>
                    <h4>Ivory Hostel</h4>
                    <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed.</p>
                </div>
                <div class="col-md-3 wel-grid">
                    <img src="images/w3.jpg" class="img-responsive gray" alt=""/>
                    <h4>Davy Hostel</h4>
                    <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed.</p>
                </div>
                <div class="col-md-3 wel-grid">
                    <img src="images/w4.jpg" class="img-responsive gray" alt=""/>
                    <h4>Ebenezer Hostel</h4>
                    <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!---728x90--->
    <!---welcome-->
    <div class="resort-section">
        <div class="container">
            <h3 class="tittle">Latest Reservation  <span>Deals</span></h3>
            <hr>
            <div class="resort-grids">
                <!-- start content_slider -->
                <div id="owl-demo" class="owl-carousel">
                    <div class="item">
                        <div class="col-md-4 cap-img">
                            <img src="images/p.jpg" class="img-responsive gray" alt=""/>
                        </div>
                        <div class="col-md-5 cap ">
                            <h4>Surrounded By Custom Designed</h4>
                           <p>Duis at ante nec neque rhoncus pretium. Ut placerat euismod nibh industry's stand orci donec mollis, est non scelerisque blandit, velit nunc laoreet dol scrambled it to augue non elit aliquam in vehicula sem phasellu  consectetur adipiscing elit donec porttitor lectus at neque sollicitudin.</p>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 cap-img">
                            <img src="images/p1.jpg" class="img-responsive gray" alt=""/>
                        </div>
                        <div class="col-md-4 cap">
                            <h4>Free High Speed Wi-Fi Internet in Room</h4>
                            <p>Duis at ante nec neque rhoncus pretium. Ut placerat euismod nibh industry's stand orci donec mollis, est non scelerisque blandit, velit nunc laoreet dol scrambled it to augue non elit aliquam in vehicula sem phasellu  consectetur adipiscing elit donec porttitor lectus at neque sollicitudin.</p>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 cap-img">
                            <img src="images/p2.jpg" class="img-responsive gray" alt=""/>
                        </div>
                        <div class="col-md-5 cap">
                            <h4>Surrounded By Custom Designed</h4>
                          <p>Duis at ante nec neque rhoncus pretium. Ut placerat euismod nibh industry's stand orci donec mollis, est non scelerisque blandit, velit nunc laoreet dol scrambled it to augue non elit aliquam in vehicula sem phasellu  consectetur adipiscing elit donec porttitor lectus at neque sollicitudin.</p>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
  {{----}}
    <div class="testimonial-section">
        <div class="container">
            <h3 class="tittle">Testimonials</h3>
            <hr>
            <div class="testimonial-grids">
                <div class="col-md-6 testimonial-grid">
                    <div class="testimonial-left">
                        <img src="images/t1.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="testimonial-right">
                        <div class="testimonial-text">
                            <h5>Exactly What I Need</h5>
                        </div>

                        <div class="clearfix"></div>
                        <p>These facilities are some of the best accommodation options you have as a traveller on budget. Not only are they homely, but they are also brimming with travellers, who like you, want to make most of their visit to Nairobi.  One of the main advantages is that the owners and on-site staff will ensure that you experience Kenya just like a local would. And that really is the best way to visit and explore any country – through the eyes of a local!.</p>
                        <div class="testimonial-sign">-Robert ombija </div><!-- /.testimonial-sign -->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 testimonial-grid test3">
                    <div class="testimonial-left">
                        <img src="images/t2.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="testimonial-right">
                        <div class="testimonial-text">
                            <h5>Best Support Ever</h5>
                        </div>

                        <div class="clearfix"></div>
                        <p>QMany people prefer to lodge in hostels whenever they travel because they want a chance to live and communicate with people from around the world. The cheapest beds in Nairobi are in the hostels, and there are many hostels that provide accommodation per night in the city. Many of these hotels are affordable, located in accessible locations and are homely.</p>
                        <div class="testimonial-sign">- Oluwakemi Ojo </div><!-- /.testimonial-sign -->

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="testimonial-grids">
                <div class="col-md-6 testimonial-grid">
                    <div class="testimonial-left">
                        <img src="images/t9.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="testimonial-right">
                        <div class="testimonial-text">
                            <h5>Serene Environments</h5>
                        </div>
                       <div class="clearfix"></div>
                        <p>Quisque aliquet ornare nunc in viverra. Nullam ornare molestie ligula in luctus. Suspendisse ac cursus elit. Donec vel enim sit amet lorem vulputate condimentum.</p>
                        <div class="testimonial-sign">- Fiona Wilson</div><!-- /.testimonial-sign -->

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 testimonial-grid test3">
                    <div class="testimonial-left">
                        <img src="images/t10.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="testimonial-right">
                        <div class="testimonial-text">
                            <h5>Comfort Accomodation</h5>
                        </div>
                        <div class="clearfix"></div>
                        <p>Quisque aliquet ornare nunc in viverra. Nullam ornare molestie ligula in luctus. Suspendisse ac cursus elit. Donec vel enim sit amet lorem vulputate condimentum.</p>
                        <div class="testimonial-sign">-Rachel Fast</div><!-- /.testimonial-sign -->

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
