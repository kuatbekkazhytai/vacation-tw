@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>User Details</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Name</b></label>
                <div class="col-sm-10">
                    {{$user->name}}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Email</b></label>
                <div class="col-sm-10">
                    {{ $user->email }}
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Vacation Info</b></div>
            </div>
        </div>
        @if($user->vacation)
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"><b>Vacation Status</b></label>
                    <div class="col-sm-10">
                        {{$user->vacation->status}}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"><b>From Date</b></label>
                    <div class="col-sm-10">
                        {{ $user->vacation->start_date }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"><b>From Date</b></label>
                    <div class="col-sm-10">
                        {{ $user->vacation->end_date }}
                    </div>
                </div>
            </div>
            @if(!$user->vacation->approved_at && @auth()->user()->isEmployer())
                <form method="POST"
                      action="{{ route('vacation.approve', ['vacation' => $user->vacation->id]) }}">
                    @csrf
                    <input name="vacation_id" type="hidden" value={{$user->vacation->id}}>
                    <div class="mb-0 row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Approve Vacation') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        @endif

    </div>
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-8">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">User Info</div>--}}

    {{--                    <div class="card-body">--}}
    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>--}}
    {{--                            <div class="col-md-4 col-form-label text-md-end">--}}
    {{--                                <p>{{$user->name}}</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <br>--}}
    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="name" class="col-md-4 col-form-label text-md-end">Email</label>--}}
    {{--                            <div class="col-md-4 col-form-label text-md-end">--}}
    {{--                                <p>{{$user->email}}</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        @if($user->vacations->count() > 0)--}}
    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="name" class="col-md-4 col-form-label text-md-end">Vacation status</label>--}}
    {{--                                <div class="col-md-4 col-form-label text-md-end">--}}
    {{--                                    <p>{{$vacation->status}}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="name" class="col-md-4 col-form-label text-md-end">Vacation from date</label>--}}
    {{--                                <div class="col-md-4 col-form-label text-md-end">--}}
    {{--                                    <p>{{$vacation->start_date}}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="name" class="col-md-4 col-form-label text-md-end">Vacation to date</label>--}}
    {{--                                <div class="col-md-4 col-form-label text-md-end">--}}
    {{--                                    <p>{{$vacation->end_date}}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            @if(!$vacation->approved_at)--}}

    {{--                                <form method="POST"--}}
    {{--                                      action="{{ route('vacation.approve', ['vacation' => $vacation->id]) }}">--}}
    {{--                                    @csrf--}}
    {{--                                    <input name="vacation_id" type="hidden" value={{$vacation->id}}>--}}
    {{--                                    <div class="mb-0 row">--}}
    {{--                                        <div class="col-md-6 offset-md-4">--}}
    {{--                                            <button type="submit" class="btn btn-primary">--}}
    {{--                                                {{ __('Approve Vacation') }}--}}
    {{--                                            </button>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </form>--}}
    {{--                            @endif--}}

    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
