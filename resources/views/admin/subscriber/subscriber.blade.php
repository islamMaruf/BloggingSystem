@extends('layouts.backend.master')
@section('title')
    Post
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Subscriber List<a
                                        class="btn-sm btn btn-warning ml-1">{{$subscribers->count()}}</a></h4>
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
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="disabled-sorting text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($subscribers as $subscriber)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$subscriber->email}}</td>
                                            <td>{{ date('M j, Y h:i a',strtotime($subscriber->created_at)) }}</td>
                                            <td>{{ date('M j, Y h:i a',strtotime($subscriber->updated_at)) }}</td>
                                            <td class="td-actions text-center">
                                                <a class="btn btn btn-danger btn-round remove" onclick="deletePost({{$subscriber->id}})"><i
                                                            class="material-icons">close</i></a>
                                                <form id="delete-form-{{$subscriber->id}}" action="{{route('admin.subscriber',$subscriber->id)}}"
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

