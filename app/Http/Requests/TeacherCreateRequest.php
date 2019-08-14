<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TeacherCreateRequest extends Request
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
          'code' => 'required',
          'firstname' => 'required',
          'lastname' => 'required',
          'work' => 'required',
          'graduate' => 'required',
          'degree' => 'required',
          'direction' => 'required',
          'schooling' => 'required',
        ];
    }
}
