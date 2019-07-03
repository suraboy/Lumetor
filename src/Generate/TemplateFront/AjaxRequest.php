<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */

namespace App\Http\Requests\{replace};

use Lumpineevill\Request\APIRequest;

class {action}{replace}AjaxRequest extends APIRequest
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
            'id' => 'required|numeric|min:0',
        ];
    }

}
