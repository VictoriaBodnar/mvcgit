<?php

class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}
	/*Retuns request string*/
	private function getUri()
	{

		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		//print_r($this->routes);
		//echo "Class Router method run";

		//Получить строку запроса
		$uri = $this->getURI();
		$uri = substr($uri, strpos($uri,'/')+1);// отсекаем в строке адреса первую часть до слеша (MVC/)
		//echo $uri;
		//Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) {
			
			
			//echo "<br>$uri";
			//echo "<br> $uriPattern -> $path";
			//Сравниваем $uriPattern и $uri
			if (preg_match("~$uriPattern~", $uri)) {
				//Получаем внутренний путь из внешнего согласно правилу
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);//значение ~$uriPattern~ заменяем значением $path в строке $uri

				//определить контроллер, action, параметры
				$segments = explode('/',$internalRoute);
				$controllerName = ucfirst(array_shift($segments)).'Controller';
				$actionName = 'action'.ucfirst(array_shift($segments));
				echo '<br>Class: controller name:'.$controllerName;
				echo '<br>Method: action name:'.$actionName;
				$parameters = $segments;
				//echo "<pre>";
				//print_r($parameters);
				//die;
				//Подключить файл класса-контроллера
				$controllerFile = ROOT . '/controllers/' . $controllerName.'.php';

				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				//Создать объект, вызвать метод (т.е. action)
				$controllerObject = new $controllerName;
				//$result = $controllerObject->$actionName($parameters);
				//<---->используем  call_user_func_array() чтоб $parameters передать в функцию $actionName в виде переменных, а не массива (так удобнее)
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if ($result != null) {
					break; //метод вызвали, дальше массив маршрутов не просматриваем
				}

			}

		}

		//Если есть совпадение, определить какой контроллер
		//и метод(action) обрабатывают запрос

		

		


	}
}
?>