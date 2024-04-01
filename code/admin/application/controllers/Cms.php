<?php

class Cms extends MY_Controller
{
    private $cmsdb;

    public function __construct() {
        parent::__construct();
        $this->load->model('Cmsmodel');
        $this->cmsdb = $this->Cmsmodel;
    }

    /**
     * 栏目列表
     */
    public function channel()
    {
//        if($this->input->get('dosearch')){
//            $parameter = $this->input->get();
//            $this->load->vars('search',$parameter);
//            $status = $this->input->get('status');
//            if($status){
//                $data['where']['status'] = $status;
//            }
//            $uid = $this->input->get('uid');
//            if($uid){
//                $data['where']['user_id'] = $uid;
//            }
//            $time = $this->input->get('time');
//            if($time){
//                list($begin,$last) = explode('-',$time);
//                $data['where']['add_time >='] = strtotime(trim($begin).'00:00:00');
//                $data['where']['add_time <='] = strtotime(trim($last).'23:59:59');
//            }
//        }
//
        $data['where']['disabled'] = 1;
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;

        $result = $this->cmsdb->getAllChannel($data);
        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this->load->view('cms/channel',$dataShow);
    }

    /**
     * 删除栏目
     */
    public function delChannel()
    {
        if(IS_AJAX){
            $id = $this->input->get('id');
            if(!$id){
                echo json_encode(array('code'=>1,'msg'=>'参数有误'));exit;
            }
            $data = array(
                'catid' => $id,
                'disabled' => 0
            );
            $info = $this->cmsdb->getChannelInfo(array('catid'=>$id));
            if(!$info){
                echo json_encode(array('code'=>1,'msg'=>'栏目不存在'));exit;
            }
            if($this->cmsdb->updateChannel($data)){
                $this->createAdminLog('删除栏目：' . $info['catname']);
                echo json_encode(array('code'=>0,'msg'=>'删除成功'));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'删除失败'));exit;
        }
    }

    /**
     * 添加栏目
     */
    public function addChannel()
    {
        if(IS_AJAX){
            $type = $this->input->post('type');
            $parentid = $this->input->post('parentid');
            $catname = $this->input->post('catname');
            $keywords = $this->input->post('keywords');
            $description = $this->input->post('description');
            $ismenu = $this->input->post('ismenu');
            if(!$parentid && $parentid != 0){
                echo json_encode(array('code'=>1,'msg'=>'无效的栏目'));exit;
            }
            if($type && $catname && $keywords && $description){
                $data = array();
                if(strstr($catname,',')){
                    $name_arr = explode(',',$catname);
                    foreach ($name_arr as $k => $v){
                        $data[$k]['type'] = $type;
                        $data[$k]['parentid'] = $parentid;
                        $data[$k]['ismenu'] = $ismenu;
                        $data[$k]['description'] = $description;
                        $data[$k]['keywords'] = $keywords;
                        $data[$k]['catname'] = $v;
                    }
                }else{
                    $data['type'] = $type;
                    $data['parentid'] = $parentid;
                    $data['catname'] = $catname;
                    $data['ismenu'] = $ismenu;
                    $data['description'] = $description;
                    $data['keywords'] = $keywords;
                }
                if($this->cmsdb->insertChannel($data)){
                    $this->createAdminLog('添加栏目：' . $catname);
                    echo json_encode(array('code'=>0,'msg'=>'添加成功'));exit;
                }
                echo json_encode(array('code'=>1,'msg'=>'添加失败'));exit;
            }else{
                echo json_encode(array('code'=>1,'msg'=>'参数有误'));exit;
            }
        }else{
            $list = $this->cmsdb->getChannelList();
            foreach ($list as $k => $v) {
                $list[$k]['id'] = $v['catid'];
            }
            $listTree = formatTreeLevel($list, 0);
            $listTree = array_multi2single($listTree);
            $this->load->vars('list',$listTree);
            $this->load->view('cms/addChannel');
        }
    }

    /**
     * 修改栏目
     */
    public function editChannel()
    {
        if(IS_AJAX){
            $id = $this->input->post('id');
            $type = $this->input->post('type');
            $parentid = $this->input->post('parentid');
            $catname = $this->input->post('catname');
            $keywords = $this->input->post('keywords');
            $description = $this->input->post('description');
            $ismenu = $this->input->post('ismenu');
            if(!$parentid && $parentid != 0){
                echo json_encode(array('code'=>1,'msg'=>'无效的栏目'));exit;
            }
            if($type && $catname && $keywords && $description){
                $data = array();
                $data['catid'] = $id;
                $data['type'] = $type;
                $data['parentid'] = $parentid;
                $data['catname'] = $catname;
                $data['ismenu'] = $ismenu;
                $data['description'] = $description;
                $data['keywords'] = $keywords;
                if($this->cmsdb->updateChannel($data)){
                    $this->createAdminLog('修改栏目：' . $catname);
                    echo json_encode(array('code'=>0,'msg'=>'添加成功'));exit;
                }
                echo json_encode(array('code'=>1,'msg'=>'添加失败'));exit;
            }else{
                echo json_encode(array('code'=>1,'msg'=>'参数有误'));exit;
            }
        }else{
            //获取栏目列表
            $list = $this->cmsdb->getChannelList();
            foreach ($list as $k => $v) {
                $list[$k]['id'] = $v['catid'];
            }
            $listTree = formatTreeLevel($list, 0);
            $listTree = array_multi2single($listTree);
            $this->load->vars('list',$listTree);

            $where['catid'] = $this->input->get('id');
            $info = $this->cmsdb->getChannelInfo($where);
            $this->load->view('cms/editChannel',$info);
        }
    }

    /**
     * 内容列表
     */
    public function archive()
    {
//        if($this->input->get('dosearch')){
//            $parameter = $this->input->get();
//            $this->load->vars('search',$parameter);
//            $status = $this->input->get('status');
//            if($status){
//                $data['where']['status'] = $status;
//            }
//            $uid = $this->input->get('uid');
//            if($uid){
//                $data['where']['user_id'] = $uid;
//            }
//            $time = $this->input->get('time');
//            if($time){
//                list($begin,$last) = explode('-',$time);
//                $data['where']['add_time >='] = strtotime(trim($begin).'00:00:00');
//                $data['where']['add_time <='] = strtotime(trim($last).'23:59:59');
//            }
//        }
//
        $data['where']['isdel'] = 0;
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;

        $result = $this->cmsdb->getAllArchive($data);
        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this->load->view('cms/archive',$dataShow);
    }

    /**
     * 发布文章
     */
    public function addArchive()
    {
        if(IS_AJAX){

            $catid = $this->input->post('catid');   //栏目ID
            if(!$catid){
                echo json_encode(array('code'=>1,'msg'=>'栏目不能为空'));exit;
            }
            $data['catid'] = $catid;
            $title = $this->input->post('title');   //标题
            if(!$title){
                echo json_encode(array('code'=>1,'msg'=>'标题不能为空'));exit;
            }
            $data['title'] = $title;
            $data['thumb'] = $this->input->post('thumb');   //缩略图
//            $data['url'] = $this->input->post('url');       //URL
            $data['keywords'] = $this->input->post('keywords'); //关键字
            $data['description'] = $this->input->post('description');   //描述
            $content = $this->input->post('content');   //内容
            if(!$content){
                echo json_encode(array('code'=>1,'msg'=>'内容不能为空'));exit;
            }
            $data['content'] = $content;

            $data['views'] = $this->input->post('views');   //浏览量
//            $likes = $this->input->post('likes');   //点赞
//            $dislikes = $this->input->post('dislikes');   //点踩
            $data['listorder'] = $this->input->post('listorder');   //排序

            $data['isshow'] = $this->input->post('isshow');   //展示
            $publishtime = $this->input->post('publishtime');   //发布时间
            if($publishtime){
                $data['status'] = 1;
                $data['publishtime'] = time();
            }else{
                $data['status'] = 2;
            }
            $flag = $this->input->post('flag');   //标志
            if($flag){
                foreach ($flag as $f){
                    if($f == 'top'){
                        $data['top'] = 1;   //置顶
                    }elseif ($f == 'recommend'){
                        $data['recommend'] = 1;   //推荐
                    }
                }
            }
            $data['inputtime'] = time();
            $data['adminid'] = $this->session->userdata('id');

            $archive_id = $this->cmsdb->insertArchive($data);
            if($archive_id){
                $goodsNews = array();
                $goods = $this->input->post('goods');
                if($goods){
                    foreach ($goods as $k2=>$v2){
                        $goodsNews[$k2]['goods_id'] = $v2;
                        $goodsNews[$k2]['news_id'] = $archive_id;
                    }
                }
                $this->cmsdb->insertGoodsNews($goodsNews);

                $msg = '添加';
                if(isset($data['publishtime'])){
                    $msg = '发布';
                }
                $this->createAdminLog($msg.'文章：' . GetPartStr($data['title'],10));

                echo json_encode(array('code'=>0,'msg'=>$msg.'成功'));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'添加失败'));exit;
        }else{
            //获取所有商品
            $this->load->model('Goodsmodel');
            $this->load->vars('goods_list',$this->Goodsmodel->getAllGoods());
            //获取栏目列表
            $list = $this->cmsdb->getChannelList();
            foreach ($list as $k => $v) {
                $list[$k]['id'] = $v['catid'];
            }
            $listTree = formatTreeLevel($list, 0);
            $listTree = array_multi2single($listTree);
            $this->load->vars('list',$listTree);
            $this->load->view('cms/addArchive');
        }
    }

    /**
     * 删除文章
     */
    public function delArchive()
    {
        if(IS_AJAX){
            $id = $this->input->get('id');
            if(!$id){
                echo json_encode(array('code'=>1,'msg'=>'参数有误'));exit;
            }
            $data = array(
                'id' => $id,
                'isdel' => 1
            );
            $info = $this->cmsdb->getArchiveInfo(array('id'=>$id));
            if(!$info){
                echo json_encode(array('code'=>1,'msg'=>'文章不存在'));exit;
            }
            if($this->cmsdb->updateArchive($data)){
                $this->createAdminLog('删除文章：' . $info['title']);
                echo json_encode(array('code'=>0,'msg'=>'删除成功'));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'删除失败'));exit;
        }
    }

    /**
     * 修改文章
     */
    public function editArchive()
    {
        if(IS_AJAX){
            $id = $this->input->post('id');   //栏目ID
            if(!$id){
                echo json_encode(array('code'=>1,'msg'=>'参数错误'));exit;
            }
            $data['id'] = $id;
            $catid = $this->input->post('catid');   //栏目ID
            if(!$catid){
                echo json_encode(array('code'=>1,'msg'=>'栏目不能为空'));exit;
            }
            $data['catid'] = $catid;
            $title = $this->input->post('title');   //标题
            if(!$title){
                echo json_encode(array('code'=>1,'msg'=>'标题不能为空'));exit;
            }
            $data['title'] = $title;
            $data['thumb'] = $this->input->post('thumb');   //缩略图
//            $data['url'] = $this->input->post('url');       //URL
            $data['keywords'] = $this->input->post('keywords'); //关键字
            $data['description'] = $this->input->post('description');   //描述
            $content = $this->input->post('content');   //内容
            if(!$content){
                echo json_encode(array('code'=>1,'msg'=>'内容不能为空'));exit;
            }
            $data['content'] = $content;
            $data['views'] = $this->input->post('views');   //浏览量
//            $likes = $this->input->post('likes');   //点赞
//            $dislikes = $this->input->post('dislikes');   //点踩
            $data['listorder'] = $this->input->post('listorder');   //排序

            $data['isshow'] = $this->input->post('isshow');   //展示
            $publishtime = $this->input->post('publishtime');   //发布时间
            if($publishtime){
                $data['status'] = 1;
                $data['publishtime'] = time();
            }else{
                $data['status'] = 2;
            }
            $flag = $this->input->post('flag');   //标志
            if($flag){
                foreach ($flag as $f){
                    if($f == 'top'){
                        $data['top'] = 1;   //置顶
                    }elseif ($f == 'recommend'){
                        $data['recommend'] = 1;   //推荐
                    }
                }
            }
            $data['updatetime'] = time();
            $data['adminid'] = $this->session->userdata('id');
            if($this->cmsdb->updateArchive($data)){
                $goodsNews = array();
                $goods = $this->input->post('goods');
                if($goods){
                    foreach ($goods as $k2=>$v2){
                        $goodsNews[$k2]['goods_id'] = $v2;
                        $goodsNews[$k2]['news_id'] = $id;
                    }
                }
                $this->cmsdb->deleteGoodsNews(array('news_id'=>$id));
                $this->cmsdb->insertGoodsNews($goodsNews);
                $msg = '修改';
                $this->createAdminLog($msg.'文章：' . GetPartStr($data['title'],10));

                echo json_encode(array('code'=>0,'msg'=>$msg.'成功'));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'修改失败'));exit;
        }else{
            //获取文章信息
            $where = array(
                'id' => $this->input->get('id'),
                'isdel' => 0
            );
            $info = $this->cmsdb->getArchiveInfo($where);
            if(!$info){
                $data['msg'] = '文章不存在';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this->load->view('common/error', $data);
            }
            //获取栏目列表
            $list = $this->cmsdb->getChannelList();
            foreach ($list as $k => $v) {
                $list[$k]['id'] = $v['catid'];
            }
            $listTree = formatTreeLevel($list, 0);
            $listTree = array_multi2single($listTree);
            $this->load->vars('list',$listTree);
            //获取所有商品
            $this->load->model('Goodsmodel');
            $this->load->vars('goods_list',$this->Goodsmodel->getAllGoods());
            $this->load->view('cms/editArchive',$info);
        }
    }
}