@extends('vendor.grayscale.master')



@section('body')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/">OHMWERKS</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarProducts" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarProduct">
                            <a class="dropdown-item" href="/products">All Products</a>
                            @if ( isset($categories))
                                @foreach($categories AS $category)
                                    <a class="dropdown-item"
                                       href="/products/{{$category['nav_name']}}">{{$category['name']}}</a>
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





    <!-- Download Section -->
    <section id="products" class="products-section content-section text-center">
        <div class="container">
            <div class="col-lg-12 mx-auto">
                <h2>Products </h2>
                <div class="row">
                    @if ( isset($products))
                        @foreach($products AS $product )
                            <div class="col-md-3">
                                <div class="box">
                                    <div class="box-header">
                                        <a href="product/{{$product->id}}"><img src="{!! $product->photo_location !!}"
                                                                                 class="img-fluid"/></a>
                                    </div>
                                    <div class="box-body">
                                        <p><strong>  <a href="product/{{$product->id}}">{{ $product->productName }}</a></strong><br/>${{ $product->price}}</p>
                                    </div>
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
                    <h2>Contact Us</h2>

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
            <p>OHMWERKS 2018</p>
        </div>
    </footer>
@stop


