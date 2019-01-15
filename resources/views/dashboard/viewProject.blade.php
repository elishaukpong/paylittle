@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">View Project</h1>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <div class="col-4">
            <img class="card-img-top img-fluid" src="{{asset('storage/avatars/projects/'. $project->avatar)}}" alt="Card image cap">
        </div>
        <div class="col-8">
            <h5>Project Name: </h5>
                <p> {{$project->name}}</p>
            <h5>Project Amount: </h5>
                <p> {{$project->amount}}</p>
            <h5>Project Details: </h5>
                <p class="mr-5 pr-5 text-justify"> {{$project->details}}<p>
            <h5>Tags</h5>
            <a href="#" class="btn btn-sm btn-outline-primary"><small>Real Estate</small></a>
            <a href="#" class="btn btn-sm btn-outline-secondary"><small></small>PayLittle</a>
            <a href="#" class="btn btn-sm btn-outline-danger "><small>Personal</small></a>

            <h5 class="mt-3">Status:</h5>
            <a href="#" class="btn btn-sm btn-outline-{{$project->status->status == "accepted" ? 'success' : ($project->status->status == "pending" ? 'secondary':'danger')}}"><small>Project {{$project->status->status}}</small></a>

            <br><br>
            @if(Auth::user()->id != $project->user->id)
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal">
                    Sponsor Project
                </button>
            @endif
        </div>
    </div>
    <hr class="mt-4">

   
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sponsor Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Project Amount Needed: </h5>
                <p> N {{$project->amount}}</p>

                <div class="form-group">
                    <label for="gender">Sponsorship Amount</label>

                    <select name="amount" id="sponsoramount" class="form-control">
                        <option value="null" selected>Sponsorship Amount</option>
                        <option value="10">10 Thousand</option>
                        <option value="20">20 Thousand</option>
                        <option value="30">30 Thousand</option>
                        <option value="40">40 Thousand</option>
                        <option value="50">50 Thousand</option>

                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Sponsor Project</button>
            </div>
        </div>
    </div>
</div>
@endsection
