<?php

class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //首页
    public function Index()
    {

        $this->output->cache(30);
        
        $uri = $this->config->item('base_url').
               $this->config->item('index_page').
               $this->uri->uri_string();
         
        //得出cache文件的文件名
        $cacheName = md5($uri);
        $this->data['cacheName'] = $cacheName;
        //首页轮播图
        $this->data['carousel'] = $this->Ad->getListBySid(10);

        $this->data['hot'][] = $this->Ad->getAdInfo(48);
        $this->data['hot'][] = $this->Ad->getAdInfo(49);
        $this->data['hot'][] = $this->Ad->getAdInfo(50);
        $this->data['ad_4'] = $this->Ad->getAdInfo(51);
        $this->data['ad_5'] = $this->Ad->getAdInfo(53);
        // dump($this->data['ad_4']);exit;
        //优惠套餐
        $this->data['discounts'] = $this->Ad->getAdInfo(12);

        //首页标识
        $this->data['isIndex'] = 1;
        $this->load->view('index/index', $this->data);

    }

    //联系我们
    public function Contact()
    {
        $this->load->view('index/contact', $this->data);
    }

    //关于我们
    public function About()
    {
        $this->load->view('index/about', $this->data);
    }

    //加入我们
    public function Join()
    {
        $this->load->view('index/join', $this->data);
    }

    //关于退款
    public function Refund()
    {
        $this->load->view('index/refund', $this->data);
    }

    //新手帮助
    public function userHelper()
    {
        $this->load->view('index/userHelp', $this->data);
    }

    //支付帮助
    public function payHelper()
    {
        $this->load->view('index/payHelp', $this->data);
    }

    //用户协议
    public function protocol()
    {
        $this->load->view('index/protocol', $this->data);
    }

    public function invoice()
    {
        $this->load->view('index/invoice', $this->data);
    }
}