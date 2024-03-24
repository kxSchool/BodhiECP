<?php

class Index extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database('master');

    }

    /*
     * 网站首页
     */
    public function index()
    {
//        $this->output->cache(30);

        //首页轮播图
        $where['spaceid'] = 1;
        $data['carousel'] = $this->getAdData($where);
        //首页服务位
        $where['spaceid'] = 2;
        $data['server'] = array_chunk($this->getAdData($where),4);
        //专属定制位
        $where['spaceid'] = 7;
        $data['center'] = $this->getAdData($where);

        //底部推荐位
        $ads_info = $this->db->select('spaceid,name')->where('spaceid in(3,4,5,6,8) and disabled=1')->get('ad_space');
        $ads_info = $ads_info->result_array();
        foreach ($ads_info as $key=>$value){
            $where['spaceid'] = $value['spaceid'];
            $ads_info[$key]['ad_list'] = $this->getAdData($where);
        }

        $data['bot_rec'] = $ads_info;
        //require_once(APPPATH .'libraries/jssdk.php');
        //    $jssdk = new JSSDK("wxe249b5ff21dcd740", "a0cc649823e1184a6c3c5f48502f17ab");
        //    $signPackage = $jssdk->GetSignPackage();
            $news = array(
                "Title" => "XXXXX",
                "Description" => "XXXXX是一家专注于为创业者及中小微企业提供一站式创业孵化服务的O2O平台，是对传统商务服务业的颠覆，是用互联网思维创建的企业服务生态圈。服务项目包括：工商服务、财税服务、知识产权、认证服务、法律服务、科技服务、金融服务、创业指导、创业扶持、人才推荐等业务。",
                "PicUrl" => 'https://m.kxschool.com/public/images/logo.jpg',
                "Url" => 'https://m.kxschool.com');
            $data['news']=$news;
            $data['signPackage']="signPackage";
        $this->load->vars('data', $data);
        $this->load->view('index/index',$data);
    }

    private function getAdData($where)
    {
        $this->db->select('setting,name,spaceid,price,amount');
        $where['disabled'] = 1;
        $this->db->where($where);
        $this->db->order_by('listorder');
        $result = $this->db->get('ad');
        $res =  $result->result_array();
        if(!empty($res)){
            foreach ($res as $k => $v){
                $res[$k]['setting'] = json_decode($v['setting'],true);
            }
            return $res;
        }
        return array();
    }

    //专属定制
    public function customization()
    {

        if(IS_AJAX){

            $data['company_status'] = $this->input->post('company_status');
            $data['name'] = $this->input->post('name');
            $data['mobile'] = $this->input->post('mobile');
            $data['content'] = $this->input->post('content');
            $res = $this->db->insert('message',array('content'=>json_encode($data),'message_time'=>time()));
            if($res){
                echo json_encode(array('code'=>0,'url'=>site_url('index/index'),'mes'=>'委托已提交'));exit;
            }
            echo json_encode(array('code'=>1,'mes'=>'提交失败,请稍后再试'));exit;
        }

        $this->load->view('index/exclusive');

    }

    //用户协议
    public function protocol()
    {
        $this->load->view('index/protocol');
    }
}