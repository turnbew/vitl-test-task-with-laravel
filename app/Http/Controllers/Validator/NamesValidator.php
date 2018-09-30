<?php

	namespace App\Http\Controllers\Validator;

	
	use Illuminate\Foundation\Http\FormRequest;


	class NamesValidator extends FormRequest
	{



		/**
		 * Determine if the user is authorized to make this request.
		 *
		 * @return bool
		 */
		public function authorize() 
		{	
			return true;
		}

		

		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array
		 */
		public function rules() {
			
			return [
				'first_name' => 'required|max:40',
				'last_name' => 'required|max:40',
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
				'first_name.required' 	=> 'First Name field is required!',
				'first_name.max'  		=> 'Max length of the First Name can be 40 chars!',
				'last_name.required' 	=> 'Last Name field is required!',
				'last_name.max'  		=> 'Max length of the Last Name can be 40 chars!',
			];
		}

		
		
	}//END class NamesValidator
