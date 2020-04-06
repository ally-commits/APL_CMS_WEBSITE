@extends('layouts.app')
 
@section('content')
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Owner's Dashboard</h4>
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome {{ Auth::user()->name }}</li>
                    </ol>
                </div> 
            </div> 
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid"> 
            <div class="row">
                @foreach($data as $d) 
                    <div class="col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <img src="{{ asset($d->logo) }}" style="width: 40px;height: 40px; border-radius: 200px;">
                                <div class="text-center">
                                    <span>{{ $d->tName }}</span><br>
                                    <span>{{ $d->name }}</span>
                                </div>
                                <img src="{{ asset($d->image) }}" style="width: 40px; height: 40px;  border-radius: 200px;">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
