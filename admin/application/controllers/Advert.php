<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/4
 * Time: 13:23
 */

class Advert extends MY_Controller
{
    private $addb;
    public function __construct() {
        parent::__construct();
        $this -> load -> model('Advertmodel');
        $this -> addb = $this->Advertmodel;
    }


    public function index()
    {
        $this->view('avert/index');
    }




}