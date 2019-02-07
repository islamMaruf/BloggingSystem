@extends('layouts.backend.master')
@section('title')
    editPost
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <form id="RegisterValidation" action="{{route('author.posts.update',$post->id)}}" method="post"
                  novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <h4 class="card-title">Enter Post Information</h4>
                            </div>
                            <div class="card-body ">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Enter Post Title *</label>
                                    <input type="text" class="form-control" required="true" aria-required="true"
                                           name="title" value="{{$post->title}}">
                                </div>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('storage/post/'.$post->image)}}" alt="img_source"
                                             height="120px" width="120px">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div class="text-left">
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new">Select Title image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image"/>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right text-info">
                                <div class="form-check mr-auto">
                                    <label class="form-check-label" id="lebel">
                                        <input class="form-check-input" name="publish" type="checkbox"
                                               {{$post->status ? 'checked': ''}}   aria-required="true"
                                               onclick="toggle()">Published
                                        <span class="form-check-sign ">
                          <span class="check "></span>
                        </span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <h4 class="card-title">Select Category ang Tag</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-lg-5 col-md-6 col-sm-3 ml-auto mr-auto">
                                        <select class="selectpicker" data-style="btn btn-primary" multiple
                                                title="Choose Category" data-size="" name="category[]">
                                            <option disabled> Multiple Options</option>
                                            @foreach($categories as $category)
                                                <option
                                                    @foreach($post->categories as $postCategory)
                                                    {{ $postCategory->id == $category->id ? 'selected' : '' }}
                                                    @endforeach
                                                    value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-3 ml-auto mr-auto">
                                        <select class="selectpicker" data-style="btn btn-primary" multiple
                                                title="Choose Tag" data-size="" name="tag[]">
                                            <option disabled> Multiple Options</option>
                                            @foreach($tags as $tag)
                                                <option
                                                    @foreach($post->tags as $postTag)
                                                    {{$postTag->id ==$tag->id ? 'selected': ''}}
                                                    @endforeach
                                                    value="{{$tag->id}}">{{$tag->tagName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="card">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mail_outline</i>
                                </div>
                                <h4 class="card-title">Enter Post Body</h4>
                            </div>
                            <div class="card-body">
                                <label for="mytextarea"></label>
                                <textarea name="body" id="tiny">{{$post->body}}</textarea>
                            </div>

                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function setFormValidation(id) {
            $(id).validate({
                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');

                },
                success: function (element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');

                },
                errorPlacement: function (error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $(document).ready(function () {
            setFormValidation('#RegisterValidation');
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
            tinymce.init({
                selector: 'textarea#tiny',
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });


        });

        function toggle() {
            $('#lebel').toggleClass('text-primary')


        }


    </script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=dqzog8yc16wkc8qrjukzdeai8vxrn9ht01bfba31og65rjv5"></script>

@endpush
