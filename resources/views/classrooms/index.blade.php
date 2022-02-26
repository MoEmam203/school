@extends('layouts.master')
@section('css')

@section('title')
    {{ __('mainside.classrooms') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('mainside.classrooms') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('mainside.classrooms') }}</a></li>
                <li class="breadcrumb-item active">{{ __('mainside.classroomsList') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @include('errors')

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ __('Classrooms_trans.add_class') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Classrooms_trans.classroomName') }}</th>
                                <th>{{ __('Classrooms_trans.classroomGrade') }}</th>
                                <th>{{ __('general.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $key => $classroom)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>{{ $classroom->grade->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $classroom->id }}"
                                            title="{{ __('general.Edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $classroom->id }}"
                                            title="{{ __('general.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>


                                <!-- edit_modal_classroom -->
                                <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ __('Classrooms_trans.edit_Classroom') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('classrooms.update',$classroom)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="name_ar" class="mr-sm-2">
                                                                {{ __('Classrooms_trans.classroomName_ar') }}:
                                                            </label>
                                                            <input id="name_ar" type="text" name="name_ar" class="form-control"
                                                                value="{{$classroom->getTranslation('name', 'ar')}}" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="name_en" class="mr-sm-2">
                                                                {{ __('Classrooms_trans.classroomName_en') }}:
                                                            </label>
                                                            <input id="name_en" type="text" class="form-control" value="{{$classroom->getTranslation('name', 'en')}}"
                                                                name="name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="grade_id">
                                                            {{ __('Classrooms_trans.classroomGrade') }}:
                                                        </label>
                                                        <select class="form-control" name="grade_id">
                                                            @foreach ($grades as $grade)
                                                                <option value="{{ $grade->id }}" {{ $grade->id === $classroom->grade_id ? 'selected' : '' }}>
                                                                    {{ $grade->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br><br>
                                
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('general.Close')}}</button>
                                                        <button type="submit" class="btn btn-success">{{ __('general.Submit') }}</button>
                                                    </div>
                                                </form>
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_classroom -->
                                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ __('Classrooms_trans.delete_classroom') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('classrooms.destroy',$classroom)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{ __('Classrooms_trans.warning_classroom') }}
                                                    <input type="text" class="form-control" value="{{$classroom->name}}" disabled>
                                                    <input type="text" class="form-control mt-3" value="{{$classroom->grade->name}}" disabled>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ __('general.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ __('general.Submit') }}</button>
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


    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ __('Classrooms_trans.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>

                                        <div class="row">

                                            <div class="col">
                                                <label for="name_ar" class="mr-sm-2">
                                                    {{ __('Classrooms_trans.classroomName_ar') }}
                                                </label>
                                                <input class="form-control" type="text" name="name_ar" required />
                                            </div>


                                            <div class="col">
                                                <label for="name_en" class="mr-sm-2">
                                                    {{ __('Classrooms_trans.classroomName_en') }}
                                                </label>
                                                <input class="form-control" type="text" name="name_en" required />
                                            </div>


                                            <div class="col">
                                                <label for="grade_id" class="mr-sm-2">
                                                    {{ __('Classrooms_trans.grade') }}
                                                </label>

                                                <div class="box">
                                                    <select class="fancyselect" name="grade_id">
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Processes" class="mr-sm-2">
                                                    {{ __('general.Processes') }}
                                                </label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ __('general.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ __('general.add_row') }}"/>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ __('general.Close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ __('general.Submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- row closed -->
@endsection
@section('js')

@endsection
