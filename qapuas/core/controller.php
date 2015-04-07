<?php  

	/**
	CONTROLLER
	*/
	class Controller extends App
	{

		public function __construct()
		{

		}

		public function model($model)
		{
			$url 	= explode('/', $model);

			$module = $this->module;
			$model 	= $url[0];

			if (isset($url[1])) {
				
				$module = $url[0];
				$model 	= $url[1];

			}

			if (file_exists(APP . $module . '/model/' . $model . '.php')) {
				
				require_once APP . $module . '/model/' . $model . '.php';
				return new $model;

			} else {

				echo "GX KEETEMU MODEL NYA";

			}

		}

		public function view( $view , $data )
		{
			$url 	= explode('/', $view);
			$module = $this->module;
			$view 	= $url[0];
			
			if (is_array($data)) {

				(object) $data;
				extract($data);
				// echo "array";

			}elseif (is_object($data)) {

				extract((array) $data);
				// echo "object";

			}
			
			unset($data);

			if (isset($url[1])) {
				
				$module = $url[0];
				$view 	= $url[1];

			}

			if (file_exists(APP . $module . '/view/' . $view . '.php')) {
				
				require_once APP . $module . '/view/' . $view . '.php';

			} else {

				echo "GX KEETEMU VIEW NYA";

			}

		}

		public function module($module)
		{
			$url = explode('/', $module);

			$method = 'index';

			if (isset($url[1])) {
				
				$method = $url[1];
				unset($url[1]);

			}
			
			require_once APP . $url[0] . '/controller/' . $url[0] . '.php';

			$controller = new $url[0];
			unset($url[0]);

			$params = $url ? array_values($url) : [];

			call_user_func_array([$controller, $method], $params);
		}

		
	}