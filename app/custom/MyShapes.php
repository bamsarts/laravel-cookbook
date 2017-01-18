<?php 

	/**
	* 
	*/
	class MyShapes
	{
		
		static public $APP_ROOT;

		function __construct()
		{
			 $composer = json_decode(file_get_contents(base_path() . '/composer.json'), true);
        	 self::$APP_ROOT = array_keys(data_get($composer, 'autoload.psr-4'))[0];
		}

		public function octagon(){
			return 'I am an octagon new';
		}

	}

 ?>