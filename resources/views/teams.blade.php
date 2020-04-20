@extends("layouts.user")

@section("content")
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            @foreach($data as $d) 
            <div class="col-md-2">
                <div class="card">
                    <div class="d-flex flex-column no-gutters align-items-center"> 
                        <img src="{{ asset($d->logo)}}" class="card-img" style="width:100px;" >
                        <h5 class="mt-5 text-uppercase ">{{ $d->tName }}</h5>
                        <a href="/teams/{{ $d->id }}" class="btn btn-primary">View Details </a> 
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection