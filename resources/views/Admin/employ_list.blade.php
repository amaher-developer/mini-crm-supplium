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
            <div  class="col-lg-5"><a href="{{route('createEmploy')}}"  class="btn btn-primary" style="margin: 10px;">{{trans('global.employ_add')}}</a></div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{trans('global.first_name')}}</th>
                            <th>{{trans('global.last_name')}}</th>
                            <th>{{trans('global.email')}}</th>
                            <th>{{trans('global.phone')}}</th>
                            <th>{{trans('global.company')}}</th>
                            <th>{{trans('global.actions')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($employees as $employ)
                            <tr>
                                <td><?php echo $employ['first_name_'.$lang]?></td>
                                <td><?php echo $employ['last_name_'.$lang]?></td>
                                <td>{{$employ->email}}</td>
                                <td>{{$employ->phone}}</td>
                                <td>{{@$employ->companies['name_'.$lang]}}</td>
                                <td>

                                    <a title="{{trans('global.edit')}}" href="{{route('editEmploy',$employ->id)}}" class="btn btn-xs yellow">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="{{trans('global.delete')}}" href="{{route('deleteEmploy',$employ->id)}}" class="confirm_delete btn btn-xs green">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="text-center row col-lg-12"> <?php echo $employees->render(); ?></div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
