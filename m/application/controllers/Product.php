<?php

class Product extends MY_Controller
{

    protected $shop_mall = '';
    protected $goods = '';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Goods_model');
        $this->load->model('Category_model');
        $this->load->model('Region_model');
        $this->load->model('Comment');
    }

    //商品详情页
    public function info()
    {

        $sid = $this->input->get('sid');  //商品二级分类id

        $tid = $this->input->get('tid');  //商品三级分类id

        $count = $this->Goods_model->getCountByCid($tid);      //三级分类相同的商品个数

        //详情页名称
        $data['goods_title'] = '';

        //所属二级分类名称
        $data['catname'] = $this->Category_model->getNameById($sid);

        if($count > 1){

            $data['goods_list'] = $this->Goods_model->getGoodsByCid($tid,3);

            $gid = $data['goods_list'][0]['id'];

            $data['goods_title'] = $this->Category_model->getNameById($tid);

        }else{

            $goods_list = $this->Goods_model->getGoodsByCid($sid,2);

            foreach ($goods_list as $k=>$v){

                $num = $this->Goods_model->getCountByCid($v['category3']);
                if($num == 1){
                    $data['goods_list'][] = $v;
                }
                if($v['category3'] == $tid){
                    $gid = $v['id'];
                }
            }
        }

        if(isset($_GET['id'])){

           $gid = $this->input->get('id');

        }

        $data['good_info'] = $this->Goods_model->getDetialById($gid);

        $data['good_info']['totalprice'] = $this->Goods_model->getPrice($gid,$this->config->item('default_areaid'));

        if(empty($data['goods_title'])){
            $data['goods_title'] = $data['good_info']['all_name'];
        }

        $_SESSION['cache_data']['cate_name'] = $data['catname'];
        $_SESSION['cache_data']['goods_name'] = $data['good_info']['all_name'];
        $this->load->view('product/info/info',$data);

    }

    //分类首页
    public function index()
    {

        $data['cate'] = $this->Category_model->getFirstCate();
        $this->load->view('product/product',$data);

    }

    //ajax根据一级分类获取分类信息
    public function ajaxGetCate()
    {

        if(IS_AJAX){

            $cid = $this->input->get('cid');
            $res = $this->Category_model->getCateByPid($cid);
            $data = array();

            foreach ($res as $key => $value){

                $data[$key]['categoryid'] = $value['cat_id'];
                $data[$key]['categorytitle'] = $value['cat_name'];
                $data[$key]['categoryName'] = $this->Category_model->getCateByPid($value['cat_id']);

            }

            $result['message'] = 'Success';
            $result['code'] = 0;
            $result['data'] = $data;

            echo  json_encode($result);exit;

        }

    }

    //关联服务
    public function exService()
    {

        $ids = $this->input->get('id');

        $idsarr = explode('_',$ids);

        if(count($idsarr) > 1){

            list($province_id,$city_id,$area_id,$gid) = $idsarr;
            //地区信息
            $province = $this->Region_model->getRegionNameById($province_id);
            $city = $this->Region_model->getRegionNameById($city_id);
            $area = $this->Region_model->getRegionNameById($area_id);
            $data['goods_info']['region'] = $province . '-' . $city . '-' . $area;

        }else{

            $gid = $idsarr[0];
            $area_id = 0;   //地区为0
            $city_id = 0;
            $province_id = 0;
            //地区信息
            $data['goods_info']['region'] = '全国';

        }

        //暂存地址信息，如果选项为全国则保存默认省市区id
        $_SESSION['cache_data']['provinceid'] = $province_id;
        $_SESSION['cache_data']['cityid'] = $city_id;
        $_SESSION['cache_data']['areaid'] = $area_id;
        $_SESSION['cache_data']['region'] = $data['goods_info']['region'];

        $data['title'] = $_SESSION['cache_data']['cate_name'];  //標題

        $data['goods_info']['cate_name'] = $_SESSION['cache_data']['cate_name'];
        $data['goods_info']['good_id'] = $gid;
        $data['goods_info']['good_price'] = $this->Goods_model->getPrice($gid,$area_id);
        $data['goods_info']['good_name'] = $_SESSION['cache_data']['goods_name'];

        $data['providerid'] = $area_id;

        $data['ex_list'] = $this->Goods_model->exService($gid,$area_id);
        if(empty($data['ex_list'])){
            $url = site_url('order/confirm') . '?id=' . $gid;
            header("Location: $url");exit;
        }


        $this->load->view('product/relate',$data);
    }

    //获取省级信息
    public function getProvince()
    {
        if(IS_AJAX){

            $data = $this->Region_model->getProvince();
            $data['data'] = $data;
            $data['code'] = 0;
            $data['mes'] = 'Success';
            echo json_encode($data);exit;

        }
    }

    //获取市級信息
    public function getCity()
    {
        if(IS_AJAX){

            $rid = $this->input->get('rid');
            $gid = $this->input->get('gid');

            $city = $this->Region_model->getAreaByPid($rid);
            $region_list = $this->Goods_model->getRegionsByGid($gid);

            if(!empty($city)) {
                foreach ($city as $k=>$v){
                    $count = 0;
                    $city[$k]['isuse'] = 0;

                    $area = $this->Region_model->getAreaByPid($v['id']);

                    foreach ($area as $key=>$value){

                        if(in_array($value['id'],$region_list)){

                            $count ++ ;
                        }
                    }
                    if($count > 0){
                        $city[$k]['isuse'] = 1;
                    }

                }
            }
            $data['data'] = $city;
            $data['code'] = 0;
            $data['mes'] = 'Success';
            echo json_encode($data);exit;
        }

    }

    //获取市級信息
    public function getArea()
    {
        if(IS_AJAX){

            $rid = $this->input->get('rid');
            $gid = $this->input->get('gid');

            $area = $this->Region_model->getAreaByPid($rid);
            $region_list = $this->Goods_model->getRegionsByGid($gid);

            if(!empty($area)) {
                foreach ($area as $k=>$v){

                    if(in_array($v['id'],$region_list)){
                        $area[$k]['isuse'] = 1;
                        $area[$k]['price'] = $this->Goods_model->getPrice($gid,$v['id']);
                    }else{
                        $area[$k]['isuse'] = 0;
                    }

                }
            }
            $data['data'] = $area;
            $data['code'] = 0;
            $data['mes'] = 'Success';
            echo json_encode($data);exit;
        }

    }

    //獲取價格
    public function getPrice()
    {
        if(IS_AJAX){

            $rid = $this->input->get('rid');
            $gid = $this->input->get('gid');
            $price = $this->Goods_model->getPrice($gid,$rid);
            echo json_encode(array('code'=>0,'data'=>$price));exit;

        }
    }

    //获取评论列表 3条
    public function ajaxCommentList()
    {
        if(IS_AJAX){

            $goods_id = $this->input->get('gid');
            $offset = 0;
            $pagesize = 3;
            $data['data']['list'] = $this->Comment->commentList($goods_id,$offset,$pagesize);
            foreach ($data['data']['list'] as $k => $v){
                $data['data']['list'][$k]['add_time'] = date('Y-m-d',$v['add_time']);
            }


            //总评价数量
            $count_list =$this->Comment->countCommentGroup($goods_id);
            $count['total'] = 0;   //总评论
            $count['bad'] = 0;     //差评
            $count['good'] = 0;    //中评
            $count['middle'] = 0;  //好评
            if($count_list){
                foreach ($count_list as $cid => $cinfo){
                    if($cinfo['star_level'] >= 5){
                        $count['good'] += $cinfo['count'];
                    }elseif ($cinfo['star_level'] >= 3){
                        $count['middle'] += $cinfo['count'];
                    }else{
                        $count['bad'] += $cinfo['count'];
                    }
                    $count['total']  += $cinfo['count'];
                }
            }

            $data['data']['num'] = $count['total'];
            $data['data']['rate'] = round($count['good']/$count['total']*100,2).'%';
            $data['code'] = 0;
            $data['mes'] = 'success';
            echo json_encode($data);exit;

        }

    }

    //评价列表
    public function commentList()
    {

        $goods_id = $this->input->get('gid');

        $offset = 0;

        $pagesize = 20;

        $data['list'] = $this->Comment->commentList($goods_id,$offset,$pagesize);

        foreach ($data['list'] as $k => $v){
            $data['list'][$k]['add_time'] = date('Y-m-d',$v['add_time']);
        }

        $data['num'] = $this->Comment->countComment($goods_id);
        $this->load->view('product/comment',$data);
    }



}