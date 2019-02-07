@extends('layouts.backend.master')
@section('title')
    editPost
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-info">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active show" href="#profile" data-toggle="tab">
                                                <i class="material-icons">edit</i> Post Info
                                                <div class="ripple-container"></div></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons">chat</i> Post Body
                                                <div class="ripple-container"></div></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#settings" data-toggle="tab">
                                                <i class="material-icons">panorama</i>Post Image
                                                <div class="ripple-container"></div></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="profile">
                                    <h4 class="card-title">Post Title</h4>
                                    <p class="card-category">{{$post->title}}</p>
                                    <h4 class="card-title">Post Tags</h4>
                                    <p class="card-category">
                                        @foreach($post->tags as $tag)
                                        {{$tag->tagName}} @if($loop->last)  @else , @endif
                                        @endforeach</p>
                                    <h4 class="card-title">Post Categories</h4>
                                    <p class="card-category">
                                        @foreach($post->categories as $category)
                                        {{$category->name}}
                                        @endforeach</p>
                                    <h4 class="card-title">Post Status</h4>
                                    <button  {{$post->status ?'disabled' : '' }} class="btn {{$post->status ? 'btn-success' : 'btn-danger' }}  " onclick="statusChange({{$post->id}})">{{$post->status ? 'Published' : 'Not Published' }}</button>
                                    <form id="status-form-{{$post->id}}" action="{{route('a.status',$post->id)}}" method="post" style="display: none">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                    <h4 class="card-title">Approve Status</h4>
                                    <button class="btn text-white {{$post->is_approved ? 'btn-primary':'btn-danger'}}" disabled >{{ $post->is_approved ? 'Approved ':'Not Approved' }}</button>
                                    



                                </div>
                                <div class="tab-pane" id="messages">
                                    <p class="card-category">{!! $post->body !!}</p>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <div class="col-md-6 ml-auto mr-auto">
                                        <div class="card card-background" style="background-image: url({{asset('storage/post/'.$post->image)}})">
                                            <div class="card-body"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Tabs with icons on Card -->
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
    function statusChange(id)
    {
        event.preventDefault();
        document.getElementById('status-form-'+id).submit();
    }
    </script>
@endpush

