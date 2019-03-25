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
                    <ul class=" text-center  mb-3 nav nav-pills" id="pills-tab" role="tablist">



                        <li class="nav-link">
                            <a href="#pills-all" class="btn btn-sm my-2 btn-primary px-5 " data-toggle="pill" id="pills-all-tab" role="tab" aria-controls="pills-all" aria-selected="true">All Projects</a>
                        </li>

                        <li class="nav-link">
                            <a href="#pills-thrashed" class="btn btn-sm my-2 btn-danger px-5 " data-toggle="pill" id="pills-thrashed-tab" role="tab" aria-controls="pills-thrashed" aria-selected="false">Thrashed Projects</a>
                        </li>

                        <li class="nav-link">
                            <a href="#pills-pending" class="btn btn-sm my-2 btn-primary px-5 " data-toggle="pill" id="pills-pending-tab" role="tab" aria-controls="pills-pending" aria-selected="false">Pending Projects</a>
                        </li>

                        <li class="nav-link ">
                            <a href="#pills-approved" class="btn btn-sm my-2 btn-success px-5 " data-toggle="pill" id="pills-approved-tab" role="tab" aria-controls="pills-approved" aria-selected="true">Approved Projects</a>
                        </li>

                        <li class="nav-link ">
                            <a href="#pills-rejected" class="btn btn-sm my-2 btn-danger px-4 " data-toggle="pill" id="pills-rejected-tab" role="tab" aria-controls="pills-rejected" aria-selected="true">Rejected Projects</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
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
                                        @foreach($allUserProjects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->status->name}}</td>
                                            <td>{{ $project->formattedamount}}</td>
                                            <td>{{$project->formattedrepaymentamount}}</td>
                                            <td>{{$project->repaymentplan->timeline}}</td>
                                            <td>
                                                <a href="{{route('project.show', $project->id)}}" class="btn btn-sm btn-primary">View Project</a>
                                            </td>
                                            <td>
                                                <form action="{{route('project.delete', $project->id)}}" method="post">
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
                            {{-- Pagination --}}
                            <div class="row my-4 text-center">
                                <div class="col-md-3 col-12 mx-auto ">
                                    {{$allUserProjects->links()}}
                                </div>
                            </div>
                        </div>

                        {{-- Thrashed Projects --}}
                        <div class="tab-pane fade" id="pills-thrashed" role="tabpanel" aria-labelledby="pills-thrashed-tab">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
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
                                        @foreach($thrashedUserProjects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->status->name}}</td>
                                            <td>{{ $project->formattedamount}}</td>
                                            <td>{{$project->formattedrepaymentamount}}</td>
                                            <td>{{$project->repaymentplan->timeline}}</td>
                                            <td>
                                                <a href="{{route('project.restore', $project->id)}}" class="btn btn-sm btn-primary">Restore Project</a>
                                            </td>
                                           <td>
                                                <form action="{{route('project.destroy', $project->id)}}" method="post">
                                                    @csrf @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger tp-delete" data-id="{{$project->id}}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete Project</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                            {{-- Pagination --}}
                            <div class="row my-4 text-center">
                                <div class="col-md-3 col-12 mx-auto ">
                                    {{$thrashedUserProjects->links()}}
                                </div>
                            </div>

                        </div>
                        {{-- Pending Projects --}}
                        <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
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
                                        @foreach($pendingUserProjects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->status->name}}</td>
                                            <td>{{ $project->formattedamount}}</td>
                                            <td>{{$project->formattedrepaymentamount}}</td>
                                            <td>{{$project->repaymentplan->timeline}}</td>
                                            <td>
                                                <a href="{{route('project.show', $project->id)}}" class="btn btn-sm btn-primary">View Project</a>
                                            </td>
                                            <td>
                                                <form action="{{route('project.delete', $project->id)}}" method="post">
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
                            {{-- Pagination --}}
                            <div class="row my-4 text-center">
                                <div class="col-md-3 col-12 mx-auto ">
                                    {{$pendingUserProjects->links()}}
                                </div>
                            </div>
                        </div>

                        {{-- Approved Projects --}}
                        <div class="tab-pane fade" id="pills-approved" role="tabpanel" aria-labelledby="pills-approved-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
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
                                        @foreach($approvedUserProjects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->status->name}}</td>
                                            <td>{{ $project->formattedamount}}</td>
                                            <td>{{$project->formattedrepaymentamount}}</td>
                                            <td>{{$project->repaymentplan->timeline}}</td>
                                            <td>
                                                <a href="{{route('project.show', $project->id)}}" class="btn btn-sm btn-primary">View Project</a>
                                            </td>
                                            <td>
                                                <form action="{{route('project.delete', $project->id)}}" method="post">
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

                            {{-- Pagination --}}
                            <div class="row my-4 text-center">
                                <div class="col-md-3 col-12 mx-auto ">
                                    {{$approvedUserProjects->links()}}
                                </div>
                            </div>
                        </div>

                        {{-- Rejected Projects --}}
                        <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
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
                                        @foreach($rejectedUserProjects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->status->name}}</td>
                                            <td>{{ $project->formattedamount}}</td>
                                            <td>{{$project->formattedrepaymentamount}}</td>
                                            <td>{{$project->repaymentplan->timeline}}</td>
                                            <td>
                                                <a href="{{route('project.show', $project->id)}}" class="btn btn-sm btn-primary">View Project</a>
                                            </td>
                                            <td>
                                                <form action="{{route('project.delete', $project->id)}}" method="post">
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
                            {{-- Pagination --}}
                            <div class="row my-4 text-center">
                                <div class="col-md-3 col-12 mx-auto ">
                                    {{$rejectedUserProjects->links()}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        {{-- <div class="row my-4 text-center">
            <div class="col-md-3 col-12 mx-auto ">
                {{$allUserProjects->links()}}
            </div>
        </div> --}}

    @endsection
