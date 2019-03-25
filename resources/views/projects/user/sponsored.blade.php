@extends('layouts.dashboardclean')


@section('content')
    <div class="jumbotron text-center payment-details-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Sponsored Projects</h1>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col"> Project Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Date Due</th>
                            <th scope="col">Returns</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projectsubscriptions as  $projectsubscription)
                            <tr>
                                <td>{{ $projectsubscription->project->name }}</td>
                                <td>{{ $projectsubscription->status->name}}</td>
                                <td>{{ $projectsubscription->formattedamount}}</td>
                                <td>{{$projectsubscription->created_at->format('l\, jS F Y')}}</td>
                                <td>{{$projectsubscription->due_date->format('l\, jS F Y')}}</td>
                                <td>{{ $projectsubscription->formattedreturns}}</td>
                                <td>
                                    <a href="{{route('project.show', $projectsubscription->project->id)}}"
                                       class="btn btn-primary">View Project</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="row my-4 text-center">
                    <div class="col-md-3 col-12 mx-auto ">
                        {{$projectsubscriptions->links()}}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
