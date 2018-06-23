<?php

namespace Core;

abstract class Controller
{
    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    public function __call($method, $params)
    {
        $call_method = $method . "Action";
        if($this->before() !== false) {
            if (method_exists($this,$call_method)) {
                call_user_func_array([$this,$call_method], $params);
                $this->after();
            } else {
                throw new \Exception(get_class($this) . " <b>$call_method</b> is not callable");
            }
        }
    }

    /*程序调用之前调用的方法*/
    protected function before()
    {
        // echo "function before <br/>";
    }

    /*程序调用之后调用的方法*/
    protected function after()
    {
        // echo "function after <br/>";
    }
}