<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 9:39
 */

class Agency extends MY_Controller
{
    private $agencydb ;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Agencymodel');
        $this->agencydb = $this->Agencymodel;
    }

    public function join()
    {
        $this->load->view('agency/join');
    }

    public function enterJoin()
    {

        if(!isLogin()){
            echo json_encode(array('code'=>2,'mes'=>'您还没有登录'));exit;
        }
        $type = $this->input->get('type');
        $cate_list = $this->input->get('cate');
        $data = array();
        if(!$type){
            echo json_encode(array('code'=>1,'msg'=>'请选择入驻类型'));exit;
        }

        if(!$cate_list){
            echo json_encode(array('code'=>1,'msg'=>'请选择入驻类目'));exit;
        }
        $data['type'] = $type;
        $data['cate_list'] = $cate_list;
        $data['enter_time'] = time();
        $data['user_id'] = $_SESSION['user']['userid'];
        if($type == 1){ //个人
            $person['name'] = $this->input->post('personName');
            if(!$person['name']){
                echo json_encode(array('code'=>1,'msg'=>'请输入姓名'));exit;
            }
            $person['no'] = $this->input->post('personNo');
            if(!$person['no']){
                echo json_encode(array('code'=>1,'msg'=>'请输入身份证号码'));exit;
            }
            $person['mobile'] = $this->input->post('personMobile');
            if(!$person['mobile']){
                echo json_encode(array('code'=>1,'msg'=>'请输入手机号码'));exit;
            }
            $person['address'] = $this->input->post('personAddress');
            if(!$person['address']){
                echo json_encode(array('code'=>1,'msg'=>'请输入详细地址'));exit;
            }
            $person['front_identity_card'] = $this->input->post('front_identity_card');
            $person['back_identity_card'] = $this->input->post('back_identity_card');
            if(!$person['front_identity_card'] || !$person['back_identity_card']){
                echo json_encode(array('code'=>1,'msg'=>'请上传身份证信息'));exit;
            }
            $data['param'] = json_encode($person);
            $special['special_identity'] = $this->input->post('special_identity');
            $data['special'] = json_encode($special);
            if($this->agencydb->insertEnterApply($data)){
                echo json_encode(array('code'=>0,'msg'=>'申请成功'));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'申请失败'));exit;
        }else{ //企业
            $company['name'] = $this->input->post('companyName');
            if(!$company['name']){
                echo json_encode(array('code'=>1,'msg'=>'请输入企业名称'));exit;
            }
            $company['no'] = $this->input->post('companyNo');
            if(!$company['no']){
                echo json_encode(array('code'=>1,'msg'=>'请输入营业执照号码'));exit;
            }

            $company['address'] = $this->input->post('companyAddress');
            if(!$company['address']){
                echo json_encode(array('code'=>1,'msg'=>'请输入公司详细地址'));exit;
            }
            $company['business_card'] = $this->input->post('business_card');
            if(!$company['business_card']){
                echo json_encode(array('code'=>1,'msg'=>'请上传营业执照'));exit;
            }
            $company['organization_card'] = $this->input->post('organization_card');    //组织机构代码证
            $company['registration_card'] = $this->input->post('registration_card');    //税务登记证
            $data['param'] = json_encode($company);

            $special['name'] = $this->input->post('personName');
            $special['no'] = $this->input->post('personNo');
            $special['mobile'] = $this->input->post('personMobile');
            $special['address'] = $this->input->post('personAddress');
            $special['front_identity_card'] = $this->input->post('front_identity_card');
            $special['back_identity_card'] = $this->input->post('back_identity_card');
            $special['power_card'] = $this->input->post('power_card');
            if(!$special['name'] || !$special['no'] || !$special['mobile'] || !$special['address'] || !$special['front_identity_card'] || !$special['back_identity_card'] || !$special['power_card']){
                echo json_encode(array('code'=>1,'msg'=>'特殊资质材料不完善'));exit;
            }
            $data['special'] = json_encode($special);
            if($this->agencydb->insertEnterApply($data)){
                echo json_encode(array('code'=>0,'msg'=>'申请成功'));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'申请失败'));exit;
        }
    }

    public function index()
    {
        $this->load->view('agency/index');
    }

    public function enterCategory()
    {
        //所有一级类目
        $cate_list_1 = $this->agencydb->getAllCategory(1);
        $data = '<div class="floatLeft nav-content ">';
        $cate_1 = '<div class="floatleft nav"><ul class="nav-sub-list clearfix" id="nav-sub-list"  style="z-index: 9999;">';
        foreach ($cate_list_1 as $k1 => $v1){
            $style = '';
            if($k1 == 0){
                $style = 'checked active';
            }
            if($v1['multiple'] == 1){
                $multiple = 'data-multiple = "1"';
            }else{
                $multiple = 'data-multiple = "0"';
            }
            $cate_1 .= '<li onclick="changeCate(this)" class="'.$style.'" data-id="'.$v1['id'].'" '.$multiple.'><a>'.$v1['name'].'</a><i class="right-arrow"></i></li>';

            $string = '<div class="clearfix classify hidden" id="cate-'.$v1['id'].'">';
            if($k1 == 0){
                $string = '<div class="clearfix  classify" id="cate-'.$v1['id'].'">';
            }
            //获取二级类目
            $cate_list_2 = $this->agencydb->getCategoryByPid($v1['id']);
            $cate_str_2 = '<div class="nav-img-wrap-2 floatleft"><div class="detail">';
            $cate_str_1 = '<ul class="clearfix floatleft nav-content-item nav-content-item-2">';
            foreach ($cate_list_2 as $k2 => $v2){
                $cate_str_1 .= '<li class="cate_list" onclick="selectCate(this)" data-id="'.$v2['id'].'" id="cate-list-'.$v2['id'].'"><a href="#"><h5>'.$v2['name'].'</h5></a><b></b></li>';
                //获取三级类目
                $cate_list_3 = $this->agencydb->getCategoryByPid($v2['id']);
                $cate_str_3 = '<ul class="generation hidden" id="cate-info-'.$v2['id'].'" data-parent="'.$v1['id'].'" style=""><li class="filter-top"><span data-cid="'.$v2['id'].'">'.$v2['name'].'</span><i></i><strong>认证</strong></li><li class="filter-bot"><ul class="generations">';
                foreach ($cate_list_3 as $k3 => $v3){
                    $cate_str_3 .= '<li data-cid="'.$v3['id'].'" data-parent="'.$v2['id'].'" data-lv="3"><span>'.$v3['name'].'</span><em>/</em></li>';
                }
                $cate_str_3 .= '</ul><i></i></li></ul>';
                $cate_str_2 .= $cate_str_3;
            }
            $cate_str_1 .='</ul>';
            $cate_str_2 .= '</div></div>';
            $string .= $cate_str_1;
            $string .= $cate_str_2;
            $string .= '</div>';
            $data .= $string;
        }
        $cate_1 .= '</ul></div>';
        $data .= '</div>';
        echo $cate_1.$data;exit;
    }

}