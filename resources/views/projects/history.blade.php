@extends('layouts.dashboardclean')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="p-c font-weight-light"> Projects History</h1>
                <br>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col"> Project Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Start Date</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allProjects as $key => $project)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->status->name}}</td>
                                <td>{{ $project->formattedamount}}</td>
                                <td>{{$project->created_at}}</td>
                                <td>
                                    <a href="{{route('project.show', $project->id)}}"
                                       class="btn btn-primary btn-sm">View Project</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="row my-4 text-center">
                    <div class="col-md-3 col-12 mx-auto ">
                        {{-- {{$projectsubscriptions->links()}} --}}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
