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
            <td>Discount 10%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-10"])) echo pricingtable_plugin_url."css/ribbons/dis-10.png";  else echo $pricingtable_ribbons["dis-10"]; ?>"  /></td>
            <td><input size="50%"  name="pricingtable_ribbons[dis-10]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-10"])) echo pricingtable_plugin_url."css/ribbons/dis-10.png";  else echo $pricingtable_ribbons["dis-10"]; ?>"  /></td>
            </tr>




        	<tr>
            <td>Discount 20%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-20"])) echo pricingtable_plugin_url."css/ribbons/dis-20.png";  else echo $pricingtable_ribbons["dis-20"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-20]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-20"])) echo pricingtable_plugin_url."css/ribbons/dis-20.png";  else echo $pricingtable_ribbons["dis-20"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Discount 30%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-30"])) echo pricingtable_plugin_url."css/ribbons/dis-30.png";  else echo $pricingtable_ribbons["dis-30"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-30]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-30"])) echo pricingtable_plugin_url."css/ribbons/dis-30.png";  else echo $pricingtable_ribbons["dis-30"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Discount 40%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-40"])) echo pricingtable_plugin_url."css/ribbons/dis-40.png";  else echo $pricingtable_ribbons["dis-40"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-40]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-40"])) echo pricingtable_plugin_url."css/ribbons/dis-40.png";  else echo $pricingtable_ribbons["dis-40"]; ?>"  /></td>
            </tr>


        	<tr>
            <td>Discount 50%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-50"])) echo pricingtable_plugin_url."css/ribbons/dis-50.png";  else echo $pricingtable_ribbons["dis-50"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-50]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-50"])) echo pricingtable_plugin_url."css/ribbons/dis-50.png";  else echo $pricingtable_ribbons["dis-50"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Discount 60%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-60"])) echo pricingtable_plugin_url."css/ribbons/dis-60.png";  else echo $pricingtable_ribbons["dis-60"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-60]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-60"])) echo pricingtable_plugin_url."css/ribbons/dis-60.png";  else echo $pricingtable_ribbons["dis-60"]; ?>"  /></td>
            </tr>
            



        	<tr>
            <td>Discount 70%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-70"])) echo pricingtable_plugin_url."css/ribbons/dis-70.png";  else echo $pricingtable_ribbons["dis-70"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-70]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-70"])) echo pricingtable_plugin_url."css/ribbons/dis-70.png";  else echo $pricingtable_ribbons["dis-70"]; ?>"  /></td>
            </tr>




        	<tr>
            <td>Discount 80%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-80"])) echo pricingtable_plugin_url."css/ribbons/dis-80.png";  else echo $pricingtable_ribbons["dis-80"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-80]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-80"])) echo pricingtable_plugin_url."css/ribbons/dis-80.png";  else echo $pricingtable_ribbons["dis-80"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>Discount 90%</td>
            <td><img title="size - 90px * 24px " src="<?php if(empty($pricingtable_ribbons["dis-90"])) echo pricingtable_plugin_url."css/ribbons/dis-90.png";  else echo $pricingtable_ribbons["dis-90"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-90]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-90"])) echo pricingtable_plugin_url."css/ribbons/dis-90.png";  else echo $pricingtable_ribbons["dis-90"]; ?>"  /></td>
            </tr>
            
            
            
        	<tr>
            <td>Discount 100%</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["dis-100"])) echo pricingtable_plugin_url."css/ribbons/dis-100.png";  else echo $pricingtable_ribbons["dis-100"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[dis-100]" type="text" value="<?php if(empty($pricingtable_ribbons["dis-100"])) echo pricingtable_plugin_url."css/ribbons/dis-100.png";  else echo $pricingtable_ribbons["dis-100"]; ?>"  /></td>
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



        	<tr>
            <td>new</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["new"])) echo pricingtable_plugin_url."css/ribbons/new.png";  else echo $pricingtable_ribbons["new"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[new]" type="text" value="<?php if(empty($pricingtable_ribbons["new"])) echo pricingtable_plugin_url."css/ribbons/new.png";  else echo $pricingtable_ribbons["new"]; ?>"  /></td>
            </tr>




        	<tr>
            <td>Pro</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["pro"])) echo pricingtable_plugin_url."css/ribbons/pro.png";  else echo $pricingtable_ribbons["pro"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[pro]" type="text" value="<?php if(empty($pricingtable_ribbons["pro"])) echo pricingtable_plugin_url."css/ribbons/pro.png";  else echo $pricingtable_ribbons["pro"]; ?>"  /></td>
            </tr>

         






        	<tr>
            <td>sale</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["sale"])) echo pricingtable_plugin_url."css/ribbons/sale.png";  else echo $pricingtable_ribbons["sale"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[sale]" type="text" value="<?php if(empty($pricingtable_ribbons["sale"])) echo pricingtable_plugin_url."css/ribbons/sale.png";  else echo $pricingtable_ribbons["sale"]; ?>"  /></td>
            </tr>



        	<tr>
            <td>save</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["save"])) echo pricingtable_plugin_url."css/ribbons/save.png";  else echo $pricingtable_ribbons["save"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[save]" type="text" value="<?php if(empty($pricingtable_ribbons["save"])) echo pricingtable_plugin_url."css/ribbons/save.png";  else echo $pricingtable_ribbons["save"]; ?>"  /></td>
            </tr>

 
        	<tr>
            <td>Top</td>
            <td><img title="size - 90px × 24px " src="<?php if(empty($pricingtable_ribbons["top"])) echo pricingtable_plugin_url."css/ribbons/top.png";  else echo $pricingtable_ribbons["top"]; ?>"  /></td>
            <td><input size="50%" name="pricingtable_ribbons[top]" type="text" value="<?php if(empty($pricingtable_ribbons["top"])) echo pricingtable_plugin_url."css/ribbons/top.png";  else echo $pricingtable_ribbons["top"]; ?>"  /></td>
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
