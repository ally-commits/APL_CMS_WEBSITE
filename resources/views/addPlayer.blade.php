@extends("layouts.user")

@section("content")
    <div class="container">
        @if(Session::has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ Session::get('failed') }}
            </div>
        @endif
        <div class="card p-2">
            <div class="card-header">
                <h5>Player Registration</h5>
            </div>
            <div class="card-body">
                <form action="/payment" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Enter the Name</label>
                            <input type="text" placeholder="Name" class="form-control  @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" />
                            @error("name")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Enter the Phone Number</label>
                            <input type="number" placeholder="Phone Number" class="form-control  @error('phoneNumber') is-invalid @enderror"
                                name="phoneNumber" value="{{ old('phoneNumber') }}" />
                            @error("phoneNumber")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>  
                        <div class="form-group col-md-6">
                            <label for="">Enter the Class</label>
                            <input type="text" placeholder="Class" class="form-control  @error('class') is-invalid @enderror"
                                name="class" value="{{ old('class') }}" />
                            @error("class")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Enter the Category</label>
                            <select name="category" class="form-control  @error('category') is-invalid @enderror">
                                <option>Bowling(Right)</option>
                                <option>Bowling(Left)</option>
                                <option>All-rounder</option>
                                <option>Batsman (Left)</option>
                                <option>Batsman (Right)</option>
                            </select>
                            @error("category")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Enter the Image of Player</label>
                            <input type="file" placeholder="Image" class="form-control  @error('image') is-invalid @enderror"
                                name="image" value="{{ old('image') }}" />
                            @error("image")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>  
                    </div> 
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection 
