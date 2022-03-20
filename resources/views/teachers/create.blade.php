@extends('layouts.master')
@section('css')

@section('title')
    {{ __('Teachers_trans.addTeacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('Teachers_trans.addTeacher') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.teachers') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Teachers_trans.addTeacher') }}</li>
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
                        <form action="{{route('teachers.store')}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="email">{{__('Teachers_trans.email')}}</label>
                                    <input type="email" name="email" class="form-control">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{__('Teachers_trans.password')}}</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="name_ar">{{__('Teachers_trans.name_ar')}}</label>
                                    <input type="text" name="name_ar" class="form-control">
                                    @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="name_en">{{__('Teachers_trans.name_en')}}</label>
                                    <input type="text" name="name_en" class="form-control">
                                    @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="specialization_id">{{__('Teachers_trans.specialization')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                        <option selected disabled>{{__('Teachers_trans.Choose')}}...</option>
                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="gender_id">{{__('Teachers_trans.Gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        <option selected disabled>{{__('Teachers_trans.Choose')}}...</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                
                            <div class="form-row">
                                <div class="col">
                                    <label for="joining_date">{{__('Teachers_trans.joining_date')}}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text" id="datepicker-action" name="joining_date" data-date-format="yyyy-mm-dd" required>
                                    </div>
                                    @error('joining_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                
                            <div class="form-group">
                                <label for="address">{{__('Teachers_trans.address')}}</label>
                                <textarea class="form-control" name="address" id="address" rows="4"></textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                
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