<?php

namespace App\Http\Controllers;

use App\Contracts\Service\DesignPatternServiceInterface;

class DesignController extends Controller
{
    private $designPatternService;
    public function __construct(DesignPatternServiceInterface $designPatternService)
    {
        $this->designPatternService = $designPatternService;
    }

    public function index()
    {
        $result = 'claim';
        $data = $this->designPatternService->output($result);
        dd($data);
    }
}
