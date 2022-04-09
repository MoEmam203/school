@extends('layouts.master')
@section('css')

@section('title')
    {{ __('Students_trans.management_promotion') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('Students_trans.management_promotion') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.students') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Students_trans.management_promotion') }}</li>
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
                <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#RollbackAllPromotions">
                    {{ __('Students_trans.rollback_all_promotions') }}
                </button>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th class="alert alert-info">{{ __('Students_trans.name')}}</th>

                                <th class="alert alert-danger">{{ __('Students_trans.grade_from')}}</th>
                                <th class="alert alert-danger">{{ __('Students_trans.classroom_from')}}</th>
                                <th class="alert alert-danger">{{ __('Students_trans.section_from')}}</th>
                                <th class="alert alert-danger">{{ __('Students_trans.academic_year_from')}}</th>

                                <th class="alert alert-success">{{ __('Students_trans.grade_to')}}</th>
                                <th class="alert alert-success">{{ __('Students_trans.classroom_to')}}</th>
                                <th class="alert alert-success">{{ __('Students_trans.section_to')}}</th>
                                <th class="alert alert-success">{{ __('Students_trans.academic_year_to')}}</th>

                                <th>{{ __('general.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $key => $promotion)
                                <tr>
                                    <td>{{ ++$key }}</td>

                                    <td>{{ $promotion->student->name }}</td>

                                    <td>{{ $promotion->f_grade->name }}</td>
                                    <td>{{ $promotion->f_classroom->name }}</td>
                                    <td>{{ $promotion->f_section->name }}</td>
                                    <td>{{ $promotion->academic_year_from }}</td>

                                    <td>{{ $promotion->t_grade->name }}</td>
                                    <td>{{ $promotion->t_classroom->name }}</td>
                                    <td>{{ $promotion->t_section->name }}</td>
                                    <td>{{ $promotion->academic_year_to }}</td>

                                    <td>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $promotion->id }}"
                                            title="{{ __('general.Delete') }}"><i
                                            class="fa fa-trash"></i></button>

                                    </td>
                                </tr>

                                @include('students.promotions.models.rollbackOnePromotion')
                            @endforeach
                    </table>
                </div>
                @include('students.promotions.models.rollbackAllPromotionsModel')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
