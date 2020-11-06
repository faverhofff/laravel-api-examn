<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class FilterProductService
{
    /**
     * Select from result just the fields
     * ['id', 'name', 'description']
     * 
     * @param $arrayPunkApiModel
     */
    public function getSummary($arrayPunkApiModel)
    {
        return $this->filterArrayByKeys($arrayPunkApiModel, ['id', 'name', 'description']);
    }

    /**
     * Select from result just the fields
     * ['id', 'name', 'description']
     * 
     * @param array $arrayPunkApiModel
     */
    public function getDetail($arrayPunkApiModel)
    {
        $fields = ['id', 'name', 'description', 'image_url', 'tagline', 'first_brewed'];

        return $this->filterArrayByKeys($arrayPunkApiModel, $fields);
    }

    /**
     * Filter and just leave request fields
     * 
     * @param array $arrayData
     * @param array $fieldsToShow
     * @return array
     */
    private function filterArrayByKeys(array $arrayData, array $fieldsToShow)
    {
        return collect($arrayData)->map(
            function ($row) use ($fieldsToShow) {
                return Arr::only($row, $fieldsToShow);
            }
        );
    }

}
