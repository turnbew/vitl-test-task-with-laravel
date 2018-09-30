<?php

	namespace App\Http\Controllers\Query;

	use DB;
	use App\Http\Controllers\Query\_InterfaceQuery;

	class NamesQuery implements _InterfaceQuery
	{

		protected static $_names_table = 'vitl_names'; 

		
		
		public static function countAll() 
		{
			return DB::table('vitl_names')->count();
		}
		
		
		
		public static function get($id = 0, $offset = 0, $limit = 25) 
		{
			$query =  DB::table(self::$_names_table);
			
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
				$sql = "SELECT n.* FROM " . self::$_names_table . " AS n " .
					"WHERE CONCAT(n.first_name, ' ', n.last_name) LIKE '%" . $name_part . "%' ";
			}
			else {
				$sql = "SELECT CONCAT(n.first_name,' ',n.last_name) AS full_name, n.* " . 
					"FROM " . self::$_names_table . " AS n " .
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
	
