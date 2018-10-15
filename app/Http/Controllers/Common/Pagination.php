<?php

	namespace App\Http\Controllers\Common;

	
	class Pagination
	{
		
		public static function set($all_records, $base_uri, $act_page, $limit, $type = 'php') 
		{
			$pagination = array();
			
			$pagination['all_records'] = $all_records;
			$pagination['pages'] = ceil($all_records / $limit);
			$pagination['page'] = $act_page;
			$pagination['limit'] = $limit;
			$pagination['page_url'] = $base_uri;
			$pagination['offset'] = ($act_page - 1) * $limit;
			$pagination['type'] = $type;
			
			return $pagination;
		}
		

	}//END class Pagination
	
