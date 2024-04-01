<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public $adminlog;

	public function __construct()
	{
		parent::__construct();
        $this->master=$this -> load -> database('master',true);
        $this->slave=$this -> load -> database('slave',true);
		date_default_timezone_set('Asia/Shanghai');
		$this->load->helper('url');//加载URL 辅助函数
		$this->load->helper('function');//加载自定义辅助函数
		$this->load->helper('self');//加载自定义辅助函数
		$this->load->config('system');//加载系统配置文件
        $this->load->model('Logmodel');
        $this->adminlog = $this->Logmodel;
        define('STATIC_PATH', $this->config->item('static_path'));
		define('PAGESIZE',$this->config->item('pagesize'));
		define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
		define("IS_POST", strtolower($_SERVER['REQUEST_METHOD']) == 'post');

		$this->load->library('session');//初始化session类

		self::check_login();//验证是否登陆
		self::check_auth();//验证权限
		self::menu();//左侧菜单
	}

	//判断用户是否登陆函数
	final public function check_login()
	{
		$route_url = $this->uri->uri_string();
		if (($route_url == 'index/login') || ($route_url == 'index/getVerify')) {
			return true;
		} else {
			if (!$this->session->has_userdata('id') && !$this->session->has_userdata('account') && !$this->session->has_userdata('roleid')) {
				redirect('index/login');
			}
		}
	}

	//验证权限
	final public function check_auth()
	{
		//控制器
		$c_route = $this->uri->segment(1);
		//方法
		$a_route = $this->uri->segment(2);

		//查看一下访问的url是否在权限节点表中
		$this->load->model('AdminPrivmodel');
		$AdminPriv = new AdminPrivmodel();
		$selectData['c'] = $c_route;
		$selectData['a'] = $a_route;
		$PrivInfo = $AdminPriv->getPrivByca($selectData);
		if (!empty($PrivInfo)) {
			//这个路由节点别限制了，查看该用户是否有权限
			$this->load->model('AdminRolePrivmodel');
			$AdminRolePriv = new AdminRolePrivmodel();
			$RolePrivs = $AdminRolePriv->getRolePrivByPrivid($PrivInfo['privid']);
			if (!empty($RolePrivs)) {
				$roleids = array();
				foreach ($RolePrivs as $v) {
					$roleids[] = $v['roleid'];
				}
				if (!in_array($this->session->userdata['roleid'], $roleids)) {
					$data['msg'] = '没有权限,请联系系统管理员!';
					$data['forward'] = 'index/home';
					$data['ststic_path'] = base_url() . 'static';
					$data['url'] = site_url($data['forward']);
					$this->load->view('common/error', $data);
					exit;
				}
			}
		}
		return true;
	}

	//权限菜单menu
	final public function menu(){
		//当前管理员头像
		if(file_exists($this->config->item('admin_avatar_path').$this->session->userdata('id').'/avatar.png')){
			$adminAvatar = $this->config->item('admin_avatar_url').$this->session->userdata('id').'/avatar.png';
		}else{
			$adminAvatar = STATIC_PATH.'dist/img/nophoto.gif';
		}
		$this->load->vars('adminAvatar', $adminAvatar);
		//当前管理员的权限节点
		$this->load->model('AdminRolePrivmodel');
		$AdminRolePriv = new AdminRolePrivmodel();
		$RolePrivs = $AdminRolePriv->getRolePrivByRoleid($this->session->userdata('roleid'));
		if (!empty($RolePrivs)) {
			$privids = array();
			foreach ($RolePrivs as $v) {
				$privids[] = $v['privid'];
			}
			$this->load->model('AdminPrivmodel');
			$AdminPriv = new AdminPrivmodel();
			$AdminPrivList = $AdminPriv->getPrivByPrivids($privids);
			foreach ($AdminPrivList as $k => $v) {
				$AdminPrivList[$k]['id'] = $v['privid'];
				if(!empty($v['data'])){
					$AdminPrivList[$k]['url'] = site_url($v['c'] . '/' . $v['a']).'?'.$v['data'];
				}else{
					$AdminPrivList[$k]['url'] = site_url($v['c'] . '/' . $v['a']);
				}
			}
			$menu = formatTree($AdminPrivList, 0);
//			dump($menu);exit;
			$this->load->vars('menu', $menu);
		}
	}

    /*
    * 生成下载excel文件
    * $filename="生成的excel名称";
    * $headArr=array("表头","名称");
    * $data 要显示的数据
    * 	array(array('username'=>1,'pwd'=>2),array(...)..);
    * 调用方法：
    * 	$this->getExcel($filename,$headArr,$data);
    *
    */
    public function getExcel($fileName, $headArr = array(), $data = array(array())) {
        date_default_timezone_set('Asia/Shanghai');
        //对数据进行检验
        if (empty($data) || !is_array($data)) {
            die("data must be a array");
        }
        //检查文件名
        if (empty($fileName)) {
            exit;
        }

        $date = date("Ymd", time());
        $fileName .= "_{$date}.xls";



        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

        //创建PHPExcel对象
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach ($headArr as $v) {
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            $key += 1;
        }


        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach ($data as $key => $rows) { //行写入
            $span = ord("A");
            foreach ($rows as $keyName => $value) { // 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j . $column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表

        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;

    }

    /**
     * 创建管理员日志
     * @param $remark
     */
    protected function createAdminLog($remark)
    {
        $log = array(
            'uid' => $this->session->userdata('id'),
            'url' => $this->router->fetch_class()  .'/'.$this->router->fetch_method(),
            'remark' => $remark,
            'ip' => get_client_ip()
        );
        $this->adminlog->addLog($log);
    }



}