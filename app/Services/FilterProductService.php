<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class FilterProductService { 
    
    /**
     * Select from result just the fields
     * ['id', 'name', 'description']
     */
    public function getSummary($arrayPunkApiModel)
    {
        return $this->filterArray($arrayPunkApiModel, ['id', 'name', 'description']);
    }

    /**
     * Select from result just the fields
     * ['id', 'name', 'description']
     */
    public function getDetail($arrayPunkApiModel)
    {
        $fields = ['id', 'name', 'description', 'image_url', 'tagline', 'first_brewed'];

        return $this->filterArray($arrayPunkApiModel, $fields);
    }

    /**
     * 
     */
    private function filterArray(array $arrayData, array $fieldsToShow)
    {
        return collect($arrayData)->map( function($row) use ($fieldsToShow) {
            return Arr::only($row, $fieldsToShow);
        });
    }

}