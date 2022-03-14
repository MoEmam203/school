<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ __('Parent_trans.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ __('Parent_trans.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" disabled="disabled">3</a>
                <p>{{ __('Parent_trans.Step3') }}</p>
            </div>
        </div>
    </div>


    @include('livewire.parents.father_form')

    @include('livewire.parents.mother_form')


    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
            @endif
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h4 style="font-family: 'Cairo', sans-serif;" class="m-2">{{ __('Parent_trans.confirm') }}</h4><br>
                    <button class="btn btn-danger btn-sm nextBtn m-2" type="button" wire:click="back(2)">{{
                        __('Parent_trans.Back') }}</button>
                    <button class="btn btn-success btn-sm m-2 " wire:click="submitForm" type="button">{{
                        __('Parent_trans.Finish') }}</button>
                </div>
            </div>
        </div>
    </div>

</div>
