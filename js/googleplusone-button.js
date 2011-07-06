/**
 * @package Google Plusone(+1) Button
 * @version 1.0.1
 * @author Sagar Bhandari <webgig.sagar@gmail.com>
 */
 
jQuery(document).ready(function() {
		gpo_button_display();
	
		jQuery('#twg_gpo_button_size').change(function() {
			gpo_button_display();
		});
		
		jQuery('#twg_gpo_include_count').change(function() {
			gpo_button_display();
		});
		
		
		jQuery('#twg_gpo_button_location').change(function() {
	  		//var location = jQuery("#twg_gpo_button_location option:selected").val();
			gpo_button_display();
		});
});
	
function gpo_button_display() {
	var include_count;
	
	if(jQuery("#twg_gpo_include_count ").is(':checked')){
		 include_count = 'true';
	} else {
		 include_count = 'false';	  	
	}	  		
	
	var location = jQuery("#twg_gpo_button_location option:selected").val();
	
	jQuery('.previewbtn').html('');
	jQuery('.previewbtn').removeAttr('style');   
	jQuery('#preview_button_left').removeClass('gpo_leftcontainer');
	jQuery('#preview_button_top').removeClass('gpo_bottomcontainer');
	jQuery('#preview_button_down').removeClass('gpo_bottomcontainer');	
		
	if(location=='top'){ 
	  jQuery('#preview_button_top').addClass('gpo_bottomcontainer');
	  gapi.plusone.render("preview_button_container_up", {"size":  jQuery("#twg_gpo_button_size option:selected").val(), "count": include_count});
	}
	
	if(location=='bottom'){	  
	 jQuery('#preview_button_down').addClass('gpo_bottomcontainer');
	  gapi.plusone.render("preview_button_container_down", {"size":  jQuery("#twg_gpo_button_size option:selected").val(), "count": include_count});
	}
	
	if(location=='left'){
	  jQuery('#preview_button_left').addClass('gpo_leftcontainer');
	  gapi.plusone.render("preview_button_container_left", {"size":  jQuery("#twg_gpo_button_size option:selected").val(), "count": include_count});
	
	}
	
	if(location=='both'){ 
	  jQuery('#preview_button_top').addClass('gpo_bottomcontainer');
	  jQuery('#preview_button_down').addClass('gpo_bottomcontainer');
	
	  gapi.plusone.render("preview_button_container_up", {"size":  jQuery("#twg_gpo_button_size option:selected").val(), "count": include_count});
	  gapi.plusone.render("preview_button_container_down", {"size":  jQuery("#twg_gpo_button_size option:selected").val(), "count": include_count});
	}
}
