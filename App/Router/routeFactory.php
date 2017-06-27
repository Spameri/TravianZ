<?php

namespace App\Router;


class RouterFactory
{

	public static function createRouter() : \Nette\Application\IRouter
	{
		$router = new \Nette\Application\Routers\RouteList();

		$router[] = new \Nette\Application\Routers\Route('<module>/<presenter>[/<action>][/<id>]', [
			'model' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'default',
		]);

		return $router;
	}
}