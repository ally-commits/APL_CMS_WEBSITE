@extends("layouts.admin")

@section("content")
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h5 class="page-title mb-1">Generate Fixture</h5>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">fixture</li>
                    </ol>
                </div>  
                <div class="col-md-2">
                    <button class="btn btn-light text-primary">Print Fixture</button>
                </div>
            </div> 
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="card p-4"> 
                <div class="card-body row">
                    @foreach($data as $key=>$d)
                        @if($key%2 == 0)
                            <div class="col-md-5 mb-2 d-flex align-items-center">
                                <img src="{{ asset($d->logo) }}" class="mr-2" style="width: 80px; height: auto;">
                                <div>
                                    <h5 class="text-right">{{ $d->tName }}</h5>
                                    <span class="text-muted">Owner - {{$d->name }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 d-flex align-items-center justify-content-center">
                                VS
                            </div>
                        @else
                            <div class="col-md-5 mb-2 d-flex align-items-center" style="justify-content: flex-end;">
                                <div>
                                    <h5 class="text-right">{{ $d->tName }}</h5>
                                    <span class="text-muted">Owner - {{$d->name }}</span>
                                </div>
                                <img src="{{ asset($d->logo) }}" class="ml-2" style="width: 80px; height: auto;">
                            </div>
                        @endif 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection