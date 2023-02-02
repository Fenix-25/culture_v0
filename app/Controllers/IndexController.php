<?php

namespace Culture;

class IndexController extends Controller
{
    public static function index()
    {
        return self::view('Index');
    }

}