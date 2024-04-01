<?php
//////////////////////////////////////////////////////////////////////
// 章爱军(永远的大牛)                                               //
// Trial License: For evaluation only!                              //
// (c) 2018, ZhangAijun, http://www.mydeershow.com                  //
//////////////////////////////////////////////////////////////////////
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}
	/*
	 * 网站上传功能
	 */
	public function doUpload(){
            $type = $this->input->get('type');
            if($type == 'ad'){//上传广告位控制处理
                $config['upload_path'] = $this->config->item('ad_path');
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = $this->config->item('ad_str')."_".time();//保存的文件名
            }elseif($type == 'thumb'){//上传文章缩略图
                $config['upload_path'] = $this->config->item('thumb_path');
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = 'thumb_'.time();//保存的文件名
            }elseif($type == 'logo'){//上传站点logo
                $config['upload_path'] = $this->config->item('logo_path');
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['overwrite'] = true;//同名允许覆盖
                $config['file_name'] = 'logo';//保存的文件名
            }elseif($type == 'brand'){//上传品牌缩略图
                $config['create_thumb'] = TRUE;
                $config['upload_path'] = $this->config->item('brand_path');
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = 'brand_'.time();//保存的文件名
            }elseif($type == 'brandofcarmodel'){ // 车型数据品牌图片上传配置
                $config['upload_path'] = $this->config->item('car_model_brand_path');
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
//                $config['overwrite'] = true;//同名允许覆盖
//                $config['file_name'] = 'logo';//保存的文件名
            }

            //实例化上传类，传入上面的配置数组
            $this->load->library('upload', $config);
            //这里判断是否上传成功
            if ($this->upload->do_upload('userfile')) {//file表单的name为userfile
                // 上传成功 获取上传文件信息
                $data = $this->upload->data();
                if($type == 'ad'){
                    $data['file_name_url'] = $this->config->item('ad_url').$data['file_name'];
                }elseif($type == 'thumb'){
                    $data['file_name_url'] = $this->config->item('thumb_url').$data['file_name'];
                }elseif($type == 'logo'){
                    $data['file_name_url'] = $this->config->item('logo_url').$data['file_name'];
                }elseif($type == 'brand'){
                    $data['file_name_url'] = $this->config->item('brand_url').$data['file_name'];
                }
                $tipData = array(
                    'info'=>1,
                    'tip'=>'上传成功',
                    'data'=>$data
                );
            } else {
                    $tipData = array(
                            'info'=>0,
                            'tip'=>$this->upload->display_errors()
                    );
            }
            echo json_encode($tipData);
	}
	/*
	 * 上传头像功能
	 */
	public function avatar(){
		$whoAvatar = $this->input->get('userid');
		$this->load->library('CropAvatar');
		$avatar_src = $this->input->post('avatar_src');
		$avatar_data = $this->input->post('avatar_data');
		//if($whoAvatar == 'admin'){//上传后台管理员头像
			$upload = $this->config->item('staff_avatar_path').$_SESSION['userid'].'/';
			$crop = new CropAvatar();
			$crop->setUploadPath($upload);
			$crop->setSrc($avatar_src);
			$crop->setData($avatar_data);
			$crop->setFile($_FILES['avatar_file']);
			$crop->crop();
			$response = array(
				'state'  => 200,
				'message' => $crop -> getMsg(),
				'result' => $this->config->item('staff_avatar_url').$_SESSION['userid'].'/avatar.png?'.random(6,'0123456789')
			);
			echo json_encode($response);
	//	}
	}
}
