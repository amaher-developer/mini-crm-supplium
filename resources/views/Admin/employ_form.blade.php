@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">{{trans('global.dashboard')}}</a>
            </li>
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li class="dir_class">{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @elseif(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
        <!-- Page Content -->
        <form method="post" action="" enctype="multipart/form-data"  style="margin-top: 60px;">
            {{csrf_field()}}
            <div class="row col-lg-12">
            <div class="form-group col-lg-6">
                <label for="first_name_ar">{{trans('global.first_name')}} (AR)</label>
                <input type="text" class="form-control" name="first_name_ar" id="first_name_ar" value="{{ old('first_name_ar',  $employ->first_name_ar) }}">
            </div>
            <div class="form-group col-lg-6">
                <label for="first_name_en">{{trans('global.first_name')}} (EN)</label>
                <input type="text" class="form-control" id="first_name_en" name="first_name_en" value="{{ old('first_name_en',  $employ->first_name_en) }}">
            </div>
            </div>
            <div class="row col-lg-12">
            <div class="form-group col-lg-6">
                <label for="last_name_ar">{{trans('global.last_name')}} (AR)</label>
                <input type="text" class="form-control" name="last_name_ar" id="last_name_ar" value="{{ old('last_name_ar',  $employ->last_name_ar) }}">
            </div>
            <div class="form-group col-lg-6">
                <label for="last_name_en">{{trans('global.last_name')}} (EN)</label>
                <input type="text" class="form-control" id="last_name_en" name="last_name_en" value="{{ old('last_name_en',  $employ->last_name_en) }}">
            </div>
            </div>
            <div class="row col-lg-12">
            <div class="form-group col-lg-6">
                <label for="email">{{trans('global.email')}}</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email',  $employ->email) }}">
            </div>
            <div class="form-group col-lg-6">
                <label for="phone">{{trans('global.phone')}}</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',  $employ->phone) }}">
            </div>
            </div>
            <div class="row col-lg-12">
            <div class="form-group ">
                <label for="company_id">{{trans('global.company')}}</label>
                <select  class="form-control" name="company_id" id="company_id">
                    <option value="">{{trans('global.choose_company')}}</option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}" @if($company->id == $employ->company_id) selected="" @endif>{{$company['name_'.$lang]}}</option>
                        @endforeach
                </select>
            </div>
            </div>

            <button type="submit" class="btn btn-primary text-center "  style="margin-top: 40px;">{{trans('global.submit')}}</button>
        </form>

    </div>
    <!-- /.container-fluid -->
@endsection
