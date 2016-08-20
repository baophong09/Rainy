<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 *
 */

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
	 * @var String
	 */
	protected $urlRequest;

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

	public function run()
	{
		$this->parseUrl();

		$urlRequest = $this->urlRequest;

		if(!$urlRequest) {
			require_once('app/controller/'.$this->controller.EXT);

			$this->controller = "App\\Controller\\".$this->controller;
			$this->controller = new $this->controller;
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
		}

		if(isset($urlRequest[1])) {
			if(method_exists($this->controller, $urlRequest[1])) {
				$this->method = $urlRequest[1];
				unset($urlRequest[1]);

				$this->params = $urlRequest;
			}
		}

		$this->makeRequest($this->controller, $this->method, $this->params);
	}

	public function setDefaultController($name) {
		$this->controller = $name;
	}

	public function setDefaultMethod($method) {
		$this->method = $method;
	}

	/**
	 * Parse + filter url to array
	 * @return Array
	 */
	public function parseUrl()
	{
		if(isset($_GET['request']))	{
			return $this->urlRequest = explode('/',filter_var(trim($_GET['request'], '/'), FILTER_SANITIZE_URL));
		}
	}
}