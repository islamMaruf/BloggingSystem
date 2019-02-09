@extends('layouts.backend.master')
@section('title')
    Post
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto ">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-twitter" href="{{route('admin.posts.create')}}">Add new Post</a>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>

            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Post List<a class="btn-sm btn btn-warning ml-1">{{$posts->count()}}</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                       cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Is_Approved</th>
                                        <th>View</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Is_Approved</th>
                                        <th>View</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$post->user->info->firstName ?? 'update profile' }}</td>
                                            <td>{{str_limit($post->title,10)}}</td>
                                            <td>
                                                @if($post->status == true)
                                                    <span class="badge badge-pill badge-success">Published</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">Not Published</span>
                                                @endif()
                                            </td>
                                            <td>
                                                @if($post->is_approved == true)
                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">Not Approved</span>
                                                @endif()
                                            </td>

                                            <td>{{$post->view_count}}</td>
                                            <td>{{ date('M j, Y h:i a',strtotime($post->created_at)) }}</td>
                                            <td>{{ date('M j, Y h:i a',strtotime($post->updated_at)) }}</td>
                                            <td class="td-actions text-center">
                                                <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-info btn-round edit"><i
                                                            class="material-icons">visibility</i></a>
                                                <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-success btn-round edit"><i
                                                            class="material-icons">edit</i></a>
                                                <a class="btn btn btn-danger btn-round remove" onclick="deletePost({{$post->id}})"><i
                                                            class="material-icons">close</i></a>
                                                <form id="delete-form-{{$post->id}}" action="{{route('admin.posts.destroy',$post->id)}}"
                                                      method="post" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
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


        });

        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

    </script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

@endpush

