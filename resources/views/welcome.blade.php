@extends('vendor.grayscale.master')



@section('body')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">OHMWERKS</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data
                    -target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#download">Featured</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarProducts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarProduct">
                            <a class="dropdown-item" href="/products">All Products</a>
                            @if ( isset($categories))
                                @foreach($categories AS $category)
                                    <a class="dropdown-item" href="/products/{{$category['nav_name']}}">{{$category['name']}}</a>
                                @endforeach
                            @endif

                        </div>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">OhmWerks</h1>
                        <p class="intro-text">OHMwerk Crafts, manufacturers of beautifully hand-crafted mods. Made in the USA.  </p>
                        <a href="#about" class="btn btn-circle js-scroll-trigger">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>About OHMWERKS</h2>
                    <p>OHMWERKS creates hand-crafted vap mods using high-quality material, all made in the USA.</p>
<p>We are located in Jacksonville, FL. </p>
                    <p>Wholesale is available. </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="featured-section content-section text-center">
        <div class="container">
            <div class="col-lg-12 mx-auto">
                <h2>Featured </h2>
                <div class="row">
              @if ( isset($featured))
                  @foreach($featured AS $feature )
                      <div class="col-md-4 text-center">
                          <div class="box">
                            <div class="box-header">

                            <img src="{!! $feature->photo_location !!}"  class="img-fluid"/>
                            </div>
                              <div class="box-body">   <br /> <p><a href="product/{{$feature->id}}">{{$feature->name}}</a><br />${{$feature->price}}</p></div>
                          </div>
                      </div>
                        @endforeach
                  @endif

                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contact Start Bootstrap</h2>
                    <p>Feel free to leave us a comment on the
                        <a href="http://startbootstrap.com/template-overviews/grayscale/">Grayscale template overview page</a>
                        on Start Bootstrap to give some feedback about this theme!</p>
                    <ul class="list-inline banner-social-buttons">
                        <li class="list-inline-item">
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg">
                                <i class="fa fa-twitter fa-fw"></i>
                                <span class="network-name">Twitter</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/BlackrockDigital/startbootstrap" class="btn btn-default btn-lg">
                                <i class="fa fa-github fa-fw"></i>
                                <span class="network-name">Github</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg">
                                <i class="fa fa-google-plus fa-fw"></i>
                                <span class="network-name">Google+</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Your Website 2018</p>
        </div>
    </footer>
@stop


