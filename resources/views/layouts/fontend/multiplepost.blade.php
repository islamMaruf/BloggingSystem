@extends('layouts.fontend.master')
@section('header-section')
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{asset('assets/font-end')}}/assets/img/bg10.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">A Place for Entrepreneurs to Share and Discover New Stories</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-section')
    <div class="section">
        <div class="row">
            <div class="col-md-12 ml-auto mr-auto text-center">
                <ul class="nav nav-pills nav-pills-primary">
                    <li class="nav-item">
                        <a class="nav-link active" href="#pill1" data-toggle="tab">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pill2" data-toggle="tab">World</a>
                    </li>

                </ul>
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="pill1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-raised card-background" style="background-image: url('{{asset('assets/font-end')}}/assets/img/examples/office2.jpg')">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Worlds</h6>
                                        <a href="#pablo">
                                            <h3 class="card-title">The Best Productivity Apps on Market</h3>
                                        </a>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-danger btn-round">
                                            <i class="material-icons">format_align_left</i> Read Article
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-raised card-background" style="background-image: url('{{asset('assets/font-end')}}/assets/img/examples/blog8.jpg')">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Business</h6>
                                        <h3 class="card-title">Working on Wallstreet is Not So Easy</h3>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-primary btn-round">
                                            <i class="material-icons">format_align_left</i> Read Article
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-raised card-background" style="background-image: url('{{asset('assets/font-end')}}/assets/img/examples/card-project6.jpg')">
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Marketing</h6>
                                        <h3 class="card-title">0 to 100.000 Customers in 6 months</h3>
                                        <p class="card-description">
                                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                        </p>
                                        <a href="#pablo" class="btn btn-warning btn-round">
                                            <i class="material-icons">subject</i> Read Case Study
                                        </a>
                                        <a href="#pablo" class="btn btn-white btn-just-icon btn-link" title="" rel="tooltip" data-original-title="Save to Pocket">
                                            <i class="fa fa-get-pocket"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pill2"></div>
                    <div class="tab-pane" id="pill3"></div>
                    <div class="tab-pane" id="pill4"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="cd-section" id="blogs">
        <!--     *********     BLOGS 1      *********      -->
        <div class="blogs-1" id="blogs-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <h2 class="title">Latest Blogposts</h2>
                        <br>
                        <div class="card card-plain card-blog">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card-header card-header-image">
                                        <a href="#pablito">
                                            <img class="img" src="{{asset('assets/font-end')}}/assets/img/examples/card-blog4.jpg">
                                        </a>
                                        <div class="colored-shadow" style="background-image: url({{asset('assets/font-end')}}/assets/img/examples/card-blog4.jpg&quot;); opacity: 1;"></div></div>
                                </div>
                                <div class="col-md-7">
                                    <h6 class="card-category text-info">Enterprise</h6>
                                    <h3 class="card-title">
                                        <a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
                                    </h3>
                                    <p class="card-description">
                                        Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses. Today, it’s moving to a subscription model. Yet its own business model disruption is only part of the story — and…
                                        <a href="#pablo"> Read More </a>
                                    </p>
                                    <p class="author">
                                        by
                                        <a href="#pablo">
                                            <b>Mike Butcher</b>
                                        </a>, 2 days ago
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-plain card-blog">
                            <div class="row">
                                <div class="col-md-7">
                                    <h6 class="card-category text-danger">
                                        <i class="material-icons">trending_up</i> Trending
                                    </h6>
                                    <h3 class="card-title">
                                        <a href="#pablo">6 insights into the French Fashion landscape</a>
                                    </h3>
                                    <p class="card-description">
                                        Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses. Today, it’s moving to a subscription model. Yet its own business model disruption is only part of the story — and…
                                        <a href="#pablo"> Read More </a>
                                    </p>
                                    <p class="author">
                                        by
                                        <a href="#pablo">
                                            <b>Mike Butcher</b>
                                        </a>, 2 days ago
                                    </p>
                                </div>
                                <div class="col-md-5">
                                    <div class="card-header card-header-image">
                                        <img class="img img-raised" src="{{asset('assets/font-end')}}/assets/img/office2.jpg">
                                        <div class="colored-shadow" style="background-image: url(&quot;{{asset('assets/font-end')}}/assets/img/office2.jpg&quot;); opacity: 1;"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--     *********    END BLOGS 1      *********      -->


    </div>
    @include('layouts.fontend.partial.alsoSee')
@endsection
