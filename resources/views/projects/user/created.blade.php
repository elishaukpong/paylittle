@extends('layouts.dashboardclean')


    @section('content')
        <div class="jumbotron text-center project-jumbotron ">
            <div class="jumbotron-cover py-4">
                <h1 class="font-weight-bold text-white ">My Projects</h1>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12  py-2 rounded">
                    <ul class=" text-center list-inline mb-3">
                        <li class="list-inline-item">
                            <a href="" class="btn btn-sm my-2 btn-primary px-5 mx-2" data-toggle="pill" id="pills-all-tab" role="tab" aria-controls="pills-all" aria-selected="true">All Projects</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('projects.trashed')}}" class="btn btn-sm my-2 btn-danger px-5 mx-2" data-toggle="pill" id="pills-thrashed-tab" role="tab" aria-controls="pills-thrashed" aria-selected="true">Thrashed Projects</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="btn btn-sm my-2 btn-primary px-5 mx-2" data-toggle="pill" id="pills-pending-tab" role="tab" aria-controls="pills-pending" aria-selected="true">Pending Projects</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="btn btn-sm my-2 btn-success px-5 mx-2" data-toggle="pill" id="pills-approved-tab" role="tab" aria-controls="pills-approved" aria-selected="true">Approved Projects</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="" class="btn btn-sm my-2 btn-danger px-5 mx-2" data-toggle="pill" id="pills-rejected-tab" role="tab" aria-controls="pills-rejected" aria-selected="true">Rejected Projects</a>
                        </li>
                    </ul>

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
                            <th scope="col">Repayment Amount</th>
                            <th scope="col">Repayment Plan</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $key => $project)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->status->name}}</td>
                                <td>{{ $project->formattedamount}}</td>
                                <td>{{$project->formattedrepaymentamount}}</td>
                                <td>{{$project->repaymentplan->timeline}}</td>
                                <td>
                                    <a href="{{route('project.show', $project->id)}}" class="btn btn-sm btn-primary">View Project</a>
                                </td>
                                <td>
                                    <form action="{{route('userProjects.delete', $project->id)}}" method="post">
                                        @csrf @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger cp-delete" data-id="{{$project->id}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Thrash Project</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                    <div class="row my-4 text-center">
                        <div class="col-md-3 col-12 mx-auto ">
                            {{$projects->links()}}
                        </div>
                    </div>
                    {{--<a href="" class="btn btn-secondary my-4">See Joined Classes</a>--}}
                    {{--<a href="" class="btn btn-secondary my-4">Information Board</a>--}}
                </div>
            </div>
        </div>

    @endsection
