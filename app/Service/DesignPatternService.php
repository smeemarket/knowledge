<?php

namespace App\Service;

use App\Contracts\Dao\DesignPatternDaoInterface;
use App\Contracts\Service\DesignPatternServiceInterface;

class DesignPatternService implements DesignPatternServiceInterface
{
    private $designPatternDao;
    public function __construct(DesignPatternDaoInterface $designPatternDao)
    {
        $this->designPatternDao = $designPatternDao;
    }

    public function output($data)
    {
        if ($data == 'claim') {
            return $this->designPatternDao->getCustomer();
        } else {
            return 'not get';
        }
    }
}
