<?php

/**
 * Rainy - A Light-Weight PHP Framework For Beginner
 *
 * @package  RainyFramework
 * @author   Dinh Phong <dinhphong.developer@gmail.com>
 *
 * Route Class
 */

namespace Rainy;

class Route
{
	protected static $listRoute = [];

	public static function rewrite($urlRequest, $callback)
	{
		$route = array();

		$urlRequest = filter_var(trim($urlRequest, '/'), FILTER_SANITIZE_URL);

		$route['regex'] = self::buildUrl($urlRequest);

		if(is_string($callback)) {
			$callback = explode('@',$callback);
			$controller = $callback[0];
			$method = $callback[1];

			$route['controller'] = $callback[0];
			$route['method'] = $callback[1];
		} else {
			$route['callback'] = $callback;
		}

		return self::$listRoute[$urlRequest] = $route;
	}

	public static function show()
	{
		echo "<pre>";
		var_dump(self::$listRoute);
		echo "</pre>";
	}

	public static function getAllRoutes()
	{
		return self::$listRoute;
	}

	public static function buildUrl($urlRequest)
	{

		$urlExplode = explode('/', $urlRequest);
		$regex = '';
		$params = array();

		foreach($urlExplode as $url) {

			if(strpos($url, "{") === 0 && substr($url, -1) == "}") {
				$regex .= "([^\/]*?)\/";
				continue;
			}

			$regex .= $url."\/";
		}

		return $regex = '/^' . trim($regex, '\/') . '$/';

	}
}