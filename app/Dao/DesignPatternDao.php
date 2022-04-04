<?php

namespace App\Dao;

use App\Contracts\Dao\DesignPatternDaoInterface;
use App\Models\Customer;

class DesignPatternDao implements DesignPatternDaoInterface
{
    public function getCustomer()
    {
        return Customer::get();
    }
}
