<?php

class CacheFile {
    private $path;
    private $keys_prefix;
    public $debug;
    public $lose;
    private $ciObj;

    public function __construct($p = "") {
        $this->ciObj = &get_instance();
        $this->path = $this->ciObj->config->item('web_html'). $p;
        $this->keys_prefix = "xsq_";
        if (!is_dir($this->path)) mkdir($this->path,0777, true);

        if (file_exists($this->path . "/count") && is_readable($this->path . "/count")) {
            $this->debug = unserialize(file_get_contents($this->path . "/count"));
        } else {
            $this->debug = "";
        }
        if (file_exists($this->path . "/lose") && is_readable($this->path . "/lose")) {
            $this->lose = unserialize(file_get_contents($this->path . "/lose"));
        } else {
            $this->lose = "";
        }

    }

    private function find_filename($key) {
        $p = $this->path . '/' . md5($this->keys_prefix) . '-' . md5($key);
        return $p;
    }

    public function get($key) {
        $file = $this->find_filename($key);
        $time = microtime(TRUE);
        $res = FALSE;
        if (file_exists($file) && is_readable($file)) {
            $data = file_get_contents($file);
            $time = substr($data, 4, 10);
            if ($data) {
                if (intval($time) >= time()) {
                    $res = unserialize(substr($data, 18));
                    if (!empty($this->debug)) {
                        if (!empty($this->debug[md5($key)])) {
                            $this->debug[md5($key)]['count'] = $this->debug[md5($key)]['count'] + 1;
                            $debug = $this->debug;
                        }
                    }
                    if (empty($debug)) {
                        $this->debug[md5($key)] = array("key" => $key, "count" => 1);
                        $debug = $this->debug;
                    }
                    $f = file_put_contents($this->path . "/count", serialize($debug));
                    chmod($this->path . "/count", 0777);
                }
            }

            if (FALSE === $res) {
                $this->del($key);
            }
        }

        return $res;
    }

    //默认30天
    public function set($key, $data, $ttl=2592000) {
        $file = $this->find_filename($key);
        $time = microtime(TRUE);
        $this->del($key);
        $data = "<!--" . (time() + $ttl) . "-->\n" . serialize($data);
        $res = file_put_contents($file, $data);
        chmod($file, 0777);
        if (!empty($this->lose)) {
            if (!empty($this->lose[md5($key)])) {
                $this->lose[md5($key)]['lose'] = $this->lose[md5($key)]['lose'] + 1;
                $lose = $this->lose;
            }
        }
        if (empty($lose)) {
            $this->lose[md5($key)] = array("key" => $key, "lose" => 1);
            $lose = $this->lose;
        }
        $f = file_put_contents($this->path . "/lose", serialize($lose));
        chmod($this->path . "/lose", 0777);

        return $res;
    }

    public function gethtml($key) {
        $file = $this->find_filename($key);
        $time = microtime(TRUE);
        $res = FALSE;
        if (file_exists($file) && is_readable($file)) {
            $data = file_get_contents($file);
            $time = substr($data, 4, 10);
            if ($data) {
                if (intval($time) >= time()) {
                    $res = substr($data, 18);
                    if (!empty($this->debug)) {
                        if (!empty($this->debug[md5($key)])) {
                            $this->debug[md5($key)]['count'] = $this->debug[md5($key)]['count'] + 1;
                            $debug = $this->debug;
                        }
                    }
                    if (empty($debug)) {
                        $this->debug[md5($key)] = array("key" => $key, "count" => 1);
                        $debug = $this->debug;
                    }
                    $f = file_put_contents($this->path . "/count", serialize($debug));
                    chmod($this->path . "/count", 0777);
                }
            }

            if (FALSE === $res) {
                $this->del($key);
            }
        }
        if ($res) $res = $res . "<!--" . $time . "-->";
        return $res;
    }

    //默认30天
    public function sethtml($key, $data, $ttl=2592000) {
        $file = $this->find_filename($key);
        $time = microtime(TRUE);
        $this->del($key);
        $data = "<!--" . (time() + $ttl) . "-->\n" . $data;
        $res = file_put_contents($file, $data);
        chmod($file, 0777);
        if (!empty($this->lose)) {
            if (!empty($this->lose[md5($key)])) {
                $this->lose[md5($key)]['lose'] = $this->lose[md5($key)]['lose'] + 1;
                $lose = $this->lose;
            }
        }
        if (empty($lose)) {
            $this->lose[md5($key)] = array("key" => $key, "lose" => 1);
            $lose = $this->lose;
        }
        $f = file_put_contents($this->path . "/lose", serialize($lose));
        chmod($this->path . "/lose", 0777);
        return $res;
    }

    public function del($key) {
        $file = $this->find_filename($key);
        $time = microtime(TRUE);
        if (file_exists($file) && is_writable($file)) {
            unlink($file);
        }
        $res = !file_exists($file);
    }

    public function delPathCache($path) {
        $this->deleteAllFile($this->ciObj->config->item('web_html').$path);
    }

    private function deleteAllFile($path) {
        $op = dir($path);
        while(false != ($item = $op->read())) {
            if($item == '.' || $item == '..') {
                continue;
            }
            if(is_dir($op->path.'/'.$item)) {
                $this->deleteAllFile($op->path.'/'.$item);
                rmdir($op->path.'/'.$item);
            } else {
                unlink($op->path.'/'.$item);
            }
        }
    }

}


?>