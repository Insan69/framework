<?php
namespace App\Controllers;

class Apotech extends BaseController
{
    public function index()
    {
        return view('apotech/dashboard');
    }
}