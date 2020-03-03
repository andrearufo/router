<?php

class Router
{
    function __construct(){
        $this->routes = [];
        // $this->error('404', '404.html');
    }

    private function add($method, $name, $template){
        $this->routes[$method][$name] = new Route($method, $name, $template);
    }

    public function any($name, $template){
        $this->add('GET', $name, $template);
        $this->add('POST', $name, $template);
    }

    public function get($name, $template){
        $this->add('GET', $name, $template);
    }

    public function post($name, $template){
        $this->add('POST', $name, $template);
    }

    // public function error($code, $template){
    //     $this->add('ERROR', $code, $template);
    // }

    public function debug(){
        echo
        '<hr>'.
        '<pre>'.print_r($_SERVER, 1).'</pre>'.
        '<pre>'.print_r($this, 1).'</pre>'.
        '<hr>';
    }

    public function is_param($param){
        return preg_match('/\[.*?\]/', $param, $item);
    }

    public function go(){
        $mine = false;

        // $r = [];
        // $r['method'] = $_SERVER['REQUEST_METHOD'];
        // $r['name'] = $_SERVER['REQUEST_URI'];
        // $r['items'] = explode('/', $r['name']);
        // $r['count'] = count($r['items']);

        $r = new Route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

        // search for exact corrispondence
        if( isset( $this->routes[ $r->method ][ $r->name ] ) ){
            $mine = $this->routes[ $r->method ][ $r->name ];
        }

        // search for numbers of items
        $candidate = [];
        foreach ($this->routes[ $r->method ] as $value) {
            if ($value->count == $r->count) {
                $value->valid = false;
                foreach ($value->items as $key => $item) {
                    $value->valid = $this->is_param( $value->items[$key] ) || $value->items[$key] == $r->items[$key];
                }

                $candidate[] = $value;
            }
        }

        echo '<pre>'.print_r($candidate, 1).'</pre>';
        exit;

        if($mine){
            $mine->get_page();
            exit;
        }else{
            http_response_code(404);
            echo '<h1>404</h1> <p>Page not found</p>';
            exit;
        }
    }
}

class Route
{

    function __construct($method, $name, $template = false)
    {
        $this->method = $method;
        $this->name = $name;
        $this->template = $template;

        $this->items = array_filter(explode('/', $name));
        $this->count = count($this->items);
    }

    public function get_page(){
        require $this->template;
    }
}
