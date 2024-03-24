<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller
{

    private $goodsdb;
    private $categorydb;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Goodsmodel');
        $this->load->model('Category');
        $this->goodsdb = $this->Goodsmodel;
        $this->categorydb = $this->Category;
    }

    /**
     * 商品列表
     */
    public function index()
    {

        if ($this->input->post('dosearch')) {
            $searchtype = $this->input->post('searchtype');
            $searchtext = trim($this->input->post('searchtext'));
        } else {
            $searchtype = $this->input->get('searchtype');
            $searchtext = trim($this->input->get('searchtext'));
        }
        $parameter = array();
        $data['where'] = array();
        if (!empty($searchtext)) {//如果搜索内容不为空
            switch ($searchtype) {
                case 1://按照账号搜索
                    $data['like'] = array('all_name' => $searchtext);
                    break;
            }
            $this->load->vars('searchtype', $searchtype);
            $this->load->vars('searchtext', $searchtext);
            $parameter['searchtype'] = $searchtype;
            $parameter['searchtext'] = $searchtext;
        }

        //买家用户
        $data['order'] = "id";
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;
        $result = $this->goodsdb->goodsList($data);
        $this->load->library('Page');
        $pageObject = new Page($result['total'], PAGESIZE, $currentPage, $parameter);
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this->load->view('goods/list', $dataShow);
    }

    /**
     * 添加商品
     */
    public function addGoods()
    {

        if (IS_POST) {
            //判断是否区分地区
            if ($this->input->post('is_region') == 'on') {
                $data['price'] = json_decode($this->input->post('price'), true);
            } else {
                $data['price'] = $this->input->post('price');
            }
            //判断需要关联服务
            if ($this->input->post('isEx') == 'on') {
                $data['ex_list'] = json_decode($this->input->post('servers'), true);
            }

            $data['all_name'] = $this->input->post('name');
            $data['category1'] = $this->input->post('category_f');
            $data['category2'] = $this->input->post('category_s');
            $data['category3'] = $this->input->post('category_t');
            $data['content'] = $this->input->post('m_detail');
            $data['content_pc'] = $this->input->post('pc_detail');
            $data['pc_images'] = $this->input->post('pc_images');
            $data['m_images'] = $this->input->post('m_images');
            $data['progress_id'] = $this->input->post('progress');
            $data['seo_description'] = $this->input->post('seo_description');
            $data['seo_keywords'] = $this->input->post('seo_keywords');

            //添加商品
            if ($this->goodsdb->addGoods($data)) {
                $this->createAdminLog('添加商品：' . $data['all_name']);
                $data['msg'] = '添加成功';
                $data['url'] = site_url('goods/index');
                $this->load->view('common/success', $data);
            } else {
                $data['msg'] = '添加失败';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this->load->view('common/error', $data);
            }

        } else {
            //获取一级分类
            $category_f = $this->categorydb->topCate();
            $this->load->vars('cate_f', $category_f);
            //获取二级分类
            $category_s = $this->categorydb->getCateByPid($category_f[0]['cat_id']);
            $this->load->vars('cate_s', $category_s);
            //获取三级分类
            $category_t = $this->categorydb->getCateByPid($category_s[0]['cat_id']);
            $this->load->vars('cate_t', $category_t);
            //获取默认省市区
            $this->load->model('Region');
            $province = $this->Region->allProvince();
            $city = $this->Region->getAreaByPid($province[0]['region_id']);
            $area = $this->Region->getAreaByPid($city[0]['region_id']);
            $this->load->vars('province', $province);
            $this->load->vars('city', $city);
            $this->load->vars('area', $area);
            //获取所有商品进度
            $progress_list = $this->goodsdb->getProgressList();
            $this->load->vars('progress_list', $progress_list);
            //获取所有商品
            $goods_list = $this->goodsdb->allGoods();
            $this->load->vars('goods_list', $goods_list);
            $this->load->view('goods/addGoods');
        }
    }

    /**
     * 修改商品
     */
    public function edit()
    {
        if (IS_POST) {

            $module = $this->input->post('module');
            $goods_info = $this->goodsdb->getGoodsInfo($this->input->post('goods_id'));
            if(!$goods_info){
                $data['msg'] = '参数错误';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this->load->view('common/error', $data);
            }

            if ($module == 'base') {
                if ($this->goodsdb->saveBaseGoodsInfo($this->input->post())) {
                    $this->createAdminLog('修改商品基本信息：商品ID' . $this->input->post('goods_id'));

                    $data['msg'] = '修改成功';
                    $data['url'] = site_url('goods/index');
                    $this->load->view('common/success', $data);
                } else {
                    $data['msg'] = '修改失败';
                    $data['url'] = $_SERVER['HTTP_REFERER'];
                    $this->load->view('common/error', $data);
                }

            } elseif ($module == 'price') {

                $goods_id = $this->input->post('goods_id');
                //判断是否区分地区
                if ($this->input->post('isPrice')) {  //区分地区
                    $data = json_decode($this->input->post('price'), true);
                    foreach ($data as $key => $value) {
                        $data[$key]['goods_id'] = $goods_id;
                    }
                } else {  //不区分地区
                    $data[0]['region_id'] = 0;
                    $data[0]['totalprice'] = intval($this->input->post('simple_price'));
                    $data[0]['goods_id'] = $goods_id;
                }

                if ($this->goodsdb->savePriceGoodsInfo($data, $goods_id)) {
                    $this->createAdminLog('修改商品价格：商品ID' . $goods_id);
                    $data['msg'] = '修改成功';
                    $data['url'] = site_url('goods/index');
                    $this->load->view('common/success', $data);
                } else {
                    $data['msg'] = '修改失败';
                    $data['url'] = $_SERVER['HTTP_REFERER'];
                    $this->load->view('common/error', $data);
                }

            } elseif ($module == 'exSer') {

                $data['goods_id'] = $this->input->post('goods_id');

                //判断是否关联服务
                if (!$this->input->post('isCheck')) {  //不关联
                    $res = $this->goodsdb->delExGoods($data['goods_id']);
                } else {
                    $servers = json_decode($this->input->post('servers'), true);
                    foreach ($servers as $itemid => $item) {
                        $servers[$itemid]['goods_id'] = $data['goods_id'];
                        foreach ($item['param'] as $k => $v) {
                            if ($v['id'] == 0) {
                                $servers[$itemid]['param'][$k]['default'] = 1;
                            }
                        }
                    }
                    $data['servers'] = $servers;
                    $res = $this->goodsdb->saveExGoodsInfo($data);
                }
                if ($res) {
                    $this->createAdminLog('修改商品关联服务：商品ID' . $data['goods_id']);
                    $data['msg'] = '修改成功';
                    $data['url'] = site_url('goods/index');
                    $this->load->view('common/success', $data);
                } else {
                    $data['msg'] = '修改失败';
                    $data['url'] = $_SERVER['HTTP_REFERER'];
                    $this->load->view('common/error', $data);
                }
            }

        } else {

            if (!$this->input->get('id')) {
                $data['msg'] = '参数错误';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this->load->view('common/error', $data);
            }
            $goods_id = $this->input->get('id');    //商品ID
            $this->load->vars('goods_id', $goods_id);
            //获取商品信息
            $goods_info = $this->goodsdb->getGoodsInfo($goods_id);
            if (empty($goods_info)) {
                $data['msg'] = '商品不存在';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this->load->view('common/error', $data);
            }
            $module = $this->input->get('module');
            if ($module == 'base' || empty($module)) {

                $goods_info['pic'] = $this->goodsdb->getGoodsPic($goods_id);
                $this->load->vars('goods_info', $goods_info);
                //获取一级分类
                $category_f = $this->categorydb->topCate();
                $this->load->vars('cate_f', $category_f);
                //获取二级分类
                $category_s = $this->categorydb->getCateByPid($goods_info['category1']);
                $this->load->vars('cate_s', $category_s);
                //获取三级分类
                $category_t = $this->categorydb->getCateByPid($goods_info['category2']);
                $this->load->vars('cate_t', $category_t);

                //获取所有商品进度
                $progress_list = $this->goodsdb->getProgressList();
                $this->load->vars('progress_list', $progress_list);

                $this->load->view('goods/editBase');

            } elseif ($module == 'price') {
                $this->load->model('Region');

                //获取省市区信息
                $province = $this->Region->allProvince();
                $this->load->vars('province', $province);

                if ($goods_info['is_region']) {
                    //设置价格
                    $region_price = $this->goodsdb->getGoodsAllPrice($goods_id);
                    foreach ($region_price as $k => $v) {
                        $region_price[$k]['city_list'] = $this->Region->getAreaByPid($v['province']);
                        $region_price[$k]['area_list'] = $this->Region->getAreaByPid($v['city']);
                    }
                    $this->load->vars('region_price', $region_price);
                } else {
                    //设置价格
                    $this->load->vars('price_info', $this->goodsdb->getGoodsPrice($goods_id));
                    //获取市区信息
                    $city = $this->Region->getAreaByPid($province[0]['region_id']);
                    $area = $this->Region->getAreaByPid($city[0]['region_id']);
                    $this->load->vars('city', $city);
                    $this->load->vars('area', $area);
                }
                $this->load->vars('goods_info', $goods_info);
                $this->load->view('goods/editPrice');

            } elseif ($module == 'exSer') {
                $goods_list = $this->goodsdb->allGoods();
                $this->load->vars('goods_list', $goods_list);
                $goods_info['exSer'] = $this->goodsdb->getGoodsEx($goods_id);
                $this->load->vars('goods_info', $goods_info);
                $this->load->view('goods/editExServer');
            }
        }
    }

    /**
     * 批量删除商品
     */
    public function deleteBatch()
    {
        if (IS_AJAX) {
            if (!$this->input->post('data')) {
                echo json_encode(array('code' => 1, 'msg' => '参数错误'));
                exit;
            }
            $goods_arr = json_decode($this->input->post('data'), true);
            if (!$this->goodsdb->deleteBatch($goods_arr)) {
                echo json_encode(array('code' => 1, 'msg' => '删除失败'));
                exit;
            }
            echo json_encode(array('code' => 0, 'msg' => '删除成功'));
            exit;

        }
    }

    /**
     * 删除商品
     */
    public function delGoods()
    {
        if (IS_AJAX) {
            if (!$this->input->get('id')) {
                echo json_encode(array('code' => 1, 'msg' => '参数错误'));
                exit;
            }

            $goods_id = $this->input->get('id');

            $goods_info = $this->goodsdb->getGoodsInfo($goods_id);
            if(!$goods_info){
                echo json_encode(array('code' => 1, 'msg' => '商品不存在'));
                exit;
            }

            $updateData = array(
                'id' => $goods_id,
                'is_del' => 1,
                'status' => 0
            );
            if (!$this->goodsdb->saveGoodsStatus($updateData)) {
                echo json_encode(array('code' => 1, 'msg' => '删除失败'));
                exit;
            }
            $this->createAdminLog('删除商品：商品ID' . $goods_id);
            echo json_encode(array('code' => 0, 'msg' => '删除成功'));
            exit;
        }
    }

    /**
     * 分类列表
     */
    public function cateList()
    {
        $cate_list = $this->categorydb->getAllCategory();
        foreach ($cate_list as $k => $v) {
            $cate_list[$k]['id'] = $v['cat_id'];
            $cate_list[$k]['parentid'] = $v['cat_pid'];
        }
        $cateTree = formatTreeLevel($cate_list, 0);
        $cateTree = array_multi2single($cateTree);

        $this->load->vars('showpriv', $cateTree);
        $this->load->view('goods/catelist');
    }

    /**
     * 删除分类
     */
    public function delCate()
    {
        if (IS_AJAX) {
            $cat_id = $this->input->post('id');
            $info = $this->categorydb->getCateInfo($cat_id);
            if(!$info){
                echo json_encode(array('code' => 1, 'msg' => '删除失败'));
                exit;
            }
            if ($this->categorydb->delCate($cat_id)) {
                $this->createAdminLog('删除分类：' . $info['cat_name']);
                echo json_encode(array('code' => 0, 'msg' => '删除成功'));exit;
            }
            echo json_encode(array('code' => 1, 'msg' => '删除失败'));
            exit;
        }
    }

    /**
     * 修改热门状态
     */
    public function changeCate()
    {
        if (IS_AJAX) {
            $id = $this->input->post('id');
            $field = $this->input->post('type');
            if ($this->categorydb->changeCate($id, $field)) {
                $this->createAdminLog('修改分类状态：' . $id);
                echo json_encode(array('code' => 0));exit;
            }
            echo json_encode(array('code' => 1));exit;
        }
    }

    /**
     * 修改分类
     */
    public function editCate()
    {
        if (IS_POST) {
            $data = $this->input->post();
            $info['cat_id'] = $data['id'];
            $info['cat_name'] = $data['name'];
            $info['cat_pid'] = $data['parentid'];
            $info['is_show'] = 0;
            $info['is_hot'] = 0;
            if (isset($data['is_show'])) {
                $info['is_show'] = 1;
            }
            if (isset($data['is_hot'])) {
                $info['is_hot'] = 1;
            }
            $info['cat_desc'] = $data['sort'];
            if ($this->categorydb->editCate($info)) {
                $this->createAdminLog('修改分类信息：' . $info['cat_id']);
                $data['msg'] = '修改成功';
                $data['url'] = site_url('goods/cateList');
                $this->load->view('common/success', $data);
            } else {
                $data['msg'] = '修改失败';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this->load->view('common/error', $data);
            }
        } else {

            //获取所有分类
            $cate_list = $this->categorydb->getAllCategory();
            foreach ($cate_list as $k => $v) {
                $cate_list[$k]['id'] = $v['cat_id'];
                $cate_list[$k]['parentid'] = $v['cat_pid'];
            }
            $cateTree = formatTreeLevel($cate_list, 0);
            $cateTree = array_multi2single($cateTree);
            $this->load->vars('cateTree', $cateTree);

            $id = $this->input->get('id');
            $this->load->vars('info', $this->categorydb->getCateInfo($id));
            $this->load->view('goods/editCate');
        }
    }

    /**
     * 添加分类
     */
    public function addCate()
    {
        if (IS_POST) {
            $data = $this->input->post();
            $info['cat_name'] = $data['name'];
            $info['cat_pid'] = $data['parentid'];
            $info['is_show'] = 0;
            $info['is_hot'] = 0;
            if (isset($data['is_show'])) {
                $info['is_show'] = 1;
            }
            if (isset($data['is_hot'])) {
                $info['is_hot'] = 1;
            }
            $info['cat_desc'] = $data['sort'];
            if ($this->categorydb->addCate($info)) {
                $this->createAdminLog('新增分类：' . $info['cat_name']);
                $data['msg'] = '添加成功';
                $data['url'] = site_url('goods/cateList');
                $this->load->view('common/success', $data);
            } else {
                $data['msg'] = '修改失败';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this->load->view('common/error', $data);
            }
        } else {
            //获取所有分类
            $cate_list = $this->categorydb->getAllCategory();
            foreach ($cate_list as $k => $v) {
                $cate_list[$k]['id'] = $v['cat_id'];
                $cate_list[$k]['parentid'] = $v['cat_pid'];
            }
            $cateTree = formatTreeLevel($cate_list, 0);
            $cateTree = array_multi2single($cateTree);
            $this->load->vars('cateTree', $cateTree);

            $this->load->view('goods/addCate');
        }
    }

    /**
     * 商品进度列表
     */
    public function progress()
    {
        $data['order'] = "id ASC";
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;
        $result = $this -> goodsdb -> progressList($data);
        $this -> load -> library('Page');
        $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        $pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject -> show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this -> load -> view('goods/progress', $dataShow);
    }

    /**
     * 切换进度类状态
     */
    public function disabledPro()
    {
        if(IS_AJAX){
            $proid = $this->input->post('proid');
            $disabled = $this->input->post('disabled');
            //首先判断一下进度是否存在
            $proInfo = $this->goodsdb->getProgressById($proid);
            if(!empty($proInfo)){
                //改变广告位状态
                $updateData['id'] = $proid;
                $updateData['disabled'] = $disabled;
                $result = $this->goodsdb->saveProgress($updateData);
                if($result){
                    if($disabled == 1){
                        $remark = '开启进度类：进度类ID：' . $proid;
                    }else{
                        $remark = '关闭进度类：进度类ID：' . $proid;
                    }
                    $this->createAdminLog($remark);
                    $data = array(
                        'info' => 1,
                        'tip' => '更新成功'
                    );
                }else{
                    $data = array(
                        'info' => 0,
                        'tip' => '更新失败'
                    );
                }
            }else{
                $data = array(
                    'info' => 0,
                    'tip' => '传递参数错误'
                );
            }
            echo json_encode($data);
        }
    }

    /**
     * 添加进度大类
     */
    public function addProgress()
    {
        $this->load->view('goods/progressAdd');
    }

    /**
     * 保存进度类
     */
    public function saveProgress(){
        if(IS_POST){
            $saveData['id'] = $this->input->post('id');
            $saveData['title'] = $this->input->post('title');
            $saveData['disabled'] = 0;
            if($this->input->post('disabled')){
                $saveData['disabled'] = 1;
            }
            $saveData['description'] = $this->input->post('description');
            $result = $this->goodsdb->saveProgress($saveData);
            if($result){
                if($saveData['id']){
                    $remark = '修改进度类：进度类ID：' . $saveData['id'];
                }else{
                    $remark = '添加进度类：进度类ID：' . $result;
                }
                $this->createAdminLog($remark);
                redirect('goods/progress');
            }else{
                $data['msg'] = '保存进度类失败';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this -> load -> view('common/error', $data);
            }
        }
    }

    /**
     * 编辑进度类
     */
    public function editProgress()
    {
        $id = $this->input->get('id');
        $progressInfo = $this->goodsdb->getProgressById($id);
        if(!empty($progressInfo)){
            $this->load->view('goods/progressEdit',$progressInfo);
        }else{
            $data['msg'] = '传递参数错误';
            $data['url'] = $_SERVER['HTTP_REFERER'];
            $this -> load -> view('common/error', $data);
        }
    }

    /**
     * 进度类列表
     */
    public function progressList(){
        $id = $this->input->get('id');
        if($id){
            $progressInfo = $this->goodsdb->getProgressById($id);
            if(isset($progressInfo) && !empty($progressInfo)){
                $this->load->vars('id',$id);
                $this->load->vars('title',$progressInfo['title']);
            }
            $data['where'] = array('pid'=>$id);
            $parameter = array('id'=>$id);
            $data['order'] = "id ASC";
            $data['limit'] = PAGESIZE;
            $page = $this->input->get('page');
            $currentPage = $page = isset($page) ? intval($page) : 1;
            $offset = ($page - 1) * PAGESIZE;
            $data['offset'] = $offset;
            $result = $this->goodsdb->progressChildList($data);
            $this->load->library('Page');
            if(isset($parameter)){
                $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
            }else{
                $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
            }
            $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $pages = $pageObject->show();
            $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
            $this->load->view('goods/progressList', $dataShow);
        }else{
            $data['msg'] = '传递参数错误';
            $data['url'] = $_SERVER['HTTP_REFERER'];
            $this -> load -> view('common/error', $data);
        }

    }

    /**
     * 切换进度状态
     */
    public function disabledProChild()
    {
        if(IS_AJAX){
            $id = $this->input->post('id');
            $disabled = $this->input->post('disabled');
            //首先判断一下进度是否存在
            $info = $this->goodsdb->getProChildById($id);
            if(!empty($info)){
                //改变广告位状态
                $updateData['id'] = $id;
                $updateData['disabled'] = $disabled;
                $result = $this->goodsdb->saveProChild($updateData);
                if($result){
                    if($disabled == 1){
                        $remark = '开启进度：进度ID';
                    }else{
                        $remark = '关闭进度：进度ID';
                    }
                    $this->createAdminLog($remark.$id);
                    $data = array(
                        'info' => 1,
                        'tip' => '更新成功'
                    );
                }else{
                    $data = array(
                        'info' => 0,
                        'tip' => '更新失败'
                    );
                }
            }else{
                $data = array(
                    'info' => 0,
                    'tip' => '传递参数错误'
                );
            }
            echo json_encode($data);
        }
    }

    /**
     * 添加进度
     */
    public function addProChild()
    {
        $pid = $this->input->get('id');
        if(!$pid){
            $data['msg'] = '传递参数错误';
            $data['url'] = $_SERVER['HTTP_REFERER'];
            $this -> load -> view('common/error', $data);
        }
        $this->load->vars('pid',$pid);
        $this->load->view('goods/proChildAdd');
    }

    /**
     * 保存进度信息
     */
    public function saveProChild()
    {
        if(IS_POST){
            $saveData['id'] = $this->input->post('id');
            $saveData['title'] = $this->input->post('title');
            $saveData['disabled'] = 0;
            if($this->input->post('disabled')){
                $saveData['disabled'] = 1;
            }
            $saveData['description'] = $this->input->post('description');
            $saveData['sort'] = $this->input->post('sort');
            $saveData['pid'] = $this->input->post('pid');
            $result = $this->goodsdb->saveProChild($saveData);
            if($result){
                if($saveData['id']){
                    $remark = '修改进度：进度ID：' . $saveData['id'];
                }else{
                    $remark = '添加进度：进度ID：' . $result;
                }
                $this->createAdminLog($remark);
                redirect('goods/progressList?id='.$this->input->post('pid'));
            }else{
                $data['msg'] = '添加失败';
                $data['url'] = $_SERVER['HTTP_REFERER'];
                $this -> load -> view('common/error', $data);
            }
        }
    }

    /**
     * 修改进度信息
     */
    public function editProChild()
    {
        $id = $this->input->get('id');
        $info = $this->goodsdb->getProChildById($id);
        if(!empty($info)){
            $this->load->view('goods/proChildEdit',$info);
        }else{
            $data['msg'] = '传递参数错误';
            $data['url'] = $_SERVER['HTTP_REFERER'];
            $this -> load -> view('common/error', $data);
        }
    }

    /**
     * ajax切换商品状态
     */
    public function changeGoodsStatus()
    {
        if(IS_AJAX){
            $goods_id = $this->input->post('goods_id');
            $disabled = $this->input->post('disabled');
            //首先判断一下进度是否存在
            $goods_info = $this->goodsdb->getGoodsInfo($goods_id);

            if($goods_info){
                //改变商品状态
                $updateData['id'] = $goods_id;
                $updateData['status'] = $disabled;
                $result = $this->goodsdb->saveGoodsStatus($updateData);
                if($result){
                    if($disabled == 1){
                        $remark = '启用商品：'.$goods_info['all_name'];
                    }else{
                        $remark = '关闭商品：'.$goods_info['all_name'];
                    }
                    $this->createAdminLog($remark);
                    $data = array(
                        'info' => 1,
                        'tip' => '更新成功'
                    );
                }else{
                    $data = array(
                        'info' => 0,
                        'tip' => '更新失败'
                    );
                }
            }else{
                $data = array(
                    'info' => 0,
                    'tip' => '传递参数错误'
                );
            }
            echo json_encode($data);
        }
    }

    /**
     * ajax根据ID获取子分类
     */
    public function ajaxGetCateByPid()
    {
        if (IS_AJAX) {
            $type = $this->input->post('type');
            $cat_id = $this->input->post('cat_id');
            $data['cate'] = $this->categorydb->getCateByPid($cat_id);
            if ($type == 'f') {
                $data['child_cate'] = $this->categorydb->getCateByPid($data['cate'][0]['cat_id']);
            }
            echo json_encode(array('code' => 1, 'mes' => 'success', 'data' => $data));
        }
    }
}
