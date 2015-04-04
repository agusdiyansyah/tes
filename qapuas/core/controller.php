<?php  

	/**
	CONTROLLER
	*/
	class Controller
	{

		public function __construct()
		{

		}

		public function model($model)
		{
			$url = explode('/', $model);

			if (isset($url[1])) {

				$model = $url[1];

				require_once APP . $url[0] . '/model/' . $url[1] . '.php';
				return new $url[1];

			} else {
				echo "GX KETEMU MODELNYA";
			}

		}

		public function view( $view , $data )
		{
			$url = explode('/', $view);

			if (isset($url[1])) {

				$view = $url[1];

				require_once APP . $url[0] . '/view/' . $url[1] . '.php';
				
			} else {
				echo "GX KETEMU VIEWNYA";
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