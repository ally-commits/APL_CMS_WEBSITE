@extends("layouts.admin")

@section("css")
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  
@endsection

@section("js") 
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
@section("content")
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h5 class="page-title mb-1">View Owner</h5>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">View Owner</li>
                    </ol>
                </div> 
                <div class="col-md-2">
                    <a href="/admin/owner/create" class="btn btn-light text-primary">Add Owner</a>
                </div>
            </div> 
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="card p-4">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" >
                    <thead>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Owner Image</th>
                        <th>Email</th>
                        <th>Team Name</th>
                        <th>Team Logo</th>
                        <th>Team Desc</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($data as $key=>$d)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $d->name }}</td>
                                <td><img src="{{ asset($d->image) }}" width=50 height=50 /></td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->tName }}</td>
                                <td><img src="{{ asset($d->logo) }}" width=50 height=50 /></td>
                                <td>{{ $d->desc }}</td>
                                <td>
                                    <a href="/admin/owner/{{$d->id}}/edit">Edit</a>
                                    <a href="/admin/owner/delete/{{$d->id}}">| Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@endsection