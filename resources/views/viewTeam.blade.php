@extends("layouts.user")

@section("content")
    <div class="container">
        <div class="row">
             <div class="col-md-3">
                <img src="{{ asset($data[0]->image) }}" width=200>
             </div>
             <div class="col-md-3">
                <h4>Owners Name:<br>
                {{ $data[0]->name}}</h4>
             </div>
             <div class="col-md-3">
                <h4>Team Name:<br>
                {{ $data[0]->tName}}</h4>
             </div>
             <div class="col-md-3">
                <img src="{{ asset($data[0]->logo) }}" width=200>
             </div>
        </div>
        <hr>
        <p>{{ $data[0]->desc}}</p>
    </div>
@endsection
