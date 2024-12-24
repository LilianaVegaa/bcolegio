<?php

namespace App\Filters\CursoMateriaSearch\Searches;

class CursoMateriaFilter extends Filter
{
    protected $value;

    protected $filterKeys = [
        'fecha' => 'filterByFecha',
    ];

    protected function filterByFecha()
    {
        if (strpos($this->request->input('value'), '-')) {
            $this->value = str_replace("-", " ", $this->request->input('value'));
        } else {
            $this->value = $this->request->input('value');
        }

        $this->builder = $this->builder->whereRaw("MATCH (fecha) AGAINST (? IN BOOLEAN MODE)" , fullTextWildcardsInitEnd($this->value));
    }
}
