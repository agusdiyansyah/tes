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

		function __construct()
		{

			$url = $this->router();
			// cek module pada directori app

			$segment = 0;

			// define module
			if (isset($url[$segment])) {
				if (file_exists(APP . $url[$segment])) {

					$this->module = $url[$segment];
					unset($url[$segment]);

					$segment++;

				}
			}

			// default controller name is name of module 
			// if dev not setting specific controller on mudule
			if (empty($this->controller)) {
				$this->controller = $this->module;
			}

			// cek url segment to find the controller
			if (isset($url[$segment])) {
				
				if (file_exists(APP . $this->module . '/controller/' . $url[$segment] . '.php')) {

					$this->controller = $url[$segment];
					unset($url[$segment]);

					$segment++;

				}

			}

			// include controller
			require_once APP . $this->module . '/controller/' . $this->controller . '.php';

			// make object of controller
			$this->controller = new $this->controller;

			// find specific mwthod/function on controller
			if (isset($url[$segment])) {
				
				if (method_exists($this->controller, $url[$segment])) {
					
					$this->method = $url[$segment];
					unset($url[$segment]);

				}

			}

			// set param with other url segment value if still available
			$this->params = $url ? array_values($url) : [];

			call_user_func_array([$this->controller, $this->method], $this->params);

			unset($this->module);
			unset($this->controller);
			unset($this->method);
			$this->params = [];

		}

		public function router()
		{

			if (isset($_GET['url'])) {
				return $url = explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));				
			}

		}
	}