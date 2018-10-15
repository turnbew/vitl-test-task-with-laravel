<?php

	namespace App\Http\Controllers;

	
	use App\Http\Controllers\Validator\NamesValidator;
	use App\Http\Controllers\Query\NamesQuery;
	use App\Http\Controllers\Common\Pagination;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Redirect;


	class NamesController extends Controller 
	{	

		
		/**
		 * Listing all names
		 * @input: 
		 *		$page: int - selected page - default is 1
		 *		$limit: int - number of records on one page - default is 25
		 * @return 
		 *		all names page's View
		 */
		public function all($page = 1, $limit = 25) 
		{	
			//Count all records
			$all_records = NamesQuery::getInstance()->countAll();
			
			//Setting data for pagination
			$pagination = Pagination::set($all_records, $base_uri = 'names/all', $page, $limit);
			
			//Getting all names from db
			$names = NamesQuery::getInstance()->get(0, $pagination['offset'], $limit);
			
			//Creating hit list 
			$hit_list = View('pages/names/partials/hit-list')->with('data', array('pagination' => $pagination, 'names' => $names));

			//Generating the view
			return View('pages/names/all')->with('hit_list', $hit_list);
		}//END function all

		
		
		/**
		 * Adding new name
		 * @input: 
		 *		$request: object - posted data
		 * @return 
		 *		add new name page's View		 
		 */
		public function add(Request $request) 
		{ 	
			$post = $request->post();
		
			if ( count($post) > 0 ) {
				//Validation POST-ed data
				$validation = new NamesValidator;
				$this->validate($request, $validation->rules()); 
				
				//If data valid then inserting into DB
				$result = NamesQuery::add(array('first_name' => $post['first_name'], 'last_name' => $post['last_name']));
				
				//Redirecting back to clear POST values
				if ($result) {
					return Redirect::back();
				}
			}
			
			return View('pages/names/add');
		}//END function add

		
		
		/**
		 * Getting names by search parameters
		 * @input: 
		 *		$request: object - posted data
		 * @return 
		 *		list of names	 
		 */
		public function search(Request $request) 
		{ 				
			//Getting posted data
			$post = $request->post();
			
			//Init
			$names = $pagination = array();

			//Getting seaarch result
			if ( isset($post['search_value']) and strlen($post['search_value']) > 0 ) {	
				$limit = 25; 
				$page = isset($post['page']) ? $post['page'] : 1;
			
				#Counting records of search result
				$all_records = NamesQuery::getInstance()->getSearchResult($post['search_value'], $post['duplicates'], true);
				
				#Setting pagination
				$pagination = Pagination::set($all_records, $base_uri = 'names/search', $page, $limit, 'ajax');
				
				#Getting records of search result
				$names = NamesQuery::getInstance()->getSearchResult($post['search_value'], $post['duplicates'], false, $pagination['offset'], $limit);
			}

			//Echo view of search result
			echo View('pages/names/partials/hit-list')->with('data', array('names' => $names, 'pagination' => $pagination));
		}//END function search		
		
		
	}//END class NamesController
	