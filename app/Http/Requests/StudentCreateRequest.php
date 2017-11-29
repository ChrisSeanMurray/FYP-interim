<?php

namespace App\Http\Requests;

use Hashids;
use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required',
            'classgroup_id' => 'required',
        ];
    }

    /**
     * Modify the input
     *
     * @return array
     */
    public function all()
    {
        $input = parent::all();

        $input['classgroup_id'] = Hashids::decode($input['classgroup_id']);

        $this->replace($input);

        return $input;
    }

    /**
     * Add some custom validation rules to the validator instance
     *
     * @return \Illuminate\Validation\Validator
     */
    public function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();


        $validator->after(
            function () use ($validator) {
                $input = $this->all();
            }
        );

        return $validator;
    }
}
