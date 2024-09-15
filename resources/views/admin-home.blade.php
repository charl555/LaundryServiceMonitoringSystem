@extends('layouts.app')

@section('content')
<link href="/css/buttonstyle.css" rel="stylesheet" >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Wash N Dry Laundry Monitoring System Admin Home Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 style="font-size: 24px; text-align: center;">Wash N Dry Laundry Services ADMIN</h1> 
                    <div class="input_buttons">
                        <a class="btn" href="{{route('admin.index')}}" role="button">Admin Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
