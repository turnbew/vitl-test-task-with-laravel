<?php

namespace App\Http\Controllers\Test;


use App\Http\Requests\FormValidatorMembersPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

		
		
		
		class MembersController extends Controller {
			

			
			/**
			 * Redirect to home page or returns the specified blade
			 *
			 * @input: $action - from url members/{$actioin}
			 *
			 * @return blade or redirect
			 */
			public function getBlade($action, $data = array()) {
				
				switch ($action) {
					case "insert": 
					case "select": 
							$schools = DB::table('t_schools')->select('id', 'name')->orderBy('name', 'asc')->get();
							$all = array('schools' => $schools, 'data' => $data);
 							return view('pages/members/' . $action, compact('all'));
						break;
					default: 
						return redirect('/');
				}
				
			}

			
			
			
			
			
			/**
			 * Database actions if the request was a GET request - insert, select, ...
			 *
			 * @input: $action - from url members/{$actioin}
			 *
			 * @return: void
			 */	
			public function getDbActions($action, $schools_id, $current_page) {
				switch($action) {
					case 'select' : 
							return $this->select(array(), $schools_id, $current_page);
						break;
					default: 
						return redirect('/');
				}
				
			}

			
			
			
			
			
			/**
			 * Database actions if the request was a POST request - insert, select, ...
			 *
			 * @input: $action - from url members/{$actioin}
			 *
			 * @return: void
			 */	
			public function postDbActions($action, Request $request) {
				switch($action) {
					case 'insert' :
								$validation = new FormValidatorMembersPost;
								$this->validate($request, $validation->rules()); 
								$email_exists = DB::table('t_members')
														->select(DB::raw('count(*) as c'))
														->where('email', '=', trim(strtolower($request['email'])))
														->groupBy('email')
														->pluck('c');
								return (count($email_exists) > 0) 
											? redirect('/members/insert')
														->with('warning_msg', 'This e-mail address is already taken!')
														->withInput()
														->with('schools_id', $request['school'])
											: $this->insert($request); 
						break;
					case 'select' : 
							return $this->select($request);
						break;
					default: 
						return redirect('/');
				}
				
			}
			
			
			
			
			
			/**
			 * Database actions - insert data to t_members database
			 *
			 * @input: $request - authorized and validated request
			 *
			 * @return: redirection to the insert member page
			 */	
			private function insert($request) {
				
				DB::table('t_members')->insert([
					'email' 		=> trim(strtolower($request['email'])), 
					'name' 			=> $request['name'], 
					'schools_id' 	=> $request['school'] 
				]);

				return redirect('/members/insert')
							->with('success_members', "Member's data saved!")
							->with('schools_id', $request['school']);
			}
			
			
			
			
			
			
			
			
			
			
			/**
			 * Database actions - select members from t_members table by schools_id
			 *
			 * @input: $request - authorized and validated request
			 *
			 * @return: redirection to the listing members page
			 */	
			private function select($request = array(), $schools_id = 0, $current_page = 0) {

				$offset = ($current_page > 0) ? ($current_page * 10) - 10 : $current_page;
				$school = (count($request) > 0) ? $request['school'] : $schools_id;
				$return = array();
				$return['hits'] = DB::table('t_members')->where('schools_id', $school)->count();
				$return['members'] = DB::table('t_members')
								->select('name', 'email')
								->where('schools_id', $school)
								->offset($offset)
								->limit(10)
								->get();
				$return['pages'] = ceil($return['hits'] / 10);
				$return['current'] = $current_page == 0 ? 1 : $current_page;
				$return['schools_id'] = $school;
				$return['offset'] = $offset; 
				
				return $this->getBlade('select', $return);
			}
			
		}//END class
		