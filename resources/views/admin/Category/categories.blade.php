@extends('layouts.backend.master')
@section('title')
categories
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <form id="RegisterValidation" action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">mail_outline</i>
                            </div>
                            <h4 class="card-title">Category name</h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                @csrf
                                <label for="exampleEmail" class="bmd-label-floating"> Enter Category Name*</label>
                                <input type="text" class="form-control" required="true" name="name">
                            </div>
                             <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset('assets/back-end/assets/img/image_placeholder.jpg')}}" alt="img_source" height="120px" width="120px">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail " ></div>
                                <div class="text-left">
                                    <span class="btn btn-primary btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image" />
                                    </span>

                                </div>
                             </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Category List</h4>
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
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th> Name</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php($i=1)
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td><img style="border-radius: 50%" width="60px" height="60px" src="{{asset('storage/category/'.$category->image)}}" alt="category"></td>
                                        <td>{{ date('M j, Y h:i a',strtotime($category->created_at)) }}</td>
                                        <td>{{ date('M j, Y h:i a',strtotime($category->updated_at)) }}</td>
                                        <td class="td-actions text-center">
                                            <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-success btn-round edit"><i
                                                    class="material-icons">edit</i></a>
                                            <a class="btn btn btn-danger btn-round remove" onclick="deleteCategory({{$category->id}})"><i
                                                    class="material-icons">close</i></a>
                                            <form id="delete-form-{{$category->id}}" action="{{route('admin.categories.destroy',$category->id)}}"
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

    function deleteCategory(id) {
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
