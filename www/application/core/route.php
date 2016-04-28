<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	public static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) ){
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) ){
			$action_name = $routes[2];
		}

		//получаем дополнительные параметр - id
		if ( !empty($routes[3]) ){
			$id = $routes[3];
		}

		//получаем дополнительные параметр - parameter
		if ( !empty($routes[4]) ){
			$parameter = $routes[4];
		}

		if( !empty($routes[5])) {
			$type = $routes[5];
		}

		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path)) {
			include "application/models/".$model_file;
		}

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path)) {
			include "application/controllers/".$controller_file;
		} else {
			Route::ErrorPage404();
		}

		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action)) {
			// вызываем действие контроллера
			if(empty($parameter) && empty($type)) {
				isset($id) ? call_user_func(array($controller, $action), $id) : call_user_func(array($controller, $action));
			}elseif (empty($type) ) {
				$controller->$action($id, $parameter);
			}else {
				$controller->$action($id, $parameter, $type);
			}
		}
		else {
			Route::ErrorPage404();
		}
	
	}

	public function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
    
}
