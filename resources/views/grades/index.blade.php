@extends('layouts.master')
@section('css')

@section('title')
    {{ __('mainside.Grades List') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('mainside.Grades List') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('mainside.Grades List') }}</li>
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
                    {{ trans('Grades_trans.add_Grade') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('Grades_trans.Name')}}</th>
                            <th>{{trans('Grades_trans.Notes')}}</th>
                            <th>{{trans('Grades_trans.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($grades as $key => $grade)
                            <tr>
                                
                                <td>{{ ++$key }}</td>
                                <td>{{ $grade->name }}</td>
                                <td>{{ $grade->notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}"
                                            title="{{ trans('Grades_trans.Edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}"
                                            title="{{ trans('Grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('Grades_trans.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{route('grades.update',$grade)}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name" class="mr-sm-2">
                                                            {{ trans('Grades_trans.stage_name_ar') }}:
                                                        </label>
                                                        <input id="name" type="text" name="name"
                                                                class="form-control"
                                                                value="{{$grade->getTranslation('name', 'ar')}}"
                                                                required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en" class="mr-sm-2">
                                                            {{ trans('Grades_trans.stage_name_en') }}:
                                                        </label>
                                                        <input type="text" class="form-control"
                                                                value="{{$grade->getTranslation('name', 'en')}}"
                                                                name="name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notes">
                                                        {{ trans('Grades_trans.Notes') }}:
                                                    </label>
                                                    <textarea class="form-control" name="notes" rows="3">{{ $grade->notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ trans('Grades_trans.Submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Grades_trans.delete_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('grades.destroy',$grade)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                <input type="text" class="form-control" value="{{$grade->name}}" disabled>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('Grades_trans.Submit') }}</button>
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


    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        {{ trans('Grades_trans.add_Grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name" class="mr-sm-2">
                                    {{ trans('Grades_trans.stage_name_ar') }}:
                                </label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="name_en" class="mr-sm-2">
                                        {{ trans('Grades_trans.stage_name_en') }}:
                                </label>
                                <input type="text" class="form-control" name="name_en" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes">
                                {{ trans('Grades_trans.Notes') }}:
                            </label>
                            <textarea class="form-control" name="notes"rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                    <button type="submit"
                            class="btn btn-success">{{ trans('Grades_trans.Submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- row closed -->
@endsection
@section('js')

@endsection
