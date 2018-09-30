
		/*
		 *	Callable variables
		 *
		 *	AJAX.asynch	- boolean, default value true - can be true or false 		 
		 *	AJAX.method 	- string, default value POST - can be GET, POST, PUT
		 *	AJAX.base_url	- string, default value = BASE_URI
		 *	AJAX.data	- string or object, default value empty object {} 	
		 *	AJAX.data_type	- string, default value text, can be text, xml, json, script or html
		 *	AJAX.success	- function, default: empty function
		 *	AJAX.error	- function, default: function(response) {console.log(response);alert('Something went wrong. Please, try again!');};
		 *	AJAX.complete	- function, default: empty function
		 *	AJAX.cache	- boolean, default: false - can be true or false
		 *	
		 *	
		 *	Callable functions
		 *	
		 * 	AJAX.__construct(VOID) : VOID
		 *	AJAX.call(request_url, sent_params, callback_success_fn, callback_error_fn, callback_complete_fn)
		 *	
		*/

		var AJAX;
		
		(function($) {
				
			$.object_ajax = {
				
				//variables
				default_async				:	true,			//true or false - false is depricated, recommended true
				default_mehtod 				:	"POST",			//POST or GET
				default_base_url			:	"",		
				default_data				:	{},				//Can be anything, default is an empty object
				default_data_type			:	"text",			//text, xml, json, script or html
				default_success_function	:	function(){},	//function will be evaulated if call was succes	
				default_error_function		:	function(){},	//function will be evaulated if call caused error
				default_complete_function	:	function(){},	//function will be evaulated if call was completed
				default_cache				:	false,
				
				

				
				//functions
				/*
				 * Just makes some initialization, not necessary to use 
				 *
				 * @input: VOID
				 *
				 * @output: VOID
				*/
				__construct : function () 
				{
					AJAX.default_base_url = ( $('#hdn_base_url').val() != undefined ) ? $('#hdn_base_url').val() : "/";			
					AJAX.default_error_function = function(response) {console.log(response);};
					AJAX.default_method = "POST";
					AJAX.default_data_type = "text";	
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
				},	
				
				
				
				
				/*
				 * Makes a beautiful AJAX call using jQuery
				 *
				 * @input: (there's no Dependency Injection - params order important) 
				 *	- request_url: STRING, required : url to the server side script
				 *	- sent_params: ANY, non required, default value is {} : passed data to server side script
				 * 	- callback_success: FUNCTION non required, default is empty function : callback function which will be evaulated when ajax call was success
				 * 	- callback_error: FUNCTION non required, default is empty function : callback function which will be evaulated when ajax call produced error
				 * 	- callback_complete: FUNCTION non required, default is empty function : callback function which will be evaulated when ajax call was completed
				 *
				 * @output: VOID or returns response (if call is synchronous - not recommended)
				*/
				call : function(request_url, sent_params, callback_success, callback_error, callback_complete)
				{
					var data 		= (sent_params != undefined) 		? sent_params 		: AJAX.default_data;
					var fn_succes 	= (callback_success != undefined) 	? callback_success 	: AJAX.default_success_function;
					var fn_error 	= (callback_error != undefined) 	? callback_error 	: AJAX.default_error_function;
					var fn_complete = (callback_complete != undefined)	? callback_complete	: AJAX.default_complete_function;
					var response 	= $.ajax({
										url 	: AJAX.default_base_url + request_url, 
										type 	: AJAX.default_method,
										data 	: data,			
										dataType: AJAX.default_data_type,
										async	: true,
										success	: fn_succes, 
										error	: fn_error,
										complete: fn_complete
									});		
					if (!AJAX.default_async) return $.trim(response);
				},
				
				
				
			}; //END $.object_ajax object

			
			//Global variables
			AJAX = 	$.object_ajax;
			
			
		})(jQuery);


		//when DOM is loaded
		$(function() {
			//Initialization
			AJAX.__construct();
		})
