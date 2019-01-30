@extends('layouts.admindashboard')
    @section('notifications')
        {{--<div class="container my-4">--}}
            {{--<div class="row justify-content-center">--}}
                {{--<div class="col-md-8 mx-auto text-center">--}}
                    {{--@if ($user->email_verified_at == null)--}}
                        {{--<script>--}}
                            {{--swal("Your account is not verified!","", "info",{--}}
                                {{--buttons: ["Verify", "Cancel"],--}}
                            {{--});--}}
                        {{--</script>--}}
                    {{--@endif--}}

                    {{--@if (\Session::has('success'))--}}
                        {{--<script>--}}
                            {{--swal("{{ \Session::get('success') }}","", "success");--}}
                        {{--</script>--}}
                    {{--@endif--}}
                    {{--@if (\Session::has('error'))--}}
                        {{--<script>--}}
                            {{--swal("{{ \Session::get('error') }}","", "error");--}}

                        {{--</script>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    @endsection

   
    
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="p-c font-weight-light"> Admin Area : All Project Subscriptions</h1>
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
                            <th scope="col">Project Name</th>
                            <th scope="col">Sponsor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Returns</th>
                            <th scope="col">Timeline</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projectsubscriptions as $key => $projectsubscription)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $projectsubscription->project->name }} {{ $projectsubscription->last_name }}</td>
                                <td>{{ $projectsubscription->user->fullname}}</td>
                                <td>{{ $projectsubscription->status->name}}</td>
                                <td>{{ $projectsubscription->formattedamount}}</td>
                                <td>{{ $projectsubscription->formattedreturns}}</td>
                                <td>{{ $projectsubscription->project->duration->formattedTimeline}}</td>
                                <td>
                                    <div class="form-group">
                                        <select  class="form-control subscriptionStatus  {{ $errors->has('status_id') ? ' is-invalid' : '' }}" name="duration_id">
                                            @foreach($statuses as $status)
                                                @if($status->id == $projectsubscription->status->id)
                                                    <option class="subscriptionId" projectid="{{$projectsubscription->id}}"
                                                            value="{{$status->id}}" selected>{{$status->name}}</option>
                                                @else
                                                <option class="subscriptionId" projectid="{{$projectsubscription->id}}"
                                                        value="{{$status->id}}">{{$status->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('duration_id'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('duration_id') }}</strong>
                                </span>
                                        @endif
                                    </div>
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
                    {{--<a href="" class="btn btn-secondary my-4">See Joined Classes</a>--}}
                    {{--<a href="" class="btn btn-secondary my-4">Information Board</a>--}}
                </div>
            </div>
        </div>
    @endsection
