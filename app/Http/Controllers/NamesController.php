<?php

	namespace App\Http\Controllers;

	
	use App\Http\Controllers\Validator\NamesValidator;
	use App\Http\Controllers\Query\NamesQuery;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Redirect;


	class NamesController extends Controller 
	{	

		
		/**
		 * Listing all names
		 * @input: 
		 *		$page: int - selected page
		 * @return 
		 *		all names page's View
		 */
		public function all($page = 1, $limit = 25) 
		{	
			$data = array();
			$data['pagination']['all_records'] = NamesQuery::countAll();
			$data['pagination']['pages'] = ceil($data['pagination']['all_records'] / $limit);
			$data['pagination']['page'] = $page;
			$data['pagination']['limit'] = $limit;
			$data['pagination']['page_url'] = 'names/all';
			$data['pagination']['offset'] = ($page - 1) * $limit;
			$data['pagination']['type'] = 'php';
			$data['names'] = NamesQuery::get(0, $data['pagination']['offset'], $limit);
						
			$hit_list =View('pages/names/hit-list')->with('data', $data);

			return View('pages/names/all')->with('hit_list', $hit_list);
		}

		
		
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
		}

		
		
		/**
		 * Getting names by search parameters
		 * @input: 
		 *		$request: object - posted data
		 * @return 
		 *		list of names	 
		 */
		public function search(Request $request) 
		{ 				
			$post = $request->post();
			$data = array();
			$limit = 10; 
			$page = isset($post['page']) ? $post['page'] : 1;
			
			if ( isset($post['search_value']) and strlen($post['search_value']) > 0 ) {
				$data['pagination']['all_records'] = NamesQuery::getSearchResult($post['search_value'], $post['duplicates'], true);
				$data['pagination']['pages'] = ceil($data['pagination']['all_records'] / $limit);
				$data['pagination']['page'] = $page;
				$data['pagination']['limit'] = $limit;
				$data['pagination']['offset'] = ($page - 1) * $limit;
				$data['pagination']['page_url'] = 'names/search';
				$data['pagination']['type'] = 'ajax'; 
				
				$data['names'] = NamesQuery::getSearchResult($post['search_value'], $post['duplicates'], false, $data['pagination']['offset'], $limit);
			}

			echo ( isset($data['names']) and count($data['names']) > 0 ) ? View('pages/names/hit-list')->with('data', $data) : "";
		}		
		
		
	}//END class NamesController
	