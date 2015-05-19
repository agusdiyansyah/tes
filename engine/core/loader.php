<?php  

	/**
	LOADER
	*/
	class Loader extends App
	{
		static $loader;

		public function __construct()
		{
			if (empty(self::$loader)) {
				self::$loader = $this;
			}
		}

		/**
		MODEL
		*/

		public function model($model)
		{

			$url 	= explode('/', $model);

			if (isset($url[1])) {
				
				$module = $url[0];
				$model 	= $url[1];

			}

			if (file_exists(APP . $module . '/model/' . $model . '.php')) {
				
				require_once APP . $module . '/model/' . $model . '.php';
				return new $model;

			} else {

				echo "<b><i>404 Model&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

			}

		}



		/**
		VIEW
		*/

		public function view( $view = '' , $vars = [] )
		{
			
			if (!empty($view) && isset($vars) ) {
				$url 	= explode('/', $view, 2);
				$module = $this->module;
				$view 	= $url[0];
				
				// pengolahan var data
				extract($vars);
				unset($vars);

				$module = $url[0];
				$view 	= $url[1];


				if (file_exists(APP . $module . '/view/' . $view . '.php')) {
					
					require_once APP . $module . '/view/' . $view . '.php';

				} else {

					echo "<b><i>404 View&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

				}
			} elseif ($view = '') {
				
				echo "<b><i>404 View&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

			}

		}



		/**
		MODULE
		*/

		public function module($module = '')
		{
			if ($module != '') {
				
				$url = explode('/', $module);

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

			} else {

				echo "<b><i>404 Module&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

			}
		}


		/**
		LIBRARY
		*/

		public function lib($lib = '')
		{
			if ($lib != '') {
				
				if ( file_exists(LIB . $lib . '.php') ) {
					
					require_once LIB . $lib . '.php';
					return new $lib;

				} else {
					echo "<b><i>404 Library&nbsp&nbsp.__.&nbsp&nbsp</i></b>";
				}

			} else {
				echo "<b><i>404 Library&nbsp&nbsp.__.&nbsp&nbsp</i></b>";
			}
		}


		/**
		FUNCTION/HELPER
		*/

		public function fun($fun = '')
		{

			if ( !empty($fun) ) {

				if ( file_exists(FUN . $fun . '.php') ) {
					// echo "string";
					require_once FUN . $fun . '.php';
					return $fun;
				} else {
					echo "<b><i>404 Function&nbsp&nbsp.__.&nbsp&nbsp</i></b>";
				}

			} else {

				echo "<b><i>404 Function&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

			}
			return;
		}
		
	}