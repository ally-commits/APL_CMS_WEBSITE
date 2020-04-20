@extends("layouts.user")

@section("content")
    <div>
        <div class="container">
            @if(Session::has('message')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide m-auto" data-ride="carousel" style="height: 90vh; width: 99vw; margin:0 !important;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block mx-auto" src="{{ asset('img/bg/1.jpg') }}" alt="First slide" style="height: 90vh; width: 99vw;">
            </div>
            <div class="carousel-item">
                <img class="d-block mx-auto" src="{{ asset('img/bg/2.png') }}" alt="Second slide" style="height: 90vh; width: 99vw;">
            </div>
            <div class="carousel-item">
                <img class="d-block mx-auto" src="{{ asset('img/bg/3.jpg') }}" alt="Third slide" style="height: 90vh; width: 99vw;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container my-5">
        <a href="/player-register" class="btn btn-primary text-center">Register Player</a>
    </div>
@endsection