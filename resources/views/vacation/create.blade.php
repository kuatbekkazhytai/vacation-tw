@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @push('style')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    <div class="card">
        <div class="card-header">Pick Vacation Period <a href="{{ route('home') }}"
                                                        class="btn btn-primary btn-sm float-end">Back</a></div>
        <div class="card-body">
            <form method="post" action="{{ route('vacation.store') }}">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">FROM</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" name="from">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">TO</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control" name="to">
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            config = {
                dateFormat: 'Y-m-d',
            }
            flatpickr("input[type=datetime-local]", config);
        </script>
    @endpush
@endsection
