<?php

namespace Core;
/**
 * Router
 *
 * PHP version 5.4
 * 这个类的作用就是将url 解析成一个可以识别的数组 用于具体请求哪个controller 和 action
 */
class Router
{

    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     *
     * @param string $route  The route URL
     * @param array  $params Parameters (controller, action, etc.)
     *
     * @return void
     */
    
    /*
        第一阶段是直接定义 add("post",["controller"=>"post","action"=>"index"])
        只要直接使用 $this->routes[$route] = $params;

        第二阶段 我想使用 add("{controller}/{action}")表示我的请求只要满足controller
        /action 条件即可 当然可以使用 {controller}/{action}/{id} 这样的形式

        第三阶段 我想使用带参数的 比如 add("{controller}/{id:\d+}/{action}")
        我想使用一个参数 并且是数字类型
 
     */
    public function add($route, $params = [])
    {
        $route = preg_replace('/\//', '\\/',$route);
        #替换 {controller} 变成 (?<controller>([a-z]+))
        $route = preg_replace('/\{([a-z-]+)\}/','(?<\1>[a-z-]+)',$route);
        
        #替换 {id:\d+} 变成 (?<id>\d+)
        $route = preg_replace('/\{([a-z-]+):(.*)\}/','(?<\1>\2)',$route);
        $route = '/^'.$route.'$/i';
        # 变成  "/^(\?<controller>[a-z]+)\/(\?<action>[a-z]+)$/i"
        $this->routes[$route] = $params;
    }

    public function autoload($class_name)
    {
        $file_path = str_replace('\\', '/', $class_name);
        $file_path = BASEDIR.'/'.$file_path . '.php';
        if(is_readable($file_path)){
            require $file_path;
        }
    }

    /*调度器*/
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);
        if ($this->match($url)) {
            $controller = $this->getNameSpace() . $this->convertToStudlyCaps($this->params['controller']);
            $action = $this->convertToCamelCase($this->params['action']);
            if (class_exists($controller)) {
                $controller_class = new $controller($this->params);
                if (is_callable([$controller_class, $action])) {
                    call_user_func_array([$controller_class, $action],[]);
                } else {
                      throw new Exception( "The action ${action} in ${controller} is not callable");
                }
            } else {
                throw new Exception("$controller not exits");
            }
        } else {
              throw new Exception( "do not have this route");
        }
    }

    /*将url中的get参数取消掉 只保留controller/action 
    * 也可以使用explode 拆分之后 取第一个元素
    **/
    public function removeQueryStringVariables($url)
    {
        $pos = strpos($url, '?');
        if( $pos > 0 ){
            $url = substr($url, 0, $pos);
        } 
        return $url;
    }

    /**
     * 将类似 stu-map 这样的单词变成StuMap
     * @param  [type] $controller [description]
     * @return [type]             [description]
     */
    public function convertToStudlyCaps($str)
    {
        return str_replace('-', '', ucwords($str, "-"));
    }

    /**
     * 将类似于stu-map 这样的单词变成stuMap
     */
    public function convertToCamelCase($str)
    {
        return lcfirst(str_replace('-', '', ucwords($str, "-")));
    }

    public function getNameSpace()
    {
        $namespace = "\\App\\Controllers\\";
        if (array_key_exists("namespace", $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }


    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $url The route URL
     *
     * @return boolean  true if a match found, false otherwise
     */
    public function match($url)
    {
        // foreach ($this->routes as $route => $params) {
        //     if ($url == $route) {
        //         $this->params = $params;
        //         return true;
        //     }
        // }
        
        #只要符合这个规则的 都认为是ok的 controller/action
        // $regex = "/(?<controller>[a-z]+)\/(?<action>[a-z]+)/";
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)){
                foreach ($matches as $key => $match) {
                    if (is_string($key)) { #只提取我们自己想要的url信息
                        $params[$key] = $match;
                    }
                }
                // var_dump($params);exit;
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Get the currently matched parameters
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}
