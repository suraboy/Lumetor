<?php

namespace App\Http\Requests\{replace};

use App\Contracts\FormRequest;

class {action}{replace}Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->hasRoles(['admin']) ||
            $this->hasPermissions(['{replace_sm}.{action}']) ||
            $this->hasPermissions(['{replace_sm}.*']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array(
            #'name' => 'required'
        );
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return array (
           #'name.required' => ':attribute is required'
        );

    }

    public function attributes()
    {
        return array(
            #'name' => trans('unit.name'),
        );
    }
}
