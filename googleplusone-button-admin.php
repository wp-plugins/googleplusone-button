<?php
/**
 * @package Google Plusone(+1) Button
 * @version 1.0
 * @author Sagar Bhandari <webgig.sagar@gmail.com>
 */


function twg_gpo_admin_menu() {
	add_options_page('Google +1 Button', 'Google +1 Button', 'administrator','gpo-button', 'gpo_admin_page');
}


function gpo_admin_page() {

	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	$msg = '';

	if(!empty($_POST)){
		
		if($_POST['twg_gpo_include_count'] === 'true'){
			$include_count = 'true';
		} else {
			$include_count = 'false';
		}
		
		update_option('twg_gpo_button_size', $_POST['twg_gpo_button_size']);
		update_option("twg_gpo_include_count", $include_count);
		update_option("twg_gpo_button_location", $_POST['twg_gpo_button_location']);
		update_option("twg_gpo_button_language", $_POST['twg_gpo_lang']);
		update_option("twg_gpo_button_display_in", $_POST['twg_gpo_button_display_in']);
		
		$msg  = 'Settings Saved!';
		unset($_POST);
		
	}
	
	$twg_gpo_button_size       = get_option('twg_gpo_button_size');
	$twg_gpo_include_count     = get_option('twg_gpo_include_count');
	$twg_gpo_button_location   = get_option('twg_gpo_button_location');
	$twg_gpo_button_language   = get_option('twg_gpo_button_language');
	$twg_gpo_button_display_in = get_option('twg_gpo_button_display_in');
	
?>

<?php wp_enqueue_script( 'jquery' ); ?>

<div class="wrap">

	<?php if($msg){ ?>
        <div class="updated" id="message"><p><?php echo $msg; ?></p></div>
    <?php } ?>


	<h2><img src="<?php echo get_bloginfo('url').'/wp-content/plugins/googleplusone-button/images/+1.jpg'; ?>"  /> Google +1 Button</h2>
	
    
    <div id="options">
		<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
		 
        <div class="element">
            <label>
                Button Size:
            </label>
            <?php $var = $twg_gpo_button_size; $$var = 'selected="selected"'; ?>
            <select name="twg_gpo_button_size" id="twg_gpo_button_size">
                <option <?php echo $standard; ?> value="standard">Standard</option>
                <option <?php echo $small; ?> value="small">Small</option>
                <option <?php echo $medium; ?> value="medium">Medium</option>
                <option <?php echo $tall; ?> value="tall">Tall</option>
            </select>
		</div>
		
		<div class="element">
			<label>Include Count: </label>
			<input type="checkbox" name="twg_gpo_include_count" id="twg_gpo_include_count" value="true" <?php if($twg_gpo_include_count) echo 'checked="checked"'; ?> />
		</div>
        

		<div class="element">	
			<label>Button Location:</label> 
			<?php $var = $twg_gpo_button_location; $$var = 'selected="selected"'; ?>
			<select name="twg_gpo_button_location" id="twg_gpo_button_location">
				<option <?php echo $top; ?> value="top">Top of Post</option>
				<option <?php echo $bottom; ?>  value="bottom">Bottom of Post</option>
				<option <?php echo $both; ?> value="both">Top and Bottom</option>
				<option <?php echo $left; ?> value="left">Floating Left Side</option>
			</select>
		</div>
        
        <div class="element">	
			<label>Display In:</label> 
			<?php $var = $twg_gpo_button_display_in; $$var = 'selected="selected"'; ?>
			<select name="twg_gpo_button_display_in" id="twg_gpo_button_display_in">
                <option <?php echo $posts; ?> value="posts">Posts</option>
				<option <?php echo $page; ?>  value="page">Page</option>				
                <option <?php echo $single; ?> value="single">Single</option>
				<option <?php echo $all; ?> value="all">All</option>
			</select>
		</div>
        
        
       
        
       <!-- <div class="element">	
			<label>Button Language:</label>
			<select id="twg_gpo_button_language"  name="twg_gpo_button_language" >
                    
             </select>
		</div>-->
		<div><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></div>
       
		</form>	
        <div class="notes">
       	 <h4>Manual Use</h4>
         <p> Google +1 Button can be used inside your posts or pages using template tag and shortcode. </p>
         	
         <dl>
            <dt>Template Tag</dt>
            <dd><code>&lt;?php if(function_exists('twg_gpo_button')) twg_gpo_button();?&gt; </code></dd>
            <dt>Shortcode </dt>
            <dd><code>[twg_gpo_button]</code></dd>

         </ul>
        </div>	
	</div>
    
	
	<div id="preview_pane">
           <h3>Preview</h3>
          
            
           <div class="post-class" id="post-39">
			<h2 class="entry-title">What is Lorem Ipsum</h2>

			<div class="entry-meta">
				<span class="meta-prep meta-prep-author">Posted on</span> 
                <span class="entry-date">July 5, 2011</span></a> 
                <span class="meta-sep">by</span>
                <span class="author vcard">admin</span></div>
 				
                <div id="preview_button_up" class="gpo_bottomcontainer">
                		<div id="preview_button_container_up"  class="previewbtn"></div>
           		</div>
                
                <div class="entry-content">
                 
                     <div id="preview_button_left" class="gpo_leftcontainer">
                        <div id="preview_button_container_left"  class="previewbtn"></div>
                     </div>
                 
   					 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                     Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                     It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                     It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                     and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			    </div>
			     <div style="clear:both"></div>
			 </div>
	 			
            <div id="preview_button_down" class="gpo_bottomcontainer">
                    <div id="preview_button_container_down"  class="previewbtn"></div>
            </div>
                
			<div class="entry-utility">
                    <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links">Posted in</span> Uncategorized</span>
					<span class="meta-sep">|</span>
					<span class="comments-link">Leave a comment</span>
				    <span class="meta-sep">|</span> <span class="edit-link"</span>
            </div>
		    
            <div class="notes" style="font-size:11px"> <strong>Note:-</strong> The actual view in your website might a bit differernt than what you see here. This is just a rough preview</div>
            </div>
   </div>
	
	<div id="donate"><h3>Donate Us</h3>
       <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="JSTVUUXEJU2D6">
            <input type="hidden" name="on0" value="Help The Developer">
          
            <div  id="">
             <select name="os0">
                <option value="Donate">Donate $5.00</option>
                <option value="Donate">Donate $10.00</option>
                <option value="Donate">Donate $15.00</option>
            </select> 
            </div>
            <input type="hidden" name="currency_code" value="USD">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
            </form>

	</form>
	</div>
</div>
<?php } ?>
