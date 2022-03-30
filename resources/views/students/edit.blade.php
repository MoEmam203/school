@extends('layouts.master')
@section('css')

@section('title')
    {{ __('Students_trans.edit_Student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('Students_trans.edit_Student') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.students') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Students_trans.edit_Student') }}</li>
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

                <form method="post" action="{{ route('students.update',$student) }}" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('Students_trans.personal_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_ar">{{__('Students_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                <input type="text" name="name_ar" value="{{ $student->getTranslation('name','ar') }}" class="form-control">
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_en">{{__('Students_trans.name_en')}} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="name_en" value="{{ $student->getTranslation('name','en') }}" type="text">
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">{{__('Students_trans.email')}} : </label>
                                <input type="email" name="email" value="{{ $student->email }}" class="form-control">
                            </div>
                        </div>
                
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">{{__('Students_trans.password')}} :</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div> --}}
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender_id">{{__('Students_trans.gender')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    {{-- <option selected disabled>{{__('Students_trans.Choose')}}...</option> --}}
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}" {{ $gender->id === $student->gender_id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nationality_id">{{__('Students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationality_id">
                                    {{-- <option selected disabled>{{__('Students_trans.Choose')}}...</option> --}}
                                    @foreach($nationalities as $nationality)
                                        <option value="{{ $nationality->id }}" {{ $nationality->id === $student->nationality_id ? 'selected' : '' }}>{{ $nationality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="blood_type_id">{{__('Students_trans.blood_type')}} : </label>
                                <select class="custom-select mr-sm-2" name="blood_type_id">
                                    <option selected disabled>{{__('Students_trans.Choose')}}...</option>
                                    @foreach($blood_types as $blood_type)
                                        <option value="{{ $blood_type->id }}" {{ $blood_type->id === $student->blood_type_id ? 'selected' : '' }}>{{ $blood_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_of_birth">{{__('Students_trans.Date_of_Birth')}} :</label>
                                <input class="form-control" type="text" id="datepicker-action" value="{{ $student->date_of_birth }}" name="date_of_birth" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                
                    </div>
                
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('Students_trans.Student_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="grade_id">{{__('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="grade_id" name="grade_id">
                                    {{-- <option selected disabled>{{__('Students_trans.Choose')}}...</option> --}}
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}" {{ $grade->id === $student->grade_id ? 'selected' : ''}}>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="classroom_id">{{__('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="classroom_id" name="classroom_id">
                                    <option value="{{ $student->classroom_id }}">{{ $student->classroom->name }}</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">{{__('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" id="section_id" name="section_id">
                                    <option value="{{ $student->section_id }}">{{ $student->section->name }}</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">{{__('Students_trans.parent')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    {{-- <option selected disabled>{{__('Students_trans.Choose')}}...</option> --}}
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}" {{ $student->parent_id === $parent->id ? 'selected' : '' }}>{{ $parent->father_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{__('Students_trans.academic_year')}} : <span class="text-danger">*</span> </label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    {{-- <option selected disabled>{{__('Students_trans.Choose')}}...</option> --}}
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++) 
                                        <option value="{{ $year}}" {{ $year === $student->academic_year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-success m-2" type="submit">{{__('general.Submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $('#grade_id').change(function(){
        let grade_id = $(this).val();
        if(grade_id){
            $.ajax({
                type : 'POST',
                url : '{{ URL::to("/student/getClassrooms") }}/'+grade_id,
                data : {
                    '_token' : '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#classroom_id').empty();
                    $('#section_id').empty();
                    $('#classroom_id').append(`<option selected disabled>{{__('Students_trans.Choose')}}...</option>`)
                    $.each(data,function(key,value){
                        $('#classroom_id').append(`<option value="${key}">${value}</option>`)
                    })
                },
                error : function(err){
                    console.log(err)
                }
            })
        }
    })

    $('#classroom_id').change(function(){
        let classroom_id = $(this).val()
        if(classroom_id){
            $.ajax({
                type : "POST",
                url : '{{ URL::to("/student/getSections") }}/'+classroom_id,
                data:{
                    '_token' : '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#section_id').empty();
                    $('#section_id').append(`<option selected disabled>{{__('Students_trans.Choose')}}...</option>`)
                    $.each(data,function(key,value){
                        $('#section_id').append(`<option value="${key}">${value}</option>`)
                    })
                },
                error: function(err){
                    console.log(err)
                }
            })
        }
    })
</script>
@endsection
