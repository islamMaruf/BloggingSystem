@extends('layouts.backend.master')
@section('title')
tags
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <form id="RegisterValidation" action="{{route('admin.tags.update',$tag->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">mail_outline</i>
                            </div>
                            <h4 class="card-title">Tag name</h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                @csrf
                                <label for="exampleEmail" class="bmd-label-floating"> Enter Tag Name*</label>
                                <input type="text" class="form-control" id="exampleName" value="{{$tag->tagName}}"
                                    required="true" name="name" value="{{$tag->tagName}}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-warning">Update</button>
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
                        <h4 class="card-title">Tag List</h4>
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
                                        <th>Tag Name</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Tag Name</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php($i=1)
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$tag->tagName}}</td>
                                        <td>{{$tag->tagSlug}}</td>
                                        <td>{{ date('M j, Y h:i a',strtotime($tag->created_at)) }}</td>
                                        <td>{{ date('M j, Y h:i a',strtotime($tag->updated_at)) }}</td>
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

        var table = $('#datatable').DataTable();

        // Edit record
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });
    });

    function deleteTag(id) {
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
