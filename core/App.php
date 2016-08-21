<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 *
 */

namespace Rainy;

use Rainy\Route as Route;
use \Exception as Exception;

class App
{
    /**
     * Controller Object
     * @var Object
     */
    protected $controller = 'home';

    /**
     * Method name
     * @var String
     */
    protected $method = 'index';

    /**
     * Parameters
     * @var Array
     */
    protected $params;

    /**
     * Url Request
     * @var Array
     */
    protected $urlRequest;

    /**
     * Request
     * @var String
     */
    protected $request;

    /**
     * Url Request
     * @var String
     */
    protected $routes;

    /**
     * Directory of controller
     * @var String
     */
    protected $dir;

    /**
     * Construct when run application
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Call method of controller
     * @param object $controller
     * @param string $method
     * @param array $params
     *
     * @return void
     */
    public function makeRequest($controller, $method, $params)
    {
        if(!isset($controller) || !isset($method)) {
            return;
        }

        call_user_method($method, $controller, $params);
    }

    /**
     * Run a application
     *
     * @return void
     */
    public function run()
    {
        $this->parseUrl();

        $urlRequest = $this->urlRequest;

        if(!$urlRequest) {
            require_once('app/controller/'.$this->controller.EXT);

            $this->controller = "App\\Controller\\".$this->controller;
            $this->controller = new $this->controller;

            return $this->makeRequest($this->controller, $this->method, $this->params);
        }

        if(isset($urlRequest[0])) {

            if(file_exists('app/controller/'.$urlRequest[0] . EXT)) {
                require_once('app/controller/'.$urlRequest[0] . EXT);

                $this->controller = "App\\Controller\\".$urlRequest[0];
                $this->controller = new $this->controller;
            }

            if(is_dir('app/controller/'.$urlRequest[0]) && !$this->controller) {

            }

            unset($urlRequest[0]);

            $urlRequest[1] = isset($urlRequest[1]) ? $urlRequest[1] : 'index';

            if(method_exists($this->controller, $urlRequest[1])) {
                $this->method = $urlRequest[1];
                unset($urlRequest[1]);

                $this->params = $urlRequest;

                return $this->makeRequest($this->controller, $this->method, $this->params);
            }
        }

        $routes = Route::getAllRoutes();

        $isRewrite = $isCallback = $isController = false;

        foreach($routes as $k => $route) {
            if(preg_match($route['regex'], $this->request, $matches)) {
                unset($matches[0]);
                $isRewrite = true;

                if(isset($route["callback"])) {
                    $isCallback = true;
                }

                if(isset($route['controller'])) {
                    $isController = true;
                }

                break;
            }
        }

        if($isRewrite) {

            if($isCallback) {
                return call_user_func_array($routes[$k]["callback"], $matches);
            }

            if($isController) {

                if(file_exists('app/controller/'.$routes[$k]["controller"] . EXT)) {
                    require_once('app/controller/'.$routes[$k]["controller"] . EXT);

                    $this->controller = "App\\Controller\\".$routes[$k]["controller"];
                    $this->controller = new $this->controller;
                }

                return $this->makeRequest($this->controller,$routes[$k]["method"],$matches);
            }

        }

        throw new \Exception("Controller, method or route not exist");

        return true;

        //return $this->makeRequest($this->controller, $this->method, $this->params);
    }

    /**
     * Set Default Controller
     *
     * @param String $name
     *
     * @return void
     */
    public function setDefaultController($name) {
        $this->controller = $name;
    }

    /**
     * Set Default Method
     *
     * @param String $method
     *
     * @return void
     */
    public function setDefaultMethod($method) {
        $this->method = $method;
    }

    /**
     * Parse + filter url to array
     * @return void
     */
    public function parseUrl()
    {
        if(isset($_GET['request'])) {
            $this->request = filter_var(trim($_GET['request'], '/'), FILTER_SANITIZE_URL);
            $this->urlRequest = explode('/',$this->request);

            return;
        }
    }
}