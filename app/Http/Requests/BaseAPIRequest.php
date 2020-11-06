<?php

namespace App\Http\Requests;

use InfyOm\Generator\Request\APIRequest;
use InfyOm\Generator\Utils\ResponseUtil;
use Illuminate\Http\Exceptions\HttpResponseException;
use Response;

class BaseAPIRequest extends APIRequest
{
    public $validator = null;
    protected function failedValidation($validator)
    {
        $message = ResponseUtil::makeError($this->validator->errors());
        throw new HttpResponseException(response()->json($message, 422));
    }
}