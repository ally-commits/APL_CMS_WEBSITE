@extends('layouts.admin')
 
@section('content')
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Admin Dashboard</h4>
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to APL Dashboard</li>
                    </ol>
                </div> 
            </div> 
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between">
                <div class="col-md-4"> 
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title mb-4">Teams</h5>
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Total number of teams</p>
                                    <h4>{{ $count_teams }}</h4>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title mb-4">Players</h5>
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Players Registred</p>
                                    <h4>{{ $count_players}}</h4>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title mb-4">Admin</h5>
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Number of Admin</p>
                                    <h4>{{ $admin }}</h4>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <h6>TEAMS REGISTRED</h6>
            <div class="row">
                @foreach($data as $d) 
                    <div class="col-md-3">
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
