
	//WHEN DOM is ready
	$(function() {

		//Controll part for search input value changes
		if ( $('input[name="search_value"]') ) {
			var textSaveTimeOutId;
			
			$(document).on('input propertychange change', 'input[name="search_value"], select[name="duplicates"]', function() {	
				clearTimeout(textSaveTimeOutId);
				
				textSaveTimeOutId = setTimeout(function() {
					var data = {
						'search_value' : $('input[name="search_value"]').val(), 
						'duplicates' : $('select[name="duplicates"]').val(),
					}
					
					AJAX.call('/names/search', data, function(response) {
						$('div.hits-container').html(response);
					})				
				}, 500);
			})
		}//END if if ( $('input[name="search_value"]') )
		
	
		//Controll part for ajax pagination
		$(document).on('click', 'span.page-link', function(event) {	
			event.preventDefault();
			
			var $this = $(this);
			var data = {
				'search_value' : $('input[name="search_value"]').val(), 
				'duplicates' : $('select[name="duplicates"]').val(),
				'page' : $this.data('page'),
			}

			AJAX.call('/names/search', data, function(response) {
				$('div.hits-container').html(response);
			})				
		})

	})