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

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                {{trans('global.total')}}: {{$total}}</div>
            <div  class="col-lg-5"><a href="{{route('createCompany')}}"  class="btn btn-primary" style="margin: 10px;">{{trans('global.company_add')}}</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{trans('global.name')}}</th>
                            <th>{{trans('global.email')}}</th>
                            <th>{{trans('global.website')}}</th>
                            <th>{{trans('global.logo')}}</th>
                            <th>{{trans('global.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company['name_'.$lang]}}</td>
                            <td>{{$company->email}}</td>
                            <td><a href="{{$company->website}}" target="_blank">{{$company->website}}</a></td>
                            <td><img src="{{$company->logo}}" style="height: 120px;object-fit: contain;"></td>
                            <td>
                                <a title="{{trans('global.edit')}}" href="{{route('editCompany',$company->id)}}" class="btn btn-xs yellow">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="{{trans('global.delete')}}" href="{{route('deleteCompany',$company->id)}}" class="confirm_delete btn btn-xs green">
                                    <i class="fa fa-times"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="text-center row col-lg-12"> <?php echo $companies->render(); ?></div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection
