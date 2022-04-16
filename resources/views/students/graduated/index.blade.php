@extends('layouts.master')
@section('css')

@section('title')
    {{ __('mainside.graduatedStudentsList') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('mainside.graduatedStudentsList') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.students-graduated') }}</a></li>
                <li class="breadcrumb-item active">{{ __('mainside.graduatedStudentsList') }}</li>
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
                <h5 class="card-title">{{ __('Students_trans.management_promotion') }}</h5>

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
                                        <a href="{{route('students.graduated.show',$student->id)}}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true">
                                            {{ __('Students_trans.Show') }}
                                        </a>

                                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                            data-target="#returnGraduatedStudent{{ $student->id }}">
                                            {{ __('Students_trans.return student') }}
                                        </button>

                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $student->id }}">
                                            {{ __('Students_trans.delete_Student') }}
                                        </button>
                                    </td>
                                </tr>
                                @include('students.graduated.partials.models')
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
