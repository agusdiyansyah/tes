<?php 

	/**
	* 
	Aplication Core
	*/
	class App
	{
		static $qapuas;
		
		public $module		= "beranda";
		public $controller	= "";
		public $method		= "index";
		public $params 		= [];

		public $host 		= "localhost";
		public $username 	= "root";
		public $password	= "";
		public $db 			= "portal";
		public $charset		= "utf8";
		public $port 		= NULL;

		function __construct()
		{

			$url = $this->router();
			// cek module pada directori app

			$segment = 0;

			if (isset($url[$segment])) {
				if (file_exists(APP . $url[$segment])) {

					$this->module = $url[$segment];
					unset($url[$segment]);

					$segment++;

				}
			}

			if (empty($this->controller)) {
				$this->controller = $this->module;
			}

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

			if (empty(self::$qapuas)) {
				self::$qapuas = $this;
			}

		}

		public function router()
		{

			if (isset($_GET['url'])) {
				return $url = explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));				
			}

		}
	}