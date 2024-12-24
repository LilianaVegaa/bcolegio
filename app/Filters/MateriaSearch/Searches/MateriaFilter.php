<?php

namespace App\Filters\MateriaSearch\Searches;

class MateriaFilter extends Filter
{
    protected $filterKeys = [
        'nombre' => 'filterByNombre',
    ];

    protected function filterByNombre()
    {
        $this->builder = $this->builder->whereRaw("MATCH (nombre) AGAINST (? IN BOOLEAN MODE)" , fullTextWildcardsInitEnd($this->request->input('value')));
    }
}
