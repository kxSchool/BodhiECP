<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 15:55
 */

class Statistic extends MY_Controller
{

    public function __construct() {
        parent::__construct();
    }

    public function order()
    {
        $this->load->view('statistic/order');
    }

    public function finance()
    {
        $this->load->view('statistic/finance');
    }

}