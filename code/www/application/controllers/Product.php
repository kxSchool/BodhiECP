<?php

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Goods');
        $this->load->model('Region');
    }

    public function info()
    {
        $ids = $this->input->get('cid');

        list($sid,$tid) = explode('_',$ids);    //分类

        $count = $this->Goods->getCountByCid($tid);      //三级分类相同的商品个数

        //所属二级分类名称
        $this->data['catname'] = $this->Category->getNameById($sid);

        if($count > 1){

            $this->data['goods_list'] = $this->Goods->getGoodsByCid($tid,3);

            $gid = $this->data['goods_list'][0]['id'];

            $this->data['goods_title'] = $this->Category->getNameById($tid);

        }else{

            $goods_list = $this->Goods->getGoodsByCid($sid,2);

            foreach ($goods_list as $k=>$v){

                $num = $this->Goods->getCountByCid($v['category3']);
                if($num == 1){
                    $this->data['goods_list'][] = $v;
                }
                if($v['category3'] == $tid){
                    $gid = $v['id'];
                }
            }
        }

        if(isset($_GET['gid'])){

            $gid = $this->input->get('gid');

        }
        if(!isset($gid)){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->data['good_info'] = $this->Goods->getDetialById($gid);
        $this->data['good_info']['totalprice'] = $this->Goods->getPrice($gid,$this->config->item('default_areaid'));

        if(empty($this->data['goods_title'])){
            $this->data['goods_title'] = $this->data['good_info']['all_name'];
        }

        $this->data['province'] = $this->Region->getProvince();
        $this->data['city'] = $this->Region->getAreaByPid($this->config->item('default_provinceid'));
        $this->data['area'] = $this->Region->getAreaByPid($this->config->item('default_cityid'));

        $this->load->view('product/info',$this->data);
    }

    public function exServer()
    {

        $ids = $this->input->get('id');
        $id_arr = explode('_',$ids);
        if(count($id_arr) > 1){

            list($gid,$province_id,$city_id,$area_id) = $id_arr;
            //地区信息
            $province = $this->Region->getRegionNameById($province_id);
            $city = $this->Region->getRegionNameById($city_id);
            $area = $this->Region->getRegionNameById($area_id);
            $region = $province . '-' . $city . '-' . $area;

        }else{

            $gid = $id_arr[0];
            $area_id = 0;   //地区为0
            $city_id = 0;
            $province_id = 0;
            //地区信息
            $region = '全国';

        }

        //保存地址信息
        session('cache_region',array(
            'pid'=>$province_id,
            'cid'=>$city_id,
            'aid'=>$area_id,
            'region'=>$region
        ));

        //获取列表信息
        $this->data['ex_list'] = $this->Goods->exService($gid,$area_id);
        if(empty($this->data['ex_list'])){
            $url = site_url('order/confirm') . '?id=' . $gid;
            header("Location: $url");exit;
        }
        $this->data['goods_id'] = $gid;
        $this->load->view('product/relate',$this->data);
    }

}