<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PunkApiResponse
 * @package App\Models
 * @version November 5, 2020, 1:35 pm UTC
 *
 * @property integer $CodeResult
 * @property string $BodyContent
 */
class PunkApiResponse
{
    /** @var */
    private $codeResult;

    /** @var */
    private  $bodyContent;

    /**
     * 
     */
    public function __construct(int $codeStatus, string $bodyContent)
    {
        $this->codeResult = $codeStatus;
        $this->bodyContent = $bodyContent;
    }

    /**
     * 
     */
    public function getCode(): int
    {
        return $this->codeResult;
    }
    
    /***
     * 
     */
    public function getArrayModel(): iterable
    {
        return json_decode($this->bodyContent, true);
    }
}