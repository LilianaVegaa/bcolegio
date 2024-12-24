<?php

namespace App\Filters\AdministrativoSearch\Searches;

class AdministrativoFilter extends Filter
{
    protected $filterKeys = [
        'apellidos' => 'filterByApellidos',
        'ci' => 'filterByCi',
    ];

    protected function filterByApellidos()
    {
        $this->builder = $this->builder->whereRaw("MATCH (apellidos) AGAINST (? IN BOOLEAN MODE)" , fullTextWildcardsInitEnd($this->request->input('value')));
    }

    protected function filterByCi()
    {
        $this->builder = $this->builder->whereRaw("MATCH (nciit) AGAINST (? IN BOOLEAN MODE)" , fullTextWildcardsInitEnd($this->request->input('value')));
    }
}
