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

	public static function set($urlRequest, $callback)
	{
		$route = array();
		$route['urlRequest'] = $urlRequest;

		if(is_string($callback)) {
			$callback = explode('@',$callback);
			$controller = $callback[0];
			$method = $callback[1];

			$route['controller'] = $callback[0];
			$route['method'] = $callback[1];
		} else {
			$route['callback'] = $callback;
		}

		return array_push(self::$listRoute, $route);
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
}