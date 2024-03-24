<?php
//////////////////////////////////////////////////////////////////////
// 章爱军(永远的大牛)                                               //
// Trial License: For evaluation only!                              //
// (c) 2018, ZhangAijun, http://www.mydeershow.com                  //
//////////////////////////////////////////////////////////////////////
defined('BASEPATH') OR exit('No direct script access allowed');

class U extends CI_Controller {
    public function index($companyId) {
        if (isset($companyId)) {
            $this->load->library('session');//初始化session类
            $this->session->set_userdata('companyId',$companyId);
            header('Location: /');
        }
	}
 }
 ?>