@extends('layouts.master')
@section('css')

@section('title')
    {{ __('mainside.studentsList') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('mainside.studentsList') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.students') }}</a></li>
                <li class="breadcrumb-item active">{{ __('mainside.studentsList') }}</li>
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
                <a class="btn btn-sm btn-success mb-3" href="{{ route('students.create') }}">
                    {{ __('mainside.add_student') }}
                </a>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Students_trans.name')}}</th>
                                <th>{{ __('Students_trans.email')}}</th>
                                <th>{{ __('Students_trans.gender')}}</th>
                                <th>{{ __('Students_trans.Grade')}}</th>
                                <th>{{ __('Students_trans.classrooms')}}</th>
                                <th>{{ __('Students_trans.section')}}</th>
                                <th>{{ __('general.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $student)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->gender->name }}</td>
                                    <td>{{ $student->grade->name }}</td>
                                    <td>{{ $student->classroom->name }}</td>
                                    <td>{{ $student->section->name }}</td>
                                    <td>
                                        <a href="{{ route('students.edit',$student) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $student->id }}"
                                            title="{{ __('general.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                        

                                        <a href="{{route('students.show',$student)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>

                                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                            data-target="#graduate{{ $student->id }}"
                                            title="{{ __('Students_trans.graduate') }}"><i 
                                            class="fa fa-sign-out" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                                <!-- delete_modal_Student -->
                                <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ __('Students_trans.delete_Student') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('students.destroy',$student)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{ __('Students_trans.Warning_Student') }}
                                                    <input type="text" class="form-control" value="{{$student->name}}" disabled>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close')
                                                            }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __('general.Submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- graduate_modal_Student -->
                                <div class="modal fade" id="graduate{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ __('Students_trans.graduate_student') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('graduateStudent',$student)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    {{ __('Students_trans.Warning_Student_graduate') }}
                                                    <input type="text" class="form-control" value="{{$student->name}}" disabled>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close')
                                                            }}</button>
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
