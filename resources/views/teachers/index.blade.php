@extends('layouts.master')
@section('css')

@section('title')
    {{ __('mainside.teachersList') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('mainside.teachersList') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.teachers') }}</a></li>
                <li class="breadcrumb-item active">{{ __('mainside.teachersList') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('errors')
                <h5 class="card-title">{{ __('mainside.teachersList') }}</h5>
                <a class="btn btn-sm btn-success mb-3" href="{{ route('teachers.create') }}">
                    {{ __('Teachers_trans.addTeacher') }}
                </a>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Teachers_trans.name') }}</th>
                                <th>{{ __('Teachers_trans.email') }}</th>
                                <th>{{ __('Teachers_trans.joining_date') }}</th>
                                <th>{{ __('Teachers_trans.address') }}</th>
                                <th>{{ __('general.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $key => $teacher)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->joining_date }}</td>
                                    <td>{{ $teacher->address }}</td>
                                    <td>
                                        <a href="{{ route('teachers.edit',$teacher) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $teacher->id }}"
                                            title="{{ __('general.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- delete_modal_Teacher -->
                                <div class="modal fade" id="delete{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ __('Teachers_trans.delete_Teacher') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('teachers.destroy',$teacher)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{ __('Teachers_trans.Warning_Teacher') }}
                                                    <input type="text" class="form-control" value="{{$teacher->name}}" disabled>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __('general.Submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection