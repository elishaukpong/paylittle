@extends('layouts.dashboardclean')


    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="p-c font-weight-light"> Created Projects</h1>
                    <a href="{{route('projects.trashed')}}" class="btn btn-sm btn-danger my-3">Thrashed Projects</a>
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
                                    <a href="{{route('userProjects.show', $project->id)}}" class="btn btn-sm btn-primary">View Project</a>
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
