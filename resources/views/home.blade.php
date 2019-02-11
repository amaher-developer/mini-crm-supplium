@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{trans('global.companies')}}</div>

                <div class="card-body">
                    {{$total_companies}}
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="row justify-content-center" style="padding-top: 20px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{trans('global.employees')}}</div>

                <div class="card-body">
                    {{$total_employees}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
