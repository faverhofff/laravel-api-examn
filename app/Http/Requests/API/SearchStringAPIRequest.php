<?php

namespace App\Http\Requests\API;

use App\Http\Requests\BaseAPIRequest;

class SearchStringAPIRequest extends BaseAPIRequest
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
            "word" => "required"
        ];
    }

    public function all($keys = null) 
    {
        $data = parent::all($keys);
        $data['word'] = str_replace(" ", "_", $this->route('word'));

        return $data;
    }
}