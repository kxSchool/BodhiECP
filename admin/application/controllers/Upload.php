<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller {
    private $eventdb;
    private $showdb;
    private $pricedb;
    private $sectiondb;
    private $mapdb;
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
            }elseif($type == 'show'){//上传海报
                $config['upload_path'] = $this->config->item('show_path');
                $config['create_thumb'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] ='show_'.time();//保存的文件名
            }elseif($type == 'venue'){//上传海报
                $config['upload_path'] = $this->config->item('venue_path');
                $config['create_thumb'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] ='venue_'.time();//保存的文件名
            }elseif($type == 'brand'){//上传品牌缩略图
                $config['upload_path'] = $this->config->item('brand_path');
                $config['create_thumb'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = 'brand_'.time();//保存的文件名
            }elseif($type == 'map_background'){//上传选座背景图
                $config['upload_path'] = $this->config->item('mapBackground_path');
                $config['create_thumb'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = 'mapBackground_'.time();//保存的文件名
            }elseif($type == 'map_mini'){//上传选座缩略图
                $config['upload_path'] = $this->config->item('mapMini_path');
                $config['create_thumb'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = 'mapMini_'.time();//保存的文件名
            }elseif($type == 'panorama'){//上传选座缩略图
                $section_id=$this->input->get("section_id");
                $this->load->model('Sectionmodel');
                $section= $this->Sectionmodel->getSectionById($section_id);
                $map_id=$section['map_id'];
                $config['upload_path'] = $this->config->item('panorama_path').$map_id."/".$section_id."/";
                is_dir($config['upload_path']) OR mkdir($config['upload_path'], 0777, true);
                $config['create_thumb'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = 'panorama_'.time();//保存的文件名
            }elseif($type == 'goods'){//上传商品图片
                $config['upload_path'] = $this->config->item('goods_images_path');
                $config['create_thumb'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 6 * 1024 * 1024;
                $config['file_name'] = 'goods_'.time() .random(2);//保存的文件名
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
            }elseif($type == 'show'){
                $data['file_name_url'] = $this->config->item('show_url').$data['file_name'];
            }elseif($type == 'venue'){
                $data['file_name_url'] = $this->config->item('venue_url').$data['file_name'];
            }elseif($type == 'map_background'){
                $data['file_name_url'] = $this->config->item('mapBackground_url').$data['file_name'];
            }elseif($type == 'map_mini'){
                $data['file_name_url'] = $this->config->item('mapMini_url').$data['file_name'];
            }elseif($type == 'goods'){
                $data['file_name_url'] = $this->config->item('goods_images_url').$data['file_name'];
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
		$whoAvatar = $this->input->get('whoAvatar');
		$this->load->library('CropAvatar');
		$avatar_src = $this->input->post('avatar_src');
		$avatar_data = $this->input->post('avatar_data');
		if($whoAvatar == 'admin'){//上传后台管理员头像
			$upload = $this->config->item('admin_avatar_path').$this->session->userdata('id').'/';
			$crop = new CropAvatar();
			$crop->setUploadPath($upload);
			$crop->setSrc($avatar_src);
			$crop->setData($avatar_data);
			$crop->setFile($_FILES['avatar_file']);
			$crop->crop();
			$response = array(
				'state'  => 200,
				'message' => $crop -> getMsg(),
				'result' => $this->config->item('admin_avatar_url').$this->session->userdata('id').'/avatar.png?'.random(6,'0123456789')
			);
			echo json_encode($response);
		}
	}

	//富文本编辑器上传
    public function editUpload()
    {

        $config['upload_path'] = $this->config->item('goods_details_path');
        $config['create_thumb'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 10 * 1024 * 1024;
        $config['file_name'] = 'goods_'.time() .random(2);//保存的文件名
        //实例化上传类，传入上面的配置数组
        $this->load->library('upload', $config);
        //这里判断是否上传成功
        if ($this->upload->do_upload('userfile')) {//file表单的name为userfile
            // 上传成功 获取上传文件信息
            $data = $this->upload->data();

            $data['file_name_url'] = $this->config->item('goods_details_url').$data['file_name'];

            $tipData = array(
                'errno'=> 0,
                'data'=>array($data['file_name_url'])
            );
        } else {
            $tipData = array(
                'errno'=> 1,
                'data'=>$this->upload->display_errors()
            );
        }
        echo json_encode($tipData);
    }
}
