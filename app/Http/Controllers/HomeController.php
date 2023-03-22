<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;

class HomeController extends Controller
{
    private $apiController;

    public function __construct(APIController $apiController)
    {
        $this->middleware('auth');
        $this->apiController = $apiController;
    }

    public function index()
    {
        $name_user = auth()->user()->name;
        $email_user = auth()->user()->email;
        $user = $this->apiController->getModel('AD_User', '', "Name eq '$name_user' and EMail eq '$email_user'", '', '', '', 'PAGODAHUB_closecash');
        if (isset($user) ) {
            return view('home', [/* 'orgs' => $orgs, */ /* 'permisos' => $permisos, */ 'permisos' => $user]);
        }
    }
}
