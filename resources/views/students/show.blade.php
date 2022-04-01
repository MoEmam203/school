@extends('layouts.master')
@section('css')

@section('title')
    {{__('Students_trans.Student_details')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('Students_trans.Student_details')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.students') }}</a></li>
                <li class="breadcrumb-item active">{{__('Students_trans.Student_details')}}</li>
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
                <div class="tab nav-border">

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="true">{{__('Students_trans.Student_details')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="attachment-tab" data-toggle="tab" href="#attachment" role="tab"
                                aria-controls="attachment" aria-selected="false">{{__('Students_trans.Attachments')}}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <table class="table table-striped table-hover" style="text-align:center">
                                <tbody>
                                    <tr>
                                        <th scope="row">{{__('Students_trans.name')}}</th>
                                        <td>{{ $student->name }}</td>
                                        <th scope="row">{{__('Students_trans.email')}}</th>
                                        <td>{{$student->email}}</td>
                                        <th scope="row">{{__('Students_trans.gender')}}</th>
                                        <td>{{$student->gender->name}}</td>
                                        <th scope="row">{{__('Students_trans.Nationality')}}</th>
                                        <td>{{$student->nationality->name}}</td>
                                    </tr>
                    
                                    <tr>
                                        <th scope="row">{{__('Students_trans.Grade')}}</th>
                                        <td>{{ $student->grade->name }}</td>
                                        <th scope="row">{{__('Students_trans.classrooms')}}</th>
                                        <td>{{$student->classroom->name}}</td>
                                        <th scope="row">{{__('Students_trans.section')}}</th>
                                        <td>{{$student->section->name}}</td>
                                        <th scope="row">{{__('Students_trans.Date_of_Birth')}}</th>
                                        <td>{{ $student->date_of_birth}}</td>
                                    </tr>
                    
                                    <tr>
                                        <th scope="row">{{__('Students_trans.parent')}}</th>
                                        <td>{{ $student->myparent->father_name}}</td>
                                        <th scope="row">{{__('Students_trans.academic_year')}}</th>
                                        <td>{{ $student->academic_year }}</td>
                                        <th scope="row"></th>
                                        <td></td>
                                        <th scope="row"></th>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
                        <div class="tab-pane fade" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <form method="post" action="{{route('uploadAttachment',$student)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="images">{{__('Students_trans.Attachments')}}</label>
                                                <input type="file" accept="image/*" name="images[]" multiple required>
                                            </div>
                                        </div>
                                        <button type="submit" class="button button-border x-small m-3">
                                            {{__('general.Submit')}}
                                        </button>
                                    </form>
                                </div>
                                <br>
                                <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
                                    <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">#</th>
                                            <th scope="col">{{__('Students_trans.filename')}}</th>
                                            <th scope="col">{{__('Students_trans.created_at')}}</th>
                                            <th scope="col">{{__('general.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student->images as $key => $image)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{++$key}}</td>
                                                <td>{{$image->filename}}</td>
                                                <td>{{$image->created_at->diffForHumans()}}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-success btn-sm" target="_blank"
                                                        href="{{ route('showAttachment',[$student,$image->filename]) }}"
                                                        role="button"><i class="fa fa-eye"></i>&nbsp;
                                                        {{__('Students_trans.Show')}}</a>

                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="{{ route('downloadAttachment',[$student,$image->filename]) }}"
                                                        role="button"><i class="fa fa-download"></i>&nbsp;
                                                        {{__('Students_trans.Download')}}</a>
                        
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                        data-target="#Delete_img{{ $image->id }}"
                                                        title="{{ __('general.Delete') }}">
                                                        <i class="fa fa-trash"></i>&nbsp;
                                                        {{__('general.Delete')}}
                                                    </button>
                        
                                                </td>
                                            </tr>
                                            @include('students.attachments.deleteImage')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
