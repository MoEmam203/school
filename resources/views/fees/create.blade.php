@extends('layouts.master')
@section('css')

@section('title')
    {{ __('Fees_trans.addFee') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('Fees_trans.addFee') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.fees') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Fees_trans.addFee') }}</li>
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

                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('fees.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="name_ar">{{__('Fees_trans.name_ar')}}</label>
                                    <input type="text" name="name_ar" class="form-control">
                                    @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="name_en">{{__('Fees_trans.name_en')}}</label>
                                    <input type="text" name="name_en" class="form-control">
                                    @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="amount">{{__('Fees_trans.Amount')}}</label>
                                    <input type="number" name="amount" class="form-control">
                                    @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="grade_id">{{__('Fees_trans.Grade')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="grade_id" id="grade_id">
                                        <option selected disabled>{{__('Fees_trans.Choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('grade_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="classroom_id">{{__('Fees_trans.Classroom')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="classroom_id" id="classroom_id">
                                        <option selected disabled>{{__('Fees_trans.Choose')}}...</option>
                                        
                                    </select>
                                    @error('classroom_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Year">{{__('Fees_trans.Year')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="year">
                                            <option selected disabled>{{__('Fees_trans.Choose')}}...</option>
                                            @php
                                                $current_year = date("Y");
                                            @endphp
                                            @for($year=$current_year; $year<=$current_year +1 ;$year++) 
                                                <option value="{{ $year}}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        @error('year')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="description">{{ __('Fees_trans.Description') }}</label>
                                    <textarea name="description" id="description" cols="20" rows="5" class="form-control"></textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success btn-sm m-2" type="submit">{{__('general.Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection