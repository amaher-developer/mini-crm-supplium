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

        <!-- Page Content -->
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
                    <label for="name_ar">{{trans('global.name')}} (AR)</label>
                    <input type="text" class="form-control" name="name_ar" id="name_ar"  value="{{ old('name_ar',  $company->name_ar) }}">
                </div>
                <div class="form-group col-lg-6">
                    <label for="name_en">{{trans('global.name')}} (EN)</label>
                    <input type="text" class="form-control" id="name_en" name="name_en"  value="{{ old('name_en',  $company->name_en) }}">
                </div>
            </div>
            <div class="row col-lg-12">
                <div class="form-group col-lg-6">
                    <label for="email">{{trans('global.email')}}</label>
                    <input type="text" class="form-control" name="email" id="email"  value="{{ old('email',  $company->email) }}">
                </div>
                <div class="form-group col-lg-6">
                    <label for="website">{{trans('global.website')}}</label>
                    <input type="text" class="form-control" id="website" name="website"  value="{{ old('website',  $company->website) }}">
                </div>
            </div>
            <div class="row col-lg-12">
                <div class="form-group col-lg-6">
                    <label for="logo">{{trans('global.logo')}}</label>
                    <input type="file" class="form-control" id="logo" name="logo"  value="{{ old('logo',  $company->logo) }}">
                </div>

                @if(!empty($company->logo))
                    <label class="col-md-1 control-label">
                        <img src="{{ $company->logo }}" style="height: 200px;object-fit: contain;">
                    </label>
                @endif

            </div>
            <div style="clear: both;float: none"></div>

            <button type="submit" class="btn btn-primary text-center " style="margin-top: 40px;">{{trans('global.submit')}}</button>
        </form>

    </div>
    <!-- /.container-fluid -->

@endsection
