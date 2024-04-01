<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad extends MY_Controller {

	private $addb;
	private $adspacedb;
	public function __construct() {
		parent::__construct();
		$this->load->model('Admodel');
		$this->addb =$this->Admodel;
		$this->load->model('AdSpacemodel');
		$this->adspacedb = $this->AdSpacemodel;
	}

	/**
     * 广告位置管理
     */
	public function space(){
		$data['order'] = "spaceid ASC";
		$data['limit'] = PAGESIZE;
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		$offset = ($page - 1) * PAGESIZE;
		$data['offset'] = $offset;
		$result = $this -> adspacedb -> spacelist($data);
		$this -> load -> library('Page');
		$pageObject = new Page($result['total'], PAGESIZE, $currentPage);
		$pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$pages = $pageObject -> show();
		$dataShow = array('pages' => $pages, 'datas' => $result['rows']);
		$this -> load -> view('ad/space', $dataShow);
	}

	/**
     * 改变广告位状态
     */
	public function disabledSpace(){
		if(IS_AJAX){
			$spaceid = $this->input->post('spaceid');
			$disabled = $this->input->post('disabled');
			//首先判断一下广告位是否存在
			$spaceInfo = $this->adspacedb->getSpaceById($spaceid);
			if(!empty($spaceInfo)){
				//改变广告位状态
				$updateData['spaceid'] = $spaceid;
				$updateData['disabled'] = $disabled;
				$result = $this->adspacedb->saveSpace($updateData);
				if($result){
                    if($disabled == 1){
                        $remark = '打开广告位：' . $spaceInfo['name'];
                    }else{
                        $remark = '关闭广告位：' . $spaceInfo['name'];
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
     * 保存广告位
     */
	public function saveSpace(){
		if(IS_POST){
			$saveData['spaceid'] = $this->input->post('spaceid');
			$saveData['name'] = $this->input->post('name');
			$saveData['width'] = $this->input->post('width');
			$saveData['height'] = $this->input->post('height');
			$saveData['description'] = $this->input->post('description');
			$result = $this->adspacedb->saveSpace($saveData);
			if($result){
			    if($saveData['spaceid']){
			        $remark = '修改广告位：'.$saveData['name'];
                }else{
                    $remark = '新增广告位：' . $saveData['name'];
                }
                $this->createAdminLog($remark);
				redirect('ad/space');
			}else{
				$data['msg'] = '保存广告位失败';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this -> load -> view('common/error', $data);
			}
		}
	}

	/**
     * 删除广告位
     */
	public function delSpace(){
		if(IS_AJAX){
			$spaceid = $this->input->post('spaceid');
			//首先判断一下该广告位下是否有广告
			$ads = $this->addb->getAdBySpaceid($spaceid);
			if(!empty($ads)){
				//不可以删除
				$data = array(
					'info' => 0,
					'tip' => '该广告位下有广告，不可删除！'
				);
			}else{
				$result = $this->adspacedb->delSpaceById($spaceid);
				if($result){
                    $this->createAdminLog('删除广告位：广告位ID'.$spaceid);
					$data = array(
						'info' => 1,
						'tip' => '操作成功'
					);
				}else{
					$data = array(
						'info' => 0,
						'tip' => '操作失败'
					);
				}
			}
			echo json_encode($data);
		}
	}

	/**
	 * 编辑广告位
	 */
	public function editSpace(){
		$spaceid = $this->input->get('spaceid');
		$spaceInfo = $this->adspacedb->getSpaceById($spaceid);
		if(!empty($spaceInfo)){
			$this->load->view('ad/spaceEdit',$spaceInfo);
		}else{
			$data['msg'] = '传递参数错误';
			$data['url'] = $_SERVER['HTTP_REFERER'];
			$this -> load -> view('common/error', $data);
		}
	}

	/**
	 * 添加广告位
	 */
	public function addSpace(){
		$this->load->view('ad/spaceAdd');
	}

	/**
     * 广告列表
     */
	public function ad(){
		$spaceid = $this->input->get('spaceid');
		if($spaceid){
            $spaceName = $this->adspacedb->getSpaceById($spaceid);
            if(isset($spaceName) && !empty($spaceName)){
                $this->load->vars('spaceid',$spaceid);
                $this->load->vars('spacename',$spaceName['name']);
            }
			$data['where'] = array('spaceid'=>$spaceid);
			$parameter = array('spaceid'=>$spaceid);
		}
		$data['order'] = "id ASC";
		$data['limit'] = PAGESIZE;
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		$offset = ($page - 1) * PAGESIZE;
		$data['offset'] = $offset;
		$result = $this->addb->adlist($data);
		foreach($result['rows'] as $k=>$v){
			$spaceInfo = $this->adspacedb->getSpaceById($v['spaceid']);
			$result['rows'][$k]['spacename'] = $spaceInfo['name'];
		}
		$this->load->library('Page');
		if(isset($parameter)){
			$pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
		}else{
			$pageObject = new Page($result['total'], PAGESIZE, $currentPage);
		}
		$pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$pages = $pageObject->show();
		$dataShow = array('pages' => $pages, 'datas' => $result['rows']);
		$this->load->view('ad/ad', $dataShow);
	}

	/**
     * 改变广告位状态
     */
	public function disabledAd(){
		if(IS_AJAX){
			$id = $this->input->post('id');
			$disabled = $this->input->post('disabled');
			//首先判断一下广告位是否存在
			$adInfo = $this->addb->getAdById($id);
			if(!empty($adInfo)){
				//改变广告位状态
				$updateData['id'] = $id;
				$updateData['disabled'] = $disabled;
				$result = $this->addb->saveAd($updateData);
				if($result){
                    if($disabled == 1){
                        $remark = '打开广告：' . $adInfo['name'];
                    }else{
                        $remark = '关闭广告：' . $adInfo['name'];
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
	 * 添加广告
	 */
	public function addAd(){
        //定位选项
        $spaceid = $this->input->get('spaceid');
        $this->load->vars('spaceid',$spaceid);
		//所有广告位
		$spaces = $this->adspacedb->getSpaceSelectShow();
		if(!empty($spaces)){
			$this->load->vars('spaces',$spaces);
			$this->load->view('ad/adAdd');
		}
	}

	/**
     * 编辑广告
     */
	public function editAd(){
		$id = $this->input->get('id');
		$adInfo = $this->addb->getAdById($id);
        if(!empty($adInfo)){
            $this->load->vars('adInfo',$adInfo);
			//所有广告位
			$spaces = $this->adspacedb->getSpaceSelectShow();
			if(!empty($spaces)){
				$this->load->vars('spaces',$spaces);
			}
			$setting = string2array($adInfo['setting']);
            $setting = json_decode($setting,true);
            if (!isset($setting['ad_code'])){
                $setting['ad_code']="";
            }
			//假如是图片类型，除去ad_code前的第一个.号
			if($adInfo['type'] == 0){
				//判断一下图片是否存在
				if(file_exists($this->config->item('ad_path').$setting['ad_code']) && !empty($setting['ad_code'])){
					$setting['show_ad_code'] = $this->config->item('ad_url').$setting['ad_code'];
				}
			}
			$adInfo['setting'] = $setting;
			$this->load->view('ad/adEdit',$adInfo);
		}else{
			$data['msg'] = '传递参数错误';
			$data['url'] = $_SERVER['HTTP_REFERER'];
			$this -> load -> view('common/error', $data);
		}
    }

	/**
     * 保存广告
     */
	public function saveAd(){
		if(IS_POST){
			$saveData['id'] = $this->input->post('id');
			$saveData['spaceid'] = intval($this->input->post('spaceid'));
			$saveData['name'] = $this->input->post('name');
			$saveData['startdate'] = strtotime($this->input->post('startdate'));
			$saveData['enddate'] = strtotime($this->input->post('enddate'));
			$saveData['type'] = $type = $this->input->post('type');
			$saveData['apptype'] = $apptype = $this->input->post('apptype');
			$saveData['description'] = $this->input->post('description');
            $saveData['description1'] = $this->input->post('description1');
            $saveData['description2'] = $this->input->post('description2');
            $saveData['description3'] = $this->input->post('description3');
            $saveData['description4'] = $this->input->post('description4');
            $saveData['price'] = $this->input->post('price');
			if($type == 0){//图片广告
				$ad_code = $this->input->post('ad_code_0');
				$ad_link = $this->input->post('ad_link');
				$setting = array(
					'ad_link'=>$ad_link,
					'ad_code'=>$ad_code
				);
			}elseif($type == 1){//文字广告
				$ad_code = $this->input->post('ad_code_1');
				$setting = array(
					'ad_link'=>'',
					'ad_code'=>$ad_code
				);
			}elseif ($type == 2){//链接广告
                $ad_link = $this->input->post('ad_link_1');
                $setting = array(
                    'ad_link'=>$ad_link,
                );
            }
			$saveData['setting'] = json_encode($setting);
			$result = $this->addb->saveAd($saveData);
			if($result){
                if($saveData['id']){
                    $remark = '修改广告：' . $saveData['name'];
                }else{
                    $remark = '新增广告：' . $saveData['name'];
                }
                $this->createAdminLog($remark);
				redirect('ad/ad?spaceid='.$saveData['spaceid']);
			}else{
				$data['msg'] = '保存广告失败';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this -> load -> view('common/error', $data);
			}
		}
	}

	/**
	 * 删除广告位
	 */
	public function delAd(){
		if(IS_AJAX){
			$id = $this->input->post('id');
			$result = $this->addb->delAdById($id);
			if($result){
                $this->createAdminLog('删除广告：广告ID'.$id);
				$data = array(
					'info' => 1,
					'tip' => '操作成功'
				);
			}else{
				$data = array(
					'info' => 0,
					'tip' => '操作失败'
				);
			}
			echo json_encode($data);
		}
	}
}
