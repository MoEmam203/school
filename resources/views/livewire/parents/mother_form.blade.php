@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
        <div class="col-xs-12">
            <div class="col-md-12">

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{__('Parent_trans.mother_name_ar')}}</label>
                        <input type="text" wire:model="mother_name_ar" class="form-control" >
                        @error('mother_name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{__('Parent_trans.mother_name_en')}}</label>
                        <input type="text" wire:model="mother_name_en" class="form-control" >
                        @error('mother_name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{__('Parent_trans.mother_job_ar')}}</label>
                        <input type="text" wire:model="mother_job_ar" class="form-control">
                        @error('mother_job_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{__('Parent_trans.mother_job_en')}}</label>
                        <input type="text" wire:model="mother_job_en" class="form-control">
                        @error('mother_job_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{__('Parent_trans.mother_national_id')}}</label>
                        <input type="text" wire:model="mother_national_id" class="form-control">
                        @error('mother_national_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{__('Parent_trans.mother_passport_id')}}</label>
                        <input type="text" wire:model="mother_passport_id" class="form-control">
                        @error('mother_passport_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{__('Parent_trans.mother_phone')}}</label>
                        <input type="text" wire:model="mother_phone" class="form-control">
                        @error('mother_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{__('Parent_trans.mother_nationality_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_nationality_id">
                            <option selected>{{__('Parent_trans.Choose')}}...</option>
                            @foreach($nationalities as $national)
                                <option value="{{$national->id}}">{{$national->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_nationality_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{__('Parent_trans.mother_blood_type_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_blood_type_id">
                            <option selected>{{__('Parent_trans.Choose')}}...</option>
                            @foreach($blood_types as $blood_type)
                                <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_blood_type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{__('Parent_trans.mother_religion_id')}}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_religion_id">
                            <option selected>{{__('Parent_trans.Choose')}}...</option>
                            @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_religion_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{__('Parent_trans.mother_address')}}</label>
                    <textarea class="form-control" wire:model="mother_address" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('mother_address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm nextBtn m-2" type="button" wire:click="back(1)">
                    {{trans('Parent_trans.Back')}}
                </button>

                <button class="btn btn-success btn-sm nextBtn m-2" wire:click="secondStepSubmit"
                        type="button">{{__('Parent_trans.Next')}}
                </button>

            </div>
        </div>
    </div>