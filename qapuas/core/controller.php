<?php  

	/**
	CONTROLLER
	*/
	class Controller extends App
	{

		public function __construct()
		{

		}



		/**
		MODEL
		*/

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



		/**
		VIEW
		*/

		public function view( $view , $vars )
		{
			$url 	= explode('/', $view);
			$module = $this->module;
			$view 	= $url[0];
			
			// pengolahan var data
			
			var_dump($this->obj($vars));
			extract((array) $this->obj($vars));
			unset($vars);

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



		/**
		MODULE
		*/

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


		/**
		CONVERT ARRAY TO OBJECT
		*/

		public function obj( $array ) {
            if (is_array($array)) {

                foreach ($array as $Key => $Value){

                    if (is_array($Value)){
                        $array[$Key] = (object) $this->obj($Value);
                    }

                }
            }

            return (object) $array;

        }

		
	}