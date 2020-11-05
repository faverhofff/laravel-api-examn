<?php

namespace App\Http\Requests;

use InfyOm\Generator\Request\APIRequest;
use InfyOm\Generator\Utils\ResponseUtil;
use Response;

class BaseAPIRequest extends APIRequest
{
    public $validator = null;
    protected function failedValidation($validator)
    {
        // $message = ResponseUtil::makeError($this->validator->errors());
        // return Response::json($message, 402);
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}