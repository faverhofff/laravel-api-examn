<?php

/**
 * PHP version 7
 * 
 * @category Exam
 * @package  App_Http_Controllers
 * @author   Frank A.R <festgarcia2018@gmail.com.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 * @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    /**
     * Send response in json fromat
     * 
     * @param array $result Object array
     * @param string $message Message
     */
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    /**
     * Send response in json fromat with error http code status
     * 
     * @param string $error Message
     * @param int $code Http code status
     */
    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    /**
     * Send custom message in json format
     * as a 200 code status
     * 
     * @param string $message
     */
    public function sendSuccess($message)
    {
        return Response::json(
            [
            'success' => true,
            'message' => $message
            ], 200
        );
    }

    public function send($message, $errorCode)
    {
        return Response::json(
            [
            'success' => true,
            'data' => $message
            ], $errorCode
        );
    }
}