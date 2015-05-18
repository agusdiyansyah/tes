<?php  

	/**
	LOADER
	*/
	class Loader extends App
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

		public function view( $view = '' , $vars = [] )
		{
			
			if ( $view != '' && isset($vars) ) {
				$url 	= explode('/', $view);
				$module = $this->module;
				$view 	= $url[0];
				
				// pengolahan var data
				extract((array) $this->obj($vars));
				unset($vars);

				if (isset($url[1])) {
					
					$module = $url[0];
					$view 	= $url[1];

				}

				if (file_exists(APP . $module . '/view/' . $view . '.php')) {
					
					require_once APP . $module . '/view/' . $view . '.php';

				} else {

					echo "<b><i>404 view&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

				}
			} elseif ($view = '') {
				
				echo "<b><i>404 view&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

			}

		}



		/**
		MODULE
		*/

		public function module($module = '')
		{
			if ($module != '') {
				
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
			if ( $fun != '' ) {
				
				echo "<b><i>Under Construction&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

			} else {

				echo "<b><i>404 Function&nbsp&nbsp.__.&nbsp&nbsp</i></b>";

			}
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