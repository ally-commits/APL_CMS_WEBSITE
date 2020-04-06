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
            <a href="/player-register" class="btn btn-primary text-center">Register Player</a>
        </div>
    </div>
@endsection