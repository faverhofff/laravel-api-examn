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
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image_url
 * @property int $abv
 * @property int $ibu
 * @property int $target_fg
 * @property int $target_og
 * @property int $ebc
 * @property int $srm
 * @property int $ph
 * @property int $attenuation_level
 * @property object[] $volume
 * @property object[] $boil_volume
 * @property object[] $method
 * @property object[] $ingredients
 * @property string[] $food_pairing
 * @property string $brewers_tips
 * @property string $contributed_by
 */
class PunkApiModel
{
    public $fillable = [
        "id",
        "name",
        "description",
        "image_url",
        "abv",
        "ibu",
        "target_fg",
        "target_og",
        "ebc",
        "srm",
        "ph",
        "attenuation_level",
        "volume",
        "boil_volume",
        "method",
        "ingredients",
        "food_pairing",
        "brewers_tips",
        "contributed_by",
    ];

}