<?php

class Api extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('SendSms');
    }

    //ajax获取短信验证码
    public function ajaxSendSms()
    {
        if (IS_AJAX) {

            $mobile = $this->input->post('mobile');   //获取手机号

            $send_type = $this->input->post('type'); //获取短信类型

            $ver_code = randString(4);          //4位随机验证码

            $result = $this->sendSms($mobile, $ver_code);

            //发送成功后将信息添加到数据库
            if ($result) {

                $data = array(
                    'mobile_phone' => $mobile,
                    'sendtime' => time(),
                    'supplier' => '阿里云',
                    'content' => $ver_code,
                    'code' => $ver_code
                );

                if (!empty($send_type)) {
                    $data['sendtype'] = $send_type;
                }

                $this->SendSms->insert($data);

                echo json_encode(array('code' => 0, 'mes' => '发送成功'));exit;
            }

            echo json_encode(array('code' => 100, 'mes' => '发送失败'));exit;
        }
    }

    //ajax验证验证码
    public function ajaxCheckCode()
    {
        if(IS_AJAX){
            $mobile = $this->input->post('mobile');     //手机号
            $code = $this->input->post('code');         //验证码
            //检查验证码
            if (!$this->SendSms->checkCode($mobile, $code)) {
                echo json_encode(array('code' => 1, 'message' => '验证码错误'));exit;
            }
            echo json_encode(array('code' => 0, 'message' => 'success'));exit;
        }
    }

    //ajax修改手机号-验证密码
    public function ajaxCheckPwd()
    {
        if(IS_AJAX){
            $mobile = $this->input->post('mobile');     //手机号
            $password = $this->input->post('password'); //密码
            $code = $this->input->post('code'); //密码

            if (!preg_match("/^1[34578]{1}\d{9}$/", $mobile)) {
                echo json_encode(array('code' => 1, 'mes' => '请输入正确的手机号'));exit;
            }
            if (!$password) {
                echo json_encode(array('code' => 1, 'mes' => '密码不能为空'));exit;
            }
            if (!$code) {
                echo json_encode(array('code' => 1, 'mes' => '验证码不能为空'));exit;
            }
            if (!$this->SendSms->checkCode($mobile, $code)) {
                echo json_encode(array('code' => 1, 'message' => '验证码错误'));exit;
            }
            //获取用户信息
            $user_info = $this->Member->getInfoByMobile($mobile);
            if(!$user_info){
                echo json_encode(array('code' => 1, 'message' => '用户不存在'));exit;
            }

            //密码错误
            if ($user_info['password'] != md5(md5($password) . $user_info['encrypt'])) {
                echo json_encode(array('code' => 1, 'mes' => '密码错误'));exit;
            }
            echo json_encode(array('code' => 0, 'mes' => 'success'));exit;
        }
    }

    //ajax修改手机号-修改手机号
    public function ajaxChangeMobile()
    {
        if(IS_AJAX){
            if(!isLogin()){
                echo json_encode(array('code'=>1,'mes'=>'您还没有登录'));exit;
            }
            $old_mobile = $this->input->post('old_mobile');
            $new_mobile = $this->input->post('new_mobile');
            $code = $this->input->post('code');
            if (!preg_match("/^1[34578]{1}\d{9}$/", $old_mobile) || !preg_match("/^1[34578]{1}\d{9}$/", $new_mobile)) {
                echo json_encode(array('code' => 1, 'mes' => '手机号格式错误'));exit;
            }
            if (!$this->SendSms->checkCode($new_mobile, $code)) {
                echo json_encode(array('code' => 1, 'message' => '验证码错误'));exit;
            }
            //验证新手机号是否绑定
            $user_info = $this->Member->getInfoByMobile($new_mobile);
            if($user_info){
                echo json_encode(array('code' => 1, 'message' => '该手机号已经被绑定'));exit;
            }
            //获取用户信息
            $user_info = $this->Member->getInfoByMobile($old_mobile);
            if(!$user_info){
                echo json_encode(array('code' => 1, 'message' => '用户不存在'));exit;
            }
            if($_SESSION['user']['userid'] != $user_info['userid']){
                echo json_encode(array('code' => 1, 'message' => '没有相关权限'));exit;
            }
            $updateData = array(
                'mobile'=>$new_mobile
            );
            if($this->Member->updateByMobile($updateData,$old_mobile)){
                echo json_encode(array('code' => 0, 'message' => '修改成功'));exit;
            }
            echo json_encode(array('code' => 1, 'message' => '修改手机号失败'));exit;
        }
    }


    //ajax用戶註冊
    public function ajaxRegister()
    {

        if (IS_AJAX) {

            $mobile = $this->input->post('mobile');     //手机号
            $code = $this->input->post('code');         //验证码
            $password = $this->input->post('password'); //密码

            if (!preg_match("/^1[34578]{1}\d{9}$/", $mobile)) {
                echo json_encode(array('code' => 1, 'message' => '请输入正确的手机号'));exit;
            }

            if (empty($password)) {
                echo json_encode(array('code' => 1, 'message' => '请输入密码'));exit;
            }

            if (empty($code)) {
                echo json_encode(array('code' => 1, 'message' => '请输入验证码'));exit;
            }

            //检查验证码
            if (!$this->SendSms->checkCode($mobile, $code)) {
                echo json_encode(array('code' => 1, 'message' => '验证码错误'));exit;
            }

            //检查用户是否存在
            if ($this->Member->isExist($mobile)) {
                echo json_encode(array('code' => 1, 'message' => '该手机号已经被注册'));exit;
            }

            $member['mobile'] = $mobile;    //手机号码
            $member['encrypt'] = generate_password();   //密码盐
            $member['password'] = md5(md5($password) . $member['encrypt']);     //密码
            $member['username'] = preg_replace("/(\d{3})\d\d(\d{2})/", "\$1****\$3", $mobile);  //用户名
            $member['realname'] = '';       //真实姓名
            $member['register_ip'] = $_SERVER["REMOTE_ADDR"];   //注册ip
            $member['register_time'] = time();      //注册时间

            //添加用户
            $member['userid'] = $this->Member->insert($member);

            if ($member['userid']) {

                //保持登录状态
                $_SESSION['user'] = $member;

                echo json_encode(array('code' => 0, 'message' => 'success', 'url' => $this->locationUrl()));exit;

            }
            echo json_encode(array('code' => 1, 'message' => 'error'));exit;
        }
    }

    //ajax短信登录
    public function ajaxSmsLogin()
    {
        if (IS_AJAX) {

            $mobile = $this->input->post('mobile');     //手机号
            $code = $this->input->post('code');         //验证码

            if (!preg_match("/^1[34578]{1}\d{9}$/", $mobile)) {
                echo json_encode(array('code' => 1, 'mes' => '请输入正确的手机号'));exit;
            }

            if (empty($code)) {
                echo json_encode(array('code' => 1, 'mes' => '请输入验证码'));exit;
            }

            //检查验证码
            if (!$this->SendSms->checkCode($mobile, $code)) {
                echo json_encode(array('code' => 1, 'mes' => '验证码错误'));exit;
            }

            //如果存在，改变登录状态，不存在则自动注册
            if ($this->Member->isExist($mobile)) {

                $user_info = $this->Member->getInfoByMobile($mobile);

                $info['login_count'] = 0;       //登录次数
                $info['login_time'] = time();   //上次登录时间
                $info['login_ip'] = $_SERVER["REMOTE_ADDR"];        //登录地址
                $info['login_token'] = $this->uuid();       //token


                $this->Member->updateByMobile($info, $mobile);

                //保持登录状态
                $_SESSION['user'] = $user_info;

                //自动登录
                $login['userid'] = $user_info['userid'];
                $login['login_token'] = $info['login_token'];

                $this->keepLogin($login,$this->config->item('keep_login_time'));

            } else {

                //註冊用戶
                $member['mobile'] = $mobile;        //手机号
                $member['encrypt'] = generate_password();       //密码盐
                $member['password'] = md5(md5($member['encrypt']) . $member['encrypt']);        //密码
                $member['username'] = preg_replace("/(\d{3})\d\d(\d{2})/", "\$1****\$3", $mobile);      //用户名
                $member['realname'] = '';       //真实姓名
                $member['register_ip'] = $_SERVER["REMOTE_ADDR"];   //注册IP
                $member['login_count'] = 0;     //登录次数
                $member['login_time'] = time(); //上次登录时间
                $member['login_ip'] = $_SERVER["REMOTE_ADDR"];  //登录IP
                $member['register_time'] = time();      //注册时间

                //添加用户并返回userid
                $member['uid'] = $this->Member->insert($member);

                //保持登录状态
                $_SESSION['user'] = $member;

            }

            echo json_encode(array('code' => 0, 'mes' => '登录成功', 'url' => $this->locationUrl()));exit;
        }
    }

    //ajax验证密码登录
    public function ajaxPwdLogin()
    {
        if (IS_AJAX) {

            $mobile = $this->input->post('mobile');     //手机号
            $password = $this->input->post('password'); //密码

            if (!preg_match("/^1[34578]{1}\d{9}$/", $mobile)) {
                echo json_encode(array('code' => 1, 'mes' => '请输入正确的手机号'));exit;
            }

            if (empty($password)) {
                echo json_encode(array('code' => 1, 'mes' => '密码不能为空'));exit;
            }

            //用户是否存在
            if (!$this->Member->isExist($mobile)) {
                echo json_encode(array('code' => 1, 'mes' => '该手机号未注册，请前往注册'));exit;
            }

            //获取用户信息
            $user_info = $this->Member->getInfoByMobile($mobile);

            //登录失败次数
            if ($user_info['login_count'] > $this->config->item('login_fault_count')) {

                echo json_encode(array('code' => 1, 'mes' => '失败次数过多，请尝试验证码登录'));exit;

            }

            //密码错误
            if ($user_info['password'] != md5(md5($password) . $user_info['encrypt'])) {

                $login_count = $user_info['login_count'] + 1 ;
                $this->Member->updateByMobile(array('login_count'=>$login_count), $mobile);

                echo json_encode(array('code' => 1, 'mes' => '账号或密码错误'));exit;
            }

            $new_info['login_time'] = time();       //上次登录时间
            $new_info['login_ip'] = $_SERVER["REMOTE_ADDR"];    //上次登录IP
            $new_info['login_count'] = 0;       //登录失败次数
            $new_info['login_token'] = $this->uuid();   //token

            $this->Member->updateByMobile($new_info, $mobile);

            //保持登录状态
            $_SESSION['user'] = $user_info;

            //自动登录
            $login['userid'] = $user_info['userid'];
            $login['login_token'] = $new_info['login_token'];

            $this->keepLogin($login,$this->config->item('keep_login_time'));

            echo json_encode(array('code' => 0, 'mes' => '登录成功', 'url' => $this->locationUrl()));exit;
        }
    }

    //ajax专属定制
    public function sendConnect()
    {
        if(IS_AJAX){

            $message = $this->load->database('master', TRUE);

            $info['name'] = $this->input->get('name');  //联系人
            $info['mobile'] = $this->input->get('mobile');  //联系方式

            $data['type'] = 0;  //个人消息
            $data['message_time'] = time(); //发送消息时间
            $data['content'] = json_encode($info);  //消息内容

            $res = $message->insert('message',$data);

            if($res){
                echo json_encode(array('code'=>0,'mes'=>'发送成功,请注意工作人员电话回访'));exit;
            }

            echo json_encode(array('code'=>1,'mes'=>'error'));
        }
    }

    //ajax根据地区和产品获取价格
    public function getPrice()
    {
        if(IS_AJAX){

            $this->load->model('Goods');
            $gid = $this->input->post('gid');   //商品ID
            $rid = $this->input->post('rid');   //区域ID

            echo json_encode(array('code'=>0,'price'=>$this->Goods->getPrice($gid,$rid)));exit;

        }
    }

    //ajax忘记密码
    public function forgetPwd()
    {
        if(IS_AJAX){

            $mobile = $this->input->post('mobile');
            $code = $this->input->post('code');
            $password = $this->input->post('password');

            if (!preg_match("/^1[34578]{1}\d{9}$/", $mobile)) {
                echo json_encode(array('code' => 1, 'message' => '请输入正确的手机号'));exit;
            }

            if (empty($password)) {
                echo json_encode(array('code' => 1, 'message' => '请输入密码'));exit;
            }

            if (empty($code)) {
                echo json_encode(array('code' => 1, 'message' => '请输入验证码'));exit;
            }

            if (!$this->SendSms->checkCode($mobile, $code)) {
                echo json_encode(array('code' => 1, 'message' => '验证码错误'));exit;
            }

            if (!$this->Member->isExist($mobile)) {
                echo json_encode(array('code' => 1, 'message' => '该手机号未被注册'));exit;
            }
            
            $member['encrypt'] = generate_password();       //密码盐
            $member['password'] = md5(md5($password).$member['encrypt']);

            $res = $this->Member->updateByMobile($member,$mobile);

            if($res){
                echo json_encode(array('code' => 0, 'message' => 'success'));exit;
            }

            echo json_encode(array('code' => 1, 'message' => 'error'));
        }
    }

    //ajax獲取省級信息
    public function getProvince()
    {
        if(IS_AJAX){

            $this->load->model('Region');
            $list = $this->Region->getProvince();
            echo json_encode(array('code'=>0,'data'=>$list));exit;

        }
    }

    //ajax获取订单列表
    public function getOrderList()
    {

        if(IS_AJAX){

            if(!isLogin()){

                echo json_encode(array('code'=>1,'mes'=>'您还没有登录'));exit;

            }

            $type = $this->input->get('type');

            if($type == 1){
                $where['order_status'] = 0;
            }elseif ($type == 2){
                $where['order_status'] = 1;
            }else{
                $where['delete_time'] = 0;
            }

            $this->load->model('OrderInfo');

            //一共有多少条数据
            $count=$this->OrderInfo->orderNum($where);

            //每页展示数量
            $page_size = 20;

            $data['link'] = $this->pagination(site_url("order/orderList"),$page_size,$count);

            //传入的数据
            if(isset($_REQUEST['p'])){
                $offset = $this->input->get('p');
                $offset = ($offset-1)*$page_size;
            }else{
                $offset = 0;
            }

            $data['order_goods'] = $this->OrderInfo->orderList($offset,$page_size,$where);

            echo json_encode(array('code'=>0,'data'=>$data));exit;
        }
    }

    //分类
    private function pagination($url,$page_size=20,$total_rows)
    {
        //装载类文件
        $this->load->library('pagination');

        $config['base_url']=$url;

        $config['full_tag_open'] = '<ul class="paginations">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="pre-page">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="next-page">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'p';
        $config['attributes'] = array('class' => 'myclass');//给所有<a>标签加上class

        //每一页显示的数据条数
        $config['per_page']=$page_size;
        $config['first_link']= '<<';
        $config['next_link']= '下一页';
        $config['prev_link']= '上一页';
        $config['last_link']= '>>';

        //一共有多少条数据
        $config['total_rows']=$total_rows;

        //初始化 ，传入配置？？？？
        $this->pagination->initialize($config);
        return $this->pagination->create_ajax_links();
    }

    /**
     * 发送短信
     */
    private function sendSms($phone,$code)
    {

        $this->load->library('signatureHelper');

        $params = array ();



        return $content;

    }

    //登录注册之后跳转操作
    private function locationUrl()
    {
        if(!empty($_SESSION['cache_data']['userurl'])){
            return $_SESSION['cache_data']['userurl'];
        }else{
            return site_url('index/index');
        }
    }

    //微信支付
    public function pay()
    {
        if(IS_AJAX){
            $this->load->model('OrderInfo');
            $order_id = $this->input->get('oid');
            $data = $this->OrderInfo->getOrderById($order_id);
            $this->wxpay($data);
        }
    }

    //微信支付
    private function wxpay($datas)
    {
        //商品订单号
//        $data["Out_trade_no"] = date('Ymd').rand(1000,9999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 5, 13), 1))), 4, 12);
        $data['order_id'] = $datas['order_id'];
        $data["Body"] = 'test';     //商品或支付单简要描述
        $data["Total_fee"] = $datas['order_amount']*100; //商品总金额
        $data["trade_type"] = 'NATIVE'; //类型
        $data["Attach"] = 'test'; //
        $data["Goods_tag"] = 'test'; //
        $data["Notify_url"] = 'https://www.kxschool.com/pay/wxpay/example/notify.php'; //
        $_SESSION["order_info"]=$data;
        header("Location: https://www.kxschool.com/pay/wxpay/example/native.php");

    }

    //获取评论数量
    public function getProCommentCount()
    {
        if(IS_AJAX){
            $this->load->model('Comment');
            $goods_id = $this->input->get('gid');

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
            echo json_encode($count);exit;
        }
    }

    //获取商品评价
    public function getProComment()
    {
        if(IS_AJAX){
            $this->load->model('Comment');
            $goods_id = $this->input->get('gid');
            $type = $this->input->get('type');
            if(!$goods_id){
                echo json_encode(array('code'=>1,'msg'=>'参数错误'));exit;
            }

            //总评价数量
            $where['goods_id'] = $goods_id;
            if($type){
                if($type == 'goods'){
                    $where['star_level'] = 5;
                }elseif ($type == 'middle'){
                    $where['star_level >='] = 3;
                    $where['star_level <'] = 5;
                }else{
                    $where['star_level <'] = 3;
                }
            }
            $count =$this->Comment->countComment($where);
            //每页展示数量
            $page_size = 10;
            $link = $this->pagination(site_url("api/getProComment?gid=$goods_id"),$page_size,$count);

            if(isset($_REQUEST['p'])){
                $offset = $this->input->get('p');
//                $offset = ($offset-1)*$page_size;
            }else{
                $offset = 0;
            }
            $list = $this->Comment->commentList($where,$offset,$page_size);
            if($list){
                foreach ($list as $k=>$v){
                    if(empty($v['icon'])){
                        $v['icon'] = 'default.png';
                    }
                    $list[$k]['icon'] = $this->config->item('members_avatar_url') . $v['icon'];
                    $list[$k]['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
                }
            }

            $data = array(
                'code' => 0,
                'list' => $list,
                'link' => $link
            );
            echo json_encode($data);exit;
        }
    }

    //随机获取相关推荐
    public function relevant()
    {
        if(IS_AJAX){
            $this->load->model('Goods');
            $gid = $this->input->get('gid');
            if($gid){
                $cate_id = $this->Goods->getCidByGid($gid);
            }else{
                $cate_id = $this->Goods->getCidByGid(false);
            }
            $goods_list = $this->Goods->randGoods($cate_id,2);
            echo json_encode(array('data'=>$goods_list,'code'=>0,'mes'=>'success'));exit;
        }
    }

    //修改订单商品数量
    public function changeOrder()
    {
        if(IS_AJAX){
            $this->load->model('Goods');
            $this->load->model('OrderInfo');
            $order_id = $this->input->post('oid');
            $goods_id = $this->input->post('gid');
            $goods_num = $this->input->post('num');
            if($goods_num < 1 || $goods_num > 45){
                echo json_encode(array('code'=>1,'mes'=>'incorrect number !'));exit;
            }

            //計算價格
            $price_expression = $this->Goods->getPrice($goods_id,0,$goods_num);

            if($goods_num != 1){
                $price_expression = preg_replace('/num/',$goods_num,$price_expression);

                $price = 0;
                eval("\$price = $price_expression");

            }else{
                $price = $price_expression;
            }

            $where = array(
                'goods_sn' => $goods_id,
                'order_id' => $order_id,
            );
            $data = array('goods_count'=>$goods_num,'goods_price'=>$price,'order_amount'=>$price);
            if($this->OrderInfo->editOrderGoods($where,$data)){
                $price=sprintf("%.2f", intval($price));
                echo json_encode(array('code'=>0,'mes'=>'success','price'=>$price));exit;

            }
            echo json_encode(array('code'=>1,'mes'=>'error','price'=>$price));exit;
        }

    }
}