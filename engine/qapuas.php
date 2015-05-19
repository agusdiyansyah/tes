<?php 
	define("APP", "../app/");
	define("AST", "gudang/");
	define("CORE", "core/");
	define("LIB", "library/");
	define("FUN", "function/");
	
	/**
	AUTOLOAD
	*/

	/*
	MUST BE LOADED
	---------------------------
	app 	: routing class
	loader 	: file loader class to load module, model, view, and controller

	OPTIONAL
	---------------------------
	model 	: database class
	*/
	$conf["CORE"] = ["app","loader","model"];

	// Load function
	$conf["FUN"]  = [""];

	foreach ($conf as $key => $value) {
		for ($i=0; $i < count($conf[$key]); $i++) { 
			if (file_exists(constant($key) . $conf[$key][$i] . ".php")) {
				require_once constant($key) . $conf[$key][$i] . ".php";
			}
		}
	}

	$app = new App;