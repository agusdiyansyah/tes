<?php 

	/**
	* 
	Aplication Core
	*/

	class App
	{
		
		protected $module 		= 'hello';
		protected $controller 	= 'hello';
		protected $method 		= 'index';
		protected $params 		= [];

		function __construct()
		{
			$url = $this->router();

			// cek module pada directori app

			if (isset($url[0])) {
				if (file_exists(APP . $url[0])) {

					$this->module = $url[0];
					unset($url[0]);

				}
			}

			$segment = 1;
			$this->controller = $this->module;

			if (isset($url[$segment])) {
				
				if (file_exists(APP . $this->module . '/controller/' . $url[$segment] . '.php')) {

					$this->controller = $url[$segment];
					unset($url[$segment]);

					$segment++;

				}

			}

			require_once APP . $this->module . '/controller/' . $this->controller . '.php';

			$this->controller = new $this->controller;

			if (isset($url[$segment])) {
				
				if (method_exists($this->controller, $url[$segment])) {
					
					$this->method = $url[$segment];
					unset($url[$segment]);

				}

			}

			$this->params = $url ? array_values($url) : [];

			call_user_func_array([$this->controller, $this->method], $this->params);

		}

		public function router()
		{

			if (isset($_GET['url'])) {
				return $url = explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));				
			}

		}
	}