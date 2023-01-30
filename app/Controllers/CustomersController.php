<?php

namespace Culture;

class CustomersController
{
    public static function index()
    {
        return Helper::view('Customers');
    }

}