@extends('layouts.master')
@section('css')

@section('title')
    {{ __('mainside.feesList') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('mainside.feesList') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.fees') }}</a></li>
                <li class="breadcrumb-item active">{{ __('mainside.feesList') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">{{ __('mainside.feesList') }}</h5>
                <a class="btn btn-sm btn-success mb-3" href="{{ route('fees.create') }}">
                    {{ __('Fees_trans.addFee') }}
                </a>

                <div class="table-responsive">
                    <table class="table table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Fees_trans.Name') }}</th>
                                <th>{{ __('Fees_trans.Amount') }}</th>
                                <th>{{ __('Fees_trans.Grade') }}</th>
                                <th>{{ __('Fees_trans.Classroom') }}</th>
                                <th>{{ __('Fees_trans.Description') }}</th>
                                <th>{{ __('Fees_trans.Year') }}</th>
                                <th>{{ __('general.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $key => $fee)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $fee->name }}</td>
                                    <td>{{ $fee->amount }}</td>
                                    <td>{{ $fee->grade->name }}</td>
                                    <td>{{ $fee->classroom->name }}</td>
                                    <td>{{ $fee->description }}</td>
                                    <td>{{ $fee->year }}</td>
                                    <td>
                                        <a href="{{ route('fees.edit',$fee) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $fee->id }}"
                                            title="{{ __('general.Delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                {{-- <!-- edit_modal_Section -->
                                <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ __('Sections_trans.edit_section') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{route('sections.update',$section)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="name_ar" class="mr-sm-2">
                                                                {{ __('Sections_trans.section_name_ar') }}:
                                                            </label>
                                                            <input id="name_ar" type="text" name="name_ar" class="form-control"
                                                                value="{{$section->getTranslation('name', 'ar')}}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="name_en" class="mr-sm-2">
                                                                {{ __('Sections_trans.section_name_en') }}:
                                                            </label>
                                                            <input type="text" class="form-control" value="{{$section->getTranslation('name', 'en')}}"
                                                                name="name_en" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="grade_id">
                                                            {{ __('Sections_trans.Grade') }}:
                                                        </label>
                                                        <select name="grade_id" id="grade_id" class="form-control">
                                                            @forelse ($grades as $grade)
                                                                <option value="{{ $grade->id }}" {{ $grade->id == $section->grade_id ? 'selected' : '' }}> {{ $grade->name }} </option>
                                                            @empty
                                                                <p>{{ __('Sections_trans.noGrades') }}</p>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="classroom_id">
                                                            {{ __('Sections_trans.classroom') }}:
                                                        </label>
                                                        <select name="classroom_id" id="classroom_id" class="form-control">
                                                            @foreach ($section->grades->classrooms as $classroom)
                                                                <option value="{{ $classroom->id }}" {{ $classroom->id == $section->classroom_id ? 'selected' : '' }}>{{ $classroom->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{ $section->status }}" id="status" name="status" {{ $section->status === 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="status">
                                                            {{ __('Sections_trans.Status') }}
                                                        </label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="teacher_id">
                                                            {{ __('Sections_trans.teachers') }}:
                                                        </label>
                                                        <select name="teachers_id[]" id="teachers_id" class="form-control" multiple>
                                                            @foreach ($teachers as $teacher)
                                                                <option value="{{ $teacher->id }}" {{ in_array($teacher->id,$section->teachers()->pluck('teacher_id')->toArray()) ? 'selected':''}}>{{ $teacher->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br><br>
                                
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close') }}</button>
                                                        <button type="submit" class="btn btn-success">{{ __('general.Submit') }}</button>
                                                    </div>
                                                </form>
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Section -->
                                <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ __('Sections_trans.delete_Section') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('sections.destroy',$section)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{ __('Sections_trans.Warning_Section') }}
                                                    <input type="text" class="form-control" value="{{$section->name}}" disabled>
                                                    <input type="text" class="form-control mt-3" value="{{$section->grades->name}}" disabled>
                                                    <input type="text" class="form-control mt-3" value="{{$section->classrooms->name}}" disabled>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close')
                                                            }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __('general.Submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
