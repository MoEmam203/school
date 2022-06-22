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
                                @include('fees.models.deleteModal')
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
