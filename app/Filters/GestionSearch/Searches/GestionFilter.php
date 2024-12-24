<?php

namespace App\Filters\GestionSearch\Searches;

class GestionFilter extends Filter
{
    protected $filterKeys = [
        'año' => 'filterByAño',
    ];

    protected function filterByAño()
    {
        $this->builder = $this->builder->whereRaw("MATCH (año) AGAINST (? IN BOOLEAN MODE)" , fullTextWildcardsInitEnd($this->request->input('value')));
    }
}
