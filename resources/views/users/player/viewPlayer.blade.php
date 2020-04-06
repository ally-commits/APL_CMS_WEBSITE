@extends('layouts.app')
 
@section('content')
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Player's Registred</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Player's</li>
                    </ol>
                </div> 
            </div> 
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid"> 
            <div class="row">
                @foreach($data as $d) 
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body p-2 d-flex justify-content-around  align-items-center">
                                <div>
                                    <img src="{{ asset($d->image) }}" style="width: 80px;height: 80px; border-radius: 200px;"><br>
                                    <span><b>{{ $d->name }}</b></span>
                                </div>
                                <div class="text-left"> 
                                    <span>Player Number: <b>{{ $d->id }}</b></span><br>
                                    <span>+91 {{ $d->phoneNumber }}</span><br>
                                    <span>{{ $d->category }}</span><br>
                                    <span>{{ $d->class }}</span>
                                </div> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
