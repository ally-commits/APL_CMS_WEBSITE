@extends("layouts.user")

@section("content")
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $d) 
            <div class="col-md-3">
                <div class="card">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-4">
                            <img src="{{ asset($d->logo)}}" class="card-img" style="width:100px;" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $d->tName }}</h5>
                                <p><b> Owner:</b>{{ $d->name }}</p>
                                <span class="card-muted">{{ $d->desc }}</span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection