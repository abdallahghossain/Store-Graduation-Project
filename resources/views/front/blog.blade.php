@extends('front.parent')
@section('title' , '| Blog')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('cms/images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
                    <h1 class="mb-0 bread">Blog</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-last ftco-animate">
                    <div class="row">
                       @foreach ($blog as $item )

                       <div class="col-md-12 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch d-md-flex">
                            <a href="blog-single.html" class="block-20">
                             <img class="img-fluid" src="{{ asset('images/blog/'.$item->image)}}" alt="" >
                            </a>
                            <div class="text d-block pl-md-4">

                                <h3 class="heading"><a href="#">{{ $item->name}}</a></h3>
                                <p>{{ $item->description}}.</p>
                                <p><a href="{{ $item->url }}" class="btn btn-primary py-2 px-3">Read more</a></p>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> {{$item->date}}</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                       @endforeach
                        {{$blog->links()}}
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Shoes <span>(12)</span></a></li>
                            <li><a href="#">Men's Shoes <span>(22)</span></a></li>
                            <li><a href="#">Women's <span>(37)</span></a></li>
                            <li><a href="#">Accessories <span>(42)</span></a></li>
                            <li><a href="#">Sports <span>(14)</span></a></li>
                            <li><a href="#">Lifestyle <span>(140)</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection
