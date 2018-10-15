<?php

	namespace App\Http\Controllers\Query;

	use DB;
	use App\Http\Controllers\Query\_InterfaceQuery;

	class NamesQuery implements _InterfaceQuery
	{

		private static $_table_names; 
		private static $_table_prefix_names;
		private static $_instance;

		
		private function __construct()
		{
			self::$_table_names = 'names';
			self::$_table_prefix_names = \DB::getTablePrefix() . 'names';
		}

		
		
		public static function getInstance()
		{
			if ( is_null( self::$_instance ) ) {
			  self::$_instance = new self();
			}
			return self::$_instance;
		}
  
  
		
		public static function countAll() 
		{
			return DB::table(self::$_table_names)->count();
		}
		
		
		
		public static function get($id = 0, $offset = 0, $limit = 25) 
		{
			$query =  DB::table(self::$_table_names);
			
			if ( $id > 0 ) {
				$query->where('id', $id);
			}
			
			return $query->select('id', 'first_name', 'last_name')
				->orderBy('first_name', 'asc')
				->orderBy('last_name', 'asc')
				->offset($offset)
                ->limit($limit)
				->get();
		}
		
		
		
		public static function getSearchResult($name_part, $filter_duplicates, $just_count = false, $offset = 0, $limit = 25) 
		{	
			if ($filter_duplicates == 0) {
				$sql = "SELECT n.* FROM " . self::$_table_prefix_names . " AS n " .
					"WHERE CONCAT(n.first_name, ' ', n.last_name) LIKE '%" . $name_part . "%' ";
			}
			else {
				$sql = "SELECT CONCAT(n.first_name,' ',n.last_name) AS full_name, n.* " . 
					"FROM " . self::$_table_prefix_names . " AS n " .
					"WHERE CONCAT(n.first_name,' ',n.last_name) LIKE '%" . $name_part . "%' " .
					"GROUP BY full_name ";
			}
			
			if ($just_count) {
				return count(DB::select($sql));
			} 
			else {
				$sql .= "ORDER BY n.first_name ASC, n.last_name ASC " . 
					"LIMIT " . $offset . ", " . $limit;
				
				return DB::select($sql);
			}
		}	
	
	
		public static function add($insert_data = array()) 
		{
			return DB::table('vitl_names')->insert($insert_data);
		}

		
		
		public static function drop() 
		{
			
		}

	}//END class NamesQuery
	
