<?php

class Data {
    public $_curl = false;
    public $_json;

    public function __construct()
    {
        if(is_callable('curl_init')){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://test.osky.dev/101/data.json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $this->_json = curl_exec($ch);
            curl_close($ch);
            $this->_curl = true;
        } else {
            $this->_json = file_get_contents('data.json');
        }

        $this->_json = json_decode($this->_json);

        return $this;
    }

    public function sort()
    {
        sort($this->_json);

        return $this;
    }

    public function get()
    {
        return $this;
    }
}