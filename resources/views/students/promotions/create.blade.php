@extends('layouts.master')
@section('css')

@section('title')
    {{ __('mainside.students_promotion') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('mainside.students_promotion') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.students') }}</a></li>
                <li class="breadcrumb-item active">{{ __('mainside.students_promotion') }}</li>
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
                <form action="{{ route('promotions.store') }}" method="post">
                    @csrf
                    <h5>{{ __('Students_trans.promotion_from') }}</h5>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="grade_id">{{__('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="grade_id" name="grade_id">
                                    <option selected disabled>{{__('Students_trans.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="classroom_id">{{__('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="classroom_id" name="classroom_id">
                            
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="section_id">{{__('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" id="section_id" name="section_id">
                            
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="academic_year_from">{{__('Students_trans.academic_year')}} : <span class="text-danger">*</span> </label>
                                <select class="custom-select mr-sm-2" name="academic_year_from">
                                    <option selected disabled>{{__('Students_trans.Choose')}}...</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++) <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5>{{ __('Students_trans.promotion_to') }}</h5>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="grade_id_new">{{__('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="grade_id_new" name="grade_id_new">
                                    <option selected disabled>{{__('Students_trans.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="classroom_id_new">{{__('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="classroom_id_new" name="classroom_id_new">
                            
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="section_id_new">{{__('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" id="section_id_new" name="section_id_new">
                            
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="academic_year_to">{{__('Students_trans.academic_year')}} : <span class="text-danger">*</span> </label>
                                <select class="custom-select mr-sm-2" name="academic_year_to">
                                    <option selected disabled>{{__('Students_trans.Choose')}}...</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++) <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success m-2" type="submit">{{__('general.Submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
