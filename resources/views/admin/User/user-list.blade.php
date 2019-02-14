@extends('layouts.backend.master')
@section('title')
    Post
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">User List<a class="btn-sm btn btn-warning ml-1">{{$users->count()}}</a></h4>
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
                                        <th>Author name</th>
                                        <th>Approved post</th>
                                        <th>Pending Post</th>
                                        <th>View Count</th>
                                        <th>Total Post</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Author name</th>
                                        <th>Approved post</th>
                                        <th>Pending Post</th>
                                        <th>View Count</th>
                                        <th>Total Post</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $user->info->firstName ? $user->info->firstName.' '.$user->info->lastName : 'N/A'}} </td>
                                            <td>15</td>
                                            <td>15</td>
                                            <td>25</td>
                                            <td>{{$user->posts->count()}}</td>
                                            <td>{{ date('M j, Y h:i a',strtotime($user->created_at)) }}</td>
                                            <td>{{ date('M j, Y h:i a',strtotime($user->updated_at)) }}</td>
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

        $(document).ready(function () {
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



    </script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

@endpush
