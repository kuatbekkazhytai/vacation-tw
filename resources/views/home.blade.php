@extends('layouts.app')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>List of Employees</b></div>
                <div class="col col-md-6">
                    @if(@auth()->user()->isEmployee())
                        @if(!@auth()->user()->vacation)
                            <a href="{{route('vacation.create')}}" class="btn btn-success btn-add-new">
                                <i></i><span>REQUEST VACATION</span>
                            </a>
                        @elseif(!@auth()->user()->vacation->approved_at)
                            <a href="{{route('vacation.edit', auth()->user()->vacation->id)}}"
                               class="btn btn-success btn-add-new">
                                <i></i><span>CHANGE VACATION DATES </span>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Vacation Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            @if($user->vacation)
                                @if($user->vacation->status == 'Approved')
                                    <td class="text-center bg-success">{{$user->vacation->status}}</td>
                                @else
                                    <td class="text-center bg-secondary">{{$user->vacation->status}}</td>
                                @endif
                            @else
                                <td class="text-center bg-light">Not Requested</td>
                            @endif
                            <td class="text-center">
                                <a class="btn btn-primary" href="{{ route('users.show', ['user' => $user->id]) }}"
                                   role="button">View</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection
