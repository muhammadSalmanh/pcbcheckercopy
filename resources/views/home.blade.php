@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <div class="mb-3 row">
                            <label for="join"
                                class="col-md-1 col-form-label text-md-end">{{ __('Select Start Date') }}</label>
                            <div class="col-md-3">
                                <input type="datetime-local" class="form-control" name="start_date">
                            </div>

                            <label for="join"
                                class="col-md-1 col-form-label text-md-end">{{ __('Select End Date') }}</label>
                            <div class="col-md-3">
                                <input type="datetime-local" class="form-control" name="end_date">
                            </div>
                            <label for="duration" class="col-md-1 col-form-label text-md-end">{{ __('Duration') }}</label>
                            <div class="col-md-3">
                                <form action="{{ route('completed')}}" method="GET">
                                <select class="form-control" name="duration" id="duration">
                                    <option value="1">All</option>
                                    <option value="2">Partial</option>
                                    <option value="3" id="completed">Completed</option>
                                    <!-- Add more options as needed -->
                                </select>
                                <button type="submit" class="btn btn-danger">submit</button>
                            </form>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                {{-- <a class="btn btn-success" href="{{ route('completed')}}">Submit</a> --}}
                                <button class="btn btn-danger">Clear Filters</button>
                                <button class="btn btn-info">Download CSV</button>
                            </div>
                        </div>
                        <div class="my-3 row">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ssb_leads as $ssb_lead)
                                    <tr>
                                        <th scope="row">{{$ssb_lead->id}}</th>
                                        <td>{{$ssb_lead->created_at}}</td>
                                        <td>{{$ssb_lead->updated_at}}</td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=datetime-local]");
    </script>

@endsection
