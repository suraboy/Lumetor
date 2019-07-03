<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace App\Http\Requests\{replace};

use Lumpineevill\Request\APIRequest;

class {action}{replace}Request extends APIRequest
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
     * simple rule below this.
     * required | exists | required_if | email | interger | date| date_format | between | array | json | boolean | 
     * max | min | confirmed | differece | alpha | alpha_numeric | acitve(url) | accepted |distinct | file | same
     * size | string | timezone | unique | url | nullable | not_in| digits | digits_between | mime_type | mime_type_by_file_extension
     * in_array | ip_address | image | regex:patten |
     * @return array
     */
    public function rules()
    {

        return [
            # 'id' => 'required|exists:{replace_snc},id',
            # 'email' => 'unique:{replace_snc},email',
        ];
    }

    /**
     * If need to overiding message of node
     * @return array 
     */
    public function messages()
    {
        return [];
    }

}
