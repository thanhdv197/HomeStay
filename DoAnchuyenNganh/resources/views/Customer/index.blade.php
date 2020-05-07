@extends('Layout.layout')

@section('content')
    
<!-- start hero-header -->
<div class="hero" style="background-image:url('extretion/images/hero-header/03.jpg');">
				
    {{-- search form --}}
    <div class="container">
        
        <div class="hero-texting">

            <!-- Hero heading -->
            <h1>Find a place to stay</h1>

            <!-- Hero subheading -->
            <p>More than 100,000 hotels, hostels, apartments and guest houses around the world</p>
            
        </div>

        <div class="main-search-wrapper">

            <div class="inner animated">
                        
                <form class="row gap-20">
            
                    <div class="col-xs-12 col-sm-12 form-lg">

                        <div class="typeahead-container form-group form-icon-right">
                        
                            <label class="destination-search-3">Where do you want to go?</label>
                            
                            <div class="typeahead-field">
                                <input id="destination-search-3" name="destination-search-3" type="search" autocomplete="off" class="form-control" placeholder="Try to type: new">
                            </div>
                            <i class="fa fa-map-marker"></i>
                        </div>

                    </div>
                    
                    <div class="col-xss-12 col-xs-12 col-sm-5">
                    
                        <div class="row gap-20">
                        
                            <div class="col-xss-12 col-xs-6 col-sm-6">
                                <div class="form-group form-icon-right"> 
                                    <label for="dpd1">Check-in</label>
                                    <input name="dpd1" class="form-control" id="dpd1" placeholder="Check-in" type="text" readonly >
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            
                            <div class="col-xss-12 col-xs-6 col-sm-6">
                                <div class="form-group form-icon-right"> 
                                    <label for="dpd2">Check-out</label>
                                    <input name="dpd2" class="form-control" id="dpd2" placeholder="Check-out" type="text" readonly>
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    
                    <div class="col-xss-12 col-xs-12 col-sm-7">

                        <div class="row gap-20">
                            <div class="col-xss-12 col-xs-4 col-sm-4">
                            
                                <div class="form-group form-spin-group">
                                    <label for="room-amount">Rooms</label>
                                    <input type="text" class="form-control form-spin" value="1" id="room-amount" name="room-amount"/> 
                                </div>
                                
                            </div>
                            
                            <div class="col-xss-12 col-xs-4 col-sm-4">
                            
                                <div class="form-group form-spin-group">
                                    <label for="adult-amount">Adults</label>
                                    <input type="text" class="form-control form-spin" value="1" id="adult-amount" name="adult-amount"/> 
                                </div>
                                
                            </div>
                            
                            <div class="col-xss-12 col-xs-4 col-sm-4">
                            
                                <div class="form-group form-spin-group">
                                    <label for="child-amount">Children</label>
                                    <input type="text" class="form-control form-spin" value="0" id="child-amount" name="child-amount"/> 
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-xs-12">
                    
                        <div class="row">
                        
                            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-block btn-primary btn-lg btn-icon">Search <span class="icon"><i class="fa fa-search"></i></span></button>
                            </div>
                        
                        </div>
                        
                    </div>
                    
                </form>
            
            
            </div>

        </div>

    </div>
    
</div>
<!-- end hero-header -->

<div class="clear"></div>

{{-- 1 --}}
<div class="post-hero">

    <div class="container mb-5">
    
        <div class="row">
        
            <div class="col-sm-4">
                
                <div class="featured-item-03 clearfix">
                
                    <div class="icon">
                        <i class="et-line-trophy"></i>
                    </div>
                    
                    <div class="content">
                    
                        <h5>Quality Assured</h5>
                        <p>So by colonel hearted ferrars. Draw from upon here gone add one. He in sportsman household otherwise.</p>
                        
                    </div>
                    
                </div>
            
            </div>

            <div class="col-sm-4">
                
                <div class="featured-item-03 clearfix">
                
                    <div class="icon">
                        <i class="et-line-wallet"></i>
                    </div>
                    
                    <div class="content">
                    
                        <h5>Book Now, Pay Later</h5>
                        <p>Whatever throwing we on resolved entrance together graceful. Mrs assured add private married removed.</p>
                        
                    </div>
                    
                </div>
            
            </div>
            
            <div class="col-sm-4">
                
                <div class="featured-item-03 clearfix">
                
                    <div class="icon">
                        <i class="et-line-heart"></i>
                    </div>
                    
                    <div class="content">
                    
                        <h5>We Care, You Happy</h5>
                        <p>Dependent certainty off discovery him his tolerably offending. Ham for attention remainder sometimes.</p>
                        
                    </div>
                    
                </div>
            
            </div>
        
        </div>
        
    </div>

</div>

<div class="clear"></div>

{{-- top destinate 2 --}}
<div class="container pt-50 pb-60">

    <div class="row">
    
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
            <div class="section-title">
                <h2>Top Destinations</h2>
            </div>
            
        </div>
        
    </div>
    
    <div class="top-destination-wrapper">

        <div class="GridLex-gap-20-wrapper">
        
            <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                @foreach ($cities as $item)
 
                <div class="GridLex-col-3_sm-4_xs-6_xss-12">

                    <div class="top-destination-item">
                        <a href="{{ route('citylists',[$item->id]) }}">
                            <div class="image" style="height: 150px">
                                <img src="{{$item->city_img}}" alt="Top Destinations">
                            </div>
                            <div class="content">
                                <div class="row gap-10">
                                
                                    <div class="col-xs-7 place">
                                        <h4>{{ $item->city_name }}</h4>
                                    </div>
                                    
                                    <div class="col-xs-5 price">
                                        <p>{{ $item->post_count }} Posts</p>
                                        <p class="icon"><i class="ri ri-chevron-right-circle"></i></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    
                </div>
                @endforeach
                
            </div>
        
        </div>

    </div>
    
</div>

<div class="clear"></div>

{{-- Popular Accommodations Types 3 --}}
<div class="bg-white pt-50 pb-60">

    <div class="container">
    
        <div class="row">
    
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="section-title">
                    <h2>Popular Accommodation Types</h2>
                    <p>Particular unaffected projection sentiments. Mind mrs yet did quit high even you went. Sex against the two however not nothing prudent colonel greater.</p>
                </div>
                
            </div>
        
        </div>
        
        <div class="top-hotel-grid-wrapper">
            
            <div class="GridLex-gap-20-wrapper">
        
                <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                    @foreach ($accommodation_types as $item)

                    <div class="GridLex-col-3_sm-4_xs-6_xss-12 mb-20">
                    
                        <div class="hotel-item-grid">
                            <a href="{{ route('accommlists',[$item->id]) }}">
                                <div class="image" style="height: 150px">
                                    <img src="{{ $item->accommodation_type_img }}" alt="Top Destinations">
                                </div>
                                <div class="heading">
                                    <h4>{{ $item->accommodation_type_name }}</h4>
                                </div>
                                <div class="content">
                                    <div class="row gap-5">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="tripadvisor-module">
                                                <div class="texting">
                                                    Wonderful
                                                </div>
                                                <div class="hover-underline">324 reviews</div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <p class="price"><span class="block">Total:</span><span class="number">{{ $item->post_count }}</span> Posts</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>

                    @endforeach
                    
                </div>
                
            </div>
            
        </div>
        
    </div>

</div>

<div class="clear"></div>

{{-- 4 --}}
<div class="overflow-hidden">

    <div class="GridLex-grid-noGutter-equalHeight">
    
        <div class="GridLex-col-6_sm-6_xs-12_xss-12 bg-primary">
        
            <div class="sell-or-buy">
            
                <div class="icon">
                    <i class="et-line-briefcase"></i>
                </div>
                
                <div class="clear"></div>
                
                <div class="content">
                
                    <h3 class="uppercase">Traveller</h3>
                
                    <p>Denote simple fat denied add worthy little use. As some he so high down am week. Conduct esteems by cottage to pasture we winding. On assistance he cultivated considered frequently. </p>
                    
                    <a href="#">Sign-up</a>
                    
                </div>
            
            </div>
        
        </div>
        
        <div class="GridLex-col-6_sm-6_xs-12_xss-12 bg-warning">
        
            <div class="sell-or-buy">
            
                <div class="icon">
                    <i class="et-line-map"></i>
                </div>
                
                <div class="clear"></div>
                
                <div class="content">
                
                    <h3 class="uppercase">Property Owner</h3>
                
                    <p>Pasture he invited mr company shyness. But when shot real her. Chamber her observe visited removal six sending himself boy. At exquisite existence if an oh dependent excellent.</p>
                    
                    <a href="#">Become a host</a>
                    
                </div>
            
            </div>
            
        </div>
    
    </div>

</div>

<div class="clear"></div>

{{-- 5 --}}
<div class="container pt-50 pb-50">

    <div class="container">

        <div class="row">
        
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
                <div class="section-title">
                    <h2>What people say about us</h2>
                </div>
                
            </div>
            
        </div>
        
        <div class="row">
        
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
                <div class="slick-gallery-slideshow slick-testimonial-wrapper">

                    <div class="slider gallery-slideshow slick-testimonial">
                    
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    If we landlord stanhill mr whatever pleasure supplied concerns so. Exquisite by it admitting cordially september newspaper an. Acceptance middletons am it favourable. It it oh happen lovers afraid.
                                </p>
                                
                                <h4 class="uppercase text-primary">Frank Abagnale</h4>
                                <p class="he">New York, USA</p>
                            
                            </div>

                        </div>
                        
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    Sympathize did now preference unpleasing mrs few. Mrs for hour game room want are fond dare. For detract charmed add talking age. 
                                </p>
                                
                                <h4 class="uppercase text-primary">Charles Ponzi</h4>
                                <p class="he">Rome, Italy</p>
                            
                            </div>

                        </div>
                        
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    Who connection imprudence middletons too but increasing celebrated principles joy. Herself too improve gay winding ask expense are compact.
                                </p>
                                
                                <h4 class="uppercase text-primary">Joseph Weil</h4>
                                <p class="he">Berlin, German</p>
                            
                            </div>

                        </div>
                        
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    Dashwood contempt on mr unlocked resolved provided of of. Stanhill wondered it it welcomed oh. Hundred no prudent he however smiling at an offence.
                                </p>
                                
                                <h4 class="uppercase text-primary">Victor Lustig</h4>
                                <p class="he">Paris, France</p>
                            
                            </div>

                        </div>
                        
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    Preference imprudence contrasted to remarkably in on. Taken now you him trees tears any. Her object giving end sister except oppose.
                                </p>
                                
                                <h4 class="uppercase text-primary">George Parker</h4>
                                <p class="he">New York, USA</p>
                            
                            </div>

                        </div>
                        
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    Simplicity end themselves increasing led day sympathize yet. General windows effects not are drawing man garrets. Common indeed garden you his ladies out yet.
                                </p>
                                
                                <h4 class="uppercase text-primary">Soapy Smith</h4>
                                <p class="he">Alaska, USA</p>
                            
                            </div>

                        </div>
                        
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    Ladyship it daughter securing procured or am moreover mr. Put sir she exercise vicinity cheerful wondered. Continual say suspicion provision you neglected sir curiosity unwilling.
                                </p>
                                
                                <h4 class="uppercase text-primary">Eduardo de Valfierno</h4>
                                <p class="he">Berlin, German</p>
                            
                            </div>

                        </div>
                        
                        <div class="slick-item">
                        
                            <div class="testimonial-long">
                            
                                <p class="saying">
                                    Far quitting dwelling graceful the likewise received building. An fact so to that show am shed sold cold. Unaffected remarkably get yet introduced excellence terminated led.
                                </p>
                                
                                <h4 class="uppercase text-warning">James Hogue</h4>
                                <p class="he">Utah, USA</p>
                            
                            </div>

                        </div>
                        
                    </div>

                    <div class="clear"></div>
                    
                    <div class="slider gallery-nav slick-testimonial-nav alt">
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/01.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/02.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/03.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/04.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/05.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/06.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/07.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/08.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/09.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="slick-item">
                            <div class="testimonial-man">
                                <div class="image">
                                    <img src="extretion/images/man/10.jpg" alt="image"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="clear mb-5"></div>
                    
                </div>
            
            </div>
            
        </div>
        
    </div>

</div>

<div class="clear"></div>

