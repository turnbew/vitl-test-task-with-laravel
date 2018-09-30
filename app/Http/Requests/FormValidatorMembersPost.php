<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class FormValidatorMembersPost extends FormRequest
{



	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		
		return true;

	}




	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		
		return [
			'name' 		=> 	'required|max:100',
			'email' 	=> 	'required|email|max:80',
			'school' 	=> 	'not_in:not_selected',
		];
		
		
	}





	/**
	* Get the error messages for the defined validation rules.
	*
	* @return array
	*/
	public function messages()
	{
		return [
			'name.required' 	=> 'Name field is required!',
			'name.max'  		=> 'Max length of Name is 100 chars!',
			'email.required'  	=> 'E-mail address field is required!',
			'email.email'  		=> 'E-mail address format is not valid!',
			'email.max'  		=> 'Max length of E-mail address is 100 chars!',
			'school.not_in'  		=> 'Please, select a school!',
		];
	}

}