<?php	

	if(empty($_POST['pricingtable_hidden']))
		{
			$pricingtable_ribbons = get_option( 'pricingtable_ribbons' );
			
			
		}
	else
		{
					
				
		if($_POST['pricingtable_hidden'] == 'Y') {
			//Form data sent

			$pricingtable_ribbons = stripslashes_deep($_POST['pricingtable_ribbons']);
			update_option('pricingtable_ribbons', $pricingtable_ribbons);
			
		
			
					

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>

			<?php
		} 
	}
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__('PricingTable Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="pricingtable_hidden" value="Y">
        <?php settings_fields( 'pricingtable_plugin_options' );
				do_settings_sections( 'pricingtable_plugin_options' );
			
		?>
<table class="form-table">





	<tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Ribbons</strong><br /><br /> 
    	<span style=" color:#22aa5d;font-size: 12px;">You can use your own ribbons icon by inserting ribbon url to text field, image size for ribbons must be same as 90px × 24px</span>
        <table>
        
        	<tr>
            <td>Best</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["best"])) echo pricingtable_plugin_url."css/ribbons/best.png";  else echo $pricingtable_ribbons["best"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[best]" type="text" value="<?php if(empty($pricingtable_ribbons["best"])) echo pricingtable_plugin_url."css/ribbons/best.png";  else echo $pricingtable_ribbons["best"]; ?>"  /></td>
            </tr>




        	<tr>
            <td>Free</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["free"])) echo pricingtable_plugin_url."css/ribbons/free.png";  else echo $pricingtable_ribbons["free"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[free]" type="text" value="<?php if(empty($pricingtable_ribbons["free"])) echo pricingtable_plugin_url."css/ribbons/free.png";  else echo $pricingtable_ribbons["free"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Fresh</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["fresh"])) echo pricingtable_plugin_url."css/ribbons/fresh.png";  else echo $pricingtable_ribbons["fresh"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[fresh]" type="text" value="<?php if(empty($pricingtable_ribbons["fresh"])) echo pricingtable_plugin_url."css/ribbons/fresh.png";  else echo $pricingtable_ribbons["fresh"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Gift</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["gift"])) echo pricingtable_plugin_url."css/ribbons/gift.png";  else echo $pricingtable_ribbons["gift"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[gift]" type="text" value="<?php if(empty($pricingtable_ribbons["gift"])) echo pricingtable_plugin_url."css/ribbons/gift.png";  else echo $pricingtable_ribbons["gift"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Hot</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["hot"])) echo pricingtable_plugin_url."css/ribbons/hot.png";  else echo $pricingtable_ribbons["hot"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[hot]" type="text" value="<?php if(empty($pricingtable_ribbons["hot"])) echo pricingtable_plugin_url."css/ribbons/hot.png";  else echo $pricingtable_ribbons["hot"]; ?>"  /></td>
            </tr>

          
        </table>
    
    
    
    
        </td>
    </tr>
</table>






<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


</div>
