<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Resources\Config\ConfigStepResource;
use App\Http\Resources\Config\ConfigCurrentResource;
use App\Http\Resources\Config\ConfigCollection;
use Illuminate\Support\Facades\DB;

class ConfigController extends ApiController
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function show(Config $config)
    {
        return new ConfigResource($config);
    }

    public function getCurrentConfig()
    {
        $step = getActiveStep();
        $config = $this->config->where('step_id', $step->id)->first();
        return new ConfigCurrentResource($config);
    }

    public function getStepConfig()
    {
        $step = getActiveStep();
        $config = $this->config->where('step_id', $step->id)->first();
        return new ConfigStepResource($config);
    }

    public function update(Request $request, Config $config)
    {
        try {
            $config->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated($request->all());
    }

    public function checkConfig()
    {
        return $this->respond(checkGeneralConfig());
    }
}