{{-- 6 --}}
<div class="bg-white pt-50 pb-60">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
                <div class="section-title">
                    <h2>Travel Guides &amp; Tips</h2>
                    <p>Feelings laughing at no wondered repeated provided finished. Possession her thoroughly remarkably terminated man continuing. Can friendly laughter goodness man him appetite.</p>
                </div>
            
            </div>
                
        </div>
    
        <div class="recent-post-wrapper">

            <div class="GridLex-gap-20-wrapper">
        
                <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
            
                    <div class="GridLex-col-6_sm-6_xs-12_xss-12 mb-20">
                    
                        <div class="recent-post">
                    
                            <div class="image" style="background-image:url('extretion/images/blog/01.jpg');"></div>
                            
                            <div class="content">
                            
                                <div class="meta"><i class="fa fa-calendar"></i> <a href="#">Nov 17, 2015</a> <span class="mh-5">|</span> <i class="fa fa-user"></i> <a href="#"> admin</a></div>
                                
                                <h4>Five Essential Items for Your Next Cruise </h4>
                            
                                <p>Say ferrars demands besides her address. Blind going you merit few fancy their...</p>
                                
                                <a href="#" class="btn-read-more">read more <i class="fa fa-long-arrow-right"></i></a>
                                
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    <div class="GridLex-col-6_sm-6_xs-12_xss-12 mb-20">
                    
                        <div class="recent-post">
                    
                            <div class="image" style="background-image:url('extretion/images/blog/02.jpg');"></div>
                            
                            <div class="content">
                            
                                <div class="meta"><i class="fa fa-calendar"></i> <a href="#">Nov 17, 2015</a> <span class="mh-5">|</span> <i class="fa fa-user"></i> <a href="#"> admin</a></div>
                                
                                <h4>Family Reunion Planning During the Holidays</h4>
                            
                                <p>Six started far placing saw respect females old. Civilly why how end viewing...</p>
                                
                                <a href="#" class="btn-read-more">read more <i class="fa fa-long-arrow-right"></i></a>
                                
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    <div class="GridLex-col-6_sm-6_xs-12_xss-12 mb-20">
                    
                        <div class="recent-post clearfix">
                    
                            <div class="image" style="background-image:url('extretion/images/blog/03.jpg');"></div>
                            
                            <div class="content">
                            
                                <div class="meta"><i class="fa fa-calendar"></i> <a href="#">Nov 17, 2015</a> <span class="mh-5">|</span> <i class="fa fa-user"></i> <a href="#"> admin</a></div>
                                
                                <h4>Dental Care While Travel & Dental Tourism</h4>
                            
                                <p>Man particular insensible celebrated conviction stimulated principles day. Sure fail...</p>
                                
                                <a href="#" class="btn-read-more">read more <i class="fa fa-long-arrow-right"></i></a>
                                
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    <div class="GridLex-col-6_sm-6_xs-12_xss-12 mb-20">
                    
                        <div class="recent-post">
                    
                            <div class="image" style="background-image:url('extretion/images/blog/04.jpg');"></div>
                            
                            <div class="content">
                            
                                <div class="meta"><i class="fa fa-calendar"></i> <a href="#">Nov 17, 2015</a> <span class="mh-5">|</span> <i class="fa fa-user"></i> <a href="#"> admin</a></div>
                                
                                <h4>Packing Lists - Create Your Own Packing List</h4>
                            
                                <p>Greatest properly off ham exercise all. Unsatiable invitation its possession nor...</p>
                                
                                <a href="#" class="btn-read-more">read more <i class="fa fa-long-arrow-right"></i></a>
                                
                            </div>
                        
                        </div>
                    
                    </div>
                    
                </div>
                
            </div>

        </div>
    
    </div>

</div>

<div class="clear"></div>

{{-- 7 --}}
<div class="instagram-full-wrapper">
    
    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                <div class="section-title">
                
                    <p class="p-top">Follow us on</p>
                    <h4>Instagram <a href="#"><i class="fa fa-at"></i> EXTRETION</a></h4>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <div class="instagram-wrapper">
        <div id="instagram" class="instagram"></div>
    </div>
    
</div>

<div class="clear"></div>

{{-- 8 --}}
<div class="bg-primary newsletter-wrapper">
    
    <div class="container">
    
        <div class="GridLex-grid-middle">
        
            <div class="GridLex-col-6_sm-12_xs-12 pt-0 pb-0">
                 <div class="text-holder">
                        <h3>Sign up for Newsletter</h3>
                        <p>Sign up to get our latest exclusive updates, deals, offers and promotions</p>
                    </div>
            </div>
            
            <div class="GridLex-col-6_sm-12_xs-12 pt-0 pb-0">
                 <form class="footer-newsletter row gap-10">
                    
                        <div class="col-xss-12 col-xs-8 col-sm-8">
                            
                            <input type="email" placeholder="Enter Your Email" class="form-control mb-0" name="email">
                        
                        </div>
                        
                        <div class="col-xss-12 col-xs-4 col-sm-4 mt-10-xss">
                            <input type="submit" class="btn btn-block btn-danger" value="Submit">
                        </div>
                        
                    </form>
            </div>
            
        </div>
        
    </div>
    
</div>

<div class="clear"></div>

@endsection