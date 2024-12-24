<?php

namespace App\Filters\CursoSearch\Searches;

class CursoFilter extends Filter
{
    protected $filterKeys = [
        'nombre' => 'filterByNombre',
    ];

    protected function filterByNombre()
    {
        $this->builder = $this->builder->whereRaw("MATCH (nombre) AGAINST (? IN BOOLEAN MODE)" , fullTextWildcardsInitEnd($this->request->input('value')));
    }
}
