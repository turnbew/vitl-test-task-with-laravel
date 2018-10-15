<?php

	namespace App\Http\Controllers\Query;

	interface  _InterfaceQuery
	{
		public static function getInstance();
		
		public static function countAll();
		
		public static function get($id, $offset, $limit);
		
		public static function add($insert_data);
		
		public static function drop();
	}
	
