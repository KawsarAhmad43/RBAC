@extends('admin.layout.master')

@section('title', 'User List')

@section('content')
<div class="row">
    <div class="row flex-grow">
        <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded table-darkBGImg">
                <div class="card-body">
                    <div class="col-sm-8">
                        <h3 class="text-white upgrade-info mb-0"> Manage <span class="fw-bold">User Permissions</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="home-tab">
            <div class="row">
                @foreach($roles as $role)
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $role->name }}</h5>
                                @foreach($role->users as $user)
                                    <p>{{ $user->name }}</p>
                                @endforeach
                                <button type="button" class="btn btn-success btn-rounded btn-fw">Manage</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title">Add more</h5>
                                <button type="button" class="btn btn-success btn-rounded btn-fw">Add More +</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
