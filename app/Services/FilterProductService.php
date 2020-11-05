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
    public function showSummaryDetail($arrayPunkApiModel)
    {
        return collect($arrayPunkApiModel)->map( function($row) {
            return Arr::only($row, ['id', 'name', 'description']);
        });
    }

}