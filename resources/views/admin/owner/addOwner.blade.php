@extends("layouts.admin")

@section("content")
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h5 class="page-title mb-1">Add Owner</h5>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Add Owner</li>
                    </ol>
                </div> 
                <div class="col-md-2">
                    <a href="/admin/owner" class="btn btn-light text-primary">View Owner</a>
                </div>
            </div> 
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="card p-2"> 
                <div class="card-body">
                    <form action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Enter the Name of Owner</label>
                                <input type="text" placeholder="Name" class="form-control  @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" />
                                @error("name")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Enter the Team Name</label>
                                <input type="text" placeholder="Team Name" class="form-control  @error('tName') is-invalid @enderror"
                                    name="tName" value="{{ old('tName') }}" />
                                @error("tName")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="">Enter the Image Owner</label>
                                <input type="file" placeholder="Image" class="form-control  @error('image') is-invalid @enderror"
                                    name="image" value="{{ old('image') }}" />
                                @error("image")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="">Enter the Team Logo</label>
                                <input type="file" placeholder="Team Logo" class="form-control  @error('logo') is-invalid @enderror"
                                    name="logo" value="{{ old('logo') }}" />
                                @error("logo")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="">Enter the Username of Owner</label>
                                <input type="text" placeholder="Username" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" />
                                @error("email")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="">Enter the Team Description</label>
                                <textarea placeholder="Team Description" class="form-control  @error('desc') is-invalid @enderror"
                                    name="desc">{{ old('desc') }}</textarea>
                                @error("desc")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> 

                            <div class="form-group col-md-6">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-primary">Add Team</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection 
