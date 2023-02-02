<?php

namespace Culture;

class CustomersController extends Controller
{
    public static function index()
    {
        return self::view('Customers');
    }

}