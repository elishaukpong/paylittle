@extends('layouts.dashboardclean')

@section('content')
    <div class="jumbotron text-center project-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Project Details</h1>
        </div>
    </div>

    <div class="mt-5 pt-4"></div>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6 col-12">
                <img class="card-img-top img-fluid img-thumbnail" src="{{asset($project->photo->projectavatar)}}"
                     alt="Card image cap">
            </div>

            <div class="col-md-5 col-12 offset-md-1 text-secondary mt-lg-4">
                <div class="row my-4">
                    <div class="col-6">
                        <h5 class="text-primary font-weight-bold">Project Name: </h5>
                        <p> {{$project->name}}</p>
                    </div>
                    <div class="col-6">
                        <h5 class="text-primary font-weight-bold">Project Amount: </h5>
                        <p> {{$project->formattedamount}}</p>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-6">
                        <h5 class="text-primary font-weight-bold">Project Duration: </h5>
                        <p>{{$project->duration->formattedTimeline}}</p>
                    </div>
                    <div class="col-6">
                        <h5 class="text-primary font-weight-bold">Project Returns: </h5>
                        <p class="mr-5 pr-5 text-justify"> {{$project->formattedreturnspercentage}}<p>

                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <h5 class="text-primary font-weight-bold">Project Details: </h5>
                        <p class=" text-justify" style="word-break: break-word"> {{$project->details}}<p>
                    </div>
                </div>
                @guest
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal"
                            data-target="#exampleModal">
                        Sponsor Project
                    </button>
                    @else
                    @if(Auth::user()->id != $project->user->id && !Auth::user()->is_admin)
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary form-control" data-toggle="modal"
                                data-target="#exampleModal">
                            Sponsor Project
                        </button>
                    @endif
                @endguest
                    <br>
                    @if ($errors->has('amount'))
                        <span class="text-danger" role="alert">
                <strong>{{ $errors->first('amount') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <hr class="mt-4">
        @auth
            @if(Auth::user()->id == $project->user->id)
                <div class="float-right text-white">

                    <a class="btn btn-primary btn-sm badge-pill" href="{{route('project.edit', $project->id)}}">
                        Edit Project
                    </a>
                    <a class="btn btn-danger btn-sm badge-pill " data-toggle="modal" data-target="#deleteModal">
                        Delete Project
                    </a>
                </div>
            @endif
        @endauth


    </div>



    <!-- Sponsor Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary border border-rounded">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Sponsor Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('sponsor.project', $project->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group" data-toggle="tooltip" data-placement="top" title="Amount to sponsor!">
                            <select name="amount" id="sponsoramount" class="form-control">
                                <option value="null" selected>Sponsorship Amount</option>
                                @foreach($sponsorshipAmounts as $amount)
                                    <option value="{{$amount->amount}}" {{$amountremaining < $amount->amount ? 'disabled' : ''}}>{{$amount->amount}}
                                        Thousand
                                    </option>
                                @endforeach
                                <option id="other" value="others" data ="{{$amountremaining}}">Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        NGN
                                    </div>
                                </div>
                                <input id="others" type="text"
                                       class="form-control {{ $errors->has('others') ? ' is-invalid' : '' }}"
                                       name="others"  placeholder="Choose Other Above" disabled>

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text py-0">
                                        Proposed Return NGN
                                    </div>
                                </div>
                                <div class="input-group-append">
                                    <div class="input-group-text py-0">
                                        <p id="proposedamount" class="mt-3" aria="{{$project->id}}">NGN 0,000 </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="">

                            <small class="text-danger">Don't Sponsor above NGN{{number_format($amountremaining)}}</small>
                        </div>

                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Sponsor Project</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Delete Project Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete {{$project->name}}'s Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">
                    <h4>Do you really want to delete this project?</h4>
                    <small>N/B: It will be moved to thrash</small>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{route('project.delete', $project->id)}}" class="btn btn-primary">Delete Project</a>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/hits.js') }}" defer></script>


    @guest
        <script>
            $(document).ready(function () {
                increaseprojectHit("{{$project->id}}");
            });
        </script>
    @else
        @if(Auth::user()->id != $project->user->id)
            <script>
                $(document).ready(function () {
                    increaseprojectHit("{{$project->id}}");
                });
            </script>
        @endif
    @endguest

@endsection
