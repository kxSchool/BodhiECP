<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends MY_Controller {

	private $logdb;

	public function __construct() {
		parent::__construct();
		$this -> load -> model('Logmodel');
		$this -> logdb = new Logmodel();
	}

	public function manage()
    {
		$pagesize = PAGESIZE;
		$where = '1';
		if ($this -> input -> post('dosubmit')) {
			//是搜索过来的
			$log_table = $this -> input -> post('log_table');
			if (!empty($log_table)) {
				$data['log_table'] = $log_table;
			} else {
				$log_table = 0;
				$data['log_table'] = '';
			}

			$user_id = $this -> input -> post('user_id');
			if (!empty($user_id)) {
				$where .= " and log.uid = " . $user_id;
			} else {
				$user_id = 0;
			}
		} else {
			//通过URL直接传递过来的
			$log_table = $this->input->get('log_table');
			if (!empty($log_table)) {
				$data['log_table'] = $log_table;
			} else {
				$log_table = 0;
				$data['log_table'] = '';
			}
			$user_id = $this->input->get('user_id');
			if (!empty($user_id)) {
				$where .= " and log.uid = " . $user_id;
			} else {
				$user_id = 0;
			}
		}
		$parameter = array('log_table' => $log_table, 'user_id' => $user_id);
		$data['where'] = $where;
		$data['order'] = "id DESC";
		$data['limit'] = $pagesize;
		//一次读取多少数据
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		//当前的分页
		$offset = ($page - 1) * $pagesize;
		//从第几条读取数据
		$data['offset'] = $offset;
		$result = $this -> logdb -> loglist($data);
		$tables = $this -> logdb -> t_table();
		$managers = $this -> logdb -> manager();
		if ($result) {
			$this -> load -> library('Page');
			$pageObject = new Page($result['total'], $pagesize, $currentPage, $parameter);
			$pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
			$pages = $pageObject -> show();
			$dataShow = array('pages' => $pages, 'datas' => $result['rows'], 'tables' => $tables, 'managers' => $managers, 'log_table' => $log_table, 'user_id' => $user_id);
		} else {
			$dataShow = array('tables' => $tables, 'managers' => $managers, 'log_table' => $log_table, 'user_id' => $user_id);
		}
		$this -> load -> view('log/index', $dataShow);
	}

    /**
     * 批量删除操作日志
     */
	public function batchDelLog()
    {
		$datapost = $this->input->post();
		$data['log_table'] = $datapost['logtable'];
		$data['checked_ids'] = trim($datapost['checked_ids']);
		$ret = $this->logdb->batchDelLog($data);
		if($ret){
			echo json_encode(array('info'=>1,'tip'=>'操作成功'));
		}else{
			echo json_encode(array('info'=>0,'tip'=>'操作失败'));
		}
	}

}
