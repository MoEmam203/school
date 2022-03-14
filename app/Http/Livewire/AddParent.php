<?php

namespace App\Http\Livewire;

use App\Models\Blood_Type;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddParent extends Component
{
    public $successMessage = '';
    public $catchError = '';

    public $currentStep = 1

    // father form
    ,$email,$password,$father_name_ar,$father_name_en,$father_job_ar,$father_job_en,$father_national_id,$father_passport_id,$father_phone,$father_nationality_id,$father_blood_type_id,$father_religion_id,$father_address
    
    // mother form
    ,$mother_name_ar,$mother_name_en,$mother_job_ar,$mother_job_en,$mother_national_id,$mother_passport_id,$mother_phone,$mother_nationality_id,$mother_blood_type_id,$mother_religion_id,$mother_address;


    // Validations 
    // Real time validations
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email|unique:my_parents,email,' . $this->id,
            'father_national_id' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'father_passport_id' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'father_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mother_national_id' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'mother_passport_id' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'mother_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }



    public function render()
    {
        return view('livewire.parents.add-parent',[
            'nationalities' => Nationality::all(),
            'blood_types' => Blood_Type::all(),
            'religions' => Religion::all()
        ]);
    }

    public function firstStepSubmit(){
        $this->validate([
            'email' => 'required|unique:my_parents,email,'.$this->id,
            'password' => 'required|min:8|max:255',
            'father_name_ar' => 'required|string|min:3|max:255',
            'father_name_en' => 'required|string|min:3|max:255',
            'father_job_ar' => 'required|string|min:3|max:255',
            'father_job_en' => 'required|string|min:3|max:255',
            'father_national_id' => 'required|unique:my_parents,father_national_id,' . $this->id,
            'father_passport_id' => 'required|unique:my_parents,father_passport_id,' . $this->id,
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'father_nationality_id' => 'required|exists:nationalities,id',
            'father_blood_type_id' => 'required|exists:blood__types,id',
            'father_religion_id' => 'required|exists:religions,id',
            'father_address' => 'required|string|min:3|max:255',
        ]);
        
        $this->currentStep = 2;
    }

    public function secondStepSubmit(){
        $this->validate([
            'mother_name_ar' => 'required|string|min:3|max:255',
            'mother_name_en' => 'required|string|min:3|max:255',
            'mother_job_ar' => 'required|string|min:3|max:255',
            'mother_job_en' => 'required|string|min:3|max:255',
            'mother_national_id' => 'required|unique:my_parents,mother_national_id,' . $this->id,
            'mother_passport_id' => 'required|unique:my_parents,mother_passport_id,' . $this->id,
            'mother_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mother_nationality_id' => 'required|exists:nationalities,id',
            'mother_blood_type_id' => 'required|exists:blood__types,id',
            'mother_religion_id' => 'required|exists:religions,id',
            'mother_address' => 'required|string|min:3|max:255',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm(){
        try{
            $myParent = new MyParent();

            $myParent->email = $this->email;
            $myParent->password = Hash::make($this->password);
            // Father Info
            $myParent->father_name = ['en' => $this->father_name_en , 'ar' => $this->father_name_ar];
            $myParent->father_job = ['en' => $this->father_job_en , 'ar' => $this->father_job_ar];
            $myParent->father_national_id = $this->father_national_id;
            $myParent->father_passport_id = $this->father_passport_id;
            $myParent->father_phone = $this->father_phone;
            $myParent->father_nationality_id = $this->father_nationality_id;
            $myParent->father_blood_type_id = $this->father_blood_type_id;
            $myParent->father_religion_id = $this->father_religion_id;
            $myParent->father_address = $this->father_address;

            // Mother Info
            $myParent->mother_name = ['en' => $this->mother_name_en , 'ar' => $this->mother_name_ar];
            $myParent->mother_job = ['en' => $this->mother_job_en , 'ar' => $this->mother_job_ar];
            $myParent->mother_national_id = $this->mother_national_id;
            $myParent->mother_passport_id = $this->mother_passport_id;
            $myParent->mother_phone = $this->mother_phone;
            $myParent->mother_nationality_id = $this->mother_nationality_id;
            $myParent->mother_blood_type_id = $this->mother_blood_type_id;
            $myParent->mother_religion_id = $this->mother_religion_id;
            $myParent->mother_address = $this->mother_address;

            $myParent->save();
            
            $this->successMessage = __('messages.success');
            $this->clearForm();
            $this->currentStep = 1;

        }catch(\Exception $e){
            $this->catchError = $e->getMessage();
        }
    }

    public function back($step){
        $this->currentStep = $step;
    }

    public function clearForm(){
        $this->email = '';
        $this->password = '';

        $this->father_name_ar = '';
        $this->father_name_en = '';
        $this->father_job_ar = '';
        $this->father_job_en = '';
        $this->father_national_id ='';
        $this->father_passport_id = '';
        $this->father_phone = '';
        $this->father_nationality_id = '';
        $this->father_blood_type_id = '';
        $this->father_religion_id ='';
        $this->father_address ='';

        $this->mother_name_ar = '';
        $this->mother_name_en = '';
        $this->mother_job_ar = '';
        $this->mother_job_en = '';
        $this->mother_national_id ='';
        $this->mother_passport_id = '';
        $this->mother_phone = '';
        $this->mother_nationality_id = '';
        $this->mother_blood_type_id = '';
        $this->mother_religion_id ='';
        $this->mother_address ='';
    }
}
