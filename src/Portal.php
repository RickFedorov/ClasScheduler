<?php
namespace ClasScheduler;

require_once 'Handler.php';
require_once 'DB.php';

$hander = new Handler();

class Portal
{
    protected $method = '';
    protected $endpoint = array();
    protected $verb = '';
    protected $args = array();
    protected $file = null;
    protected $request_content_type = '';
    protected $response_content_type = 'application/json';
    
    public function __construct($request, $server)
    {
        $this->endpoint = explode('/', rtrim($request['endpoint'], '/'));
        unset($request['endpoint']);
        
        $this->args = $request;
        $this->method = $server['REQUEST_METHOD'];
    }
    
}