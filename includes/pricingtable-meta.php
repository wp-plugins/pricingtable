<?php


function pricingtable_posttype_register() {
 
        $labels = array(
                'name' => _x('PricingTable', 'pricingtable'),
                'singular_name' => _x('PricingTable', 'pricingtable'),
                'add_new' => _x('New PricingTable', 'pricingtable'),
                'add_new_item' => __('New PricingTable'),
                'edit_item' => __('Edit PricingTable'),
                'new_item' => __('New PricingTable'),
                'view_item' => __('View PricingTable'),
                'search_items' => __('Search PricingTable'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'pricingtable' , $args );

}

add_action('init', 'pricingtable_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_pricingtable()
	{
		$screens = array( 'pricingtable' );
		foreach ( $screens as $screen )
			{
				add_meta_box('pricingtable_metabox',__( 'Pricing Table Options','pricingtable' ),'meta_boxes_pricingtable_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_pricingtable' );


function meta_boxes_pricingtable_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_pricingtable_input', 'meta_boxes_pricingtable_input_nonce' );
	
	
	$pricingtable_bg_img = get_post_meta( $post->ID, 'pricingtable_bg_img', true );
	$pricingtable_themes = get_post_meta( $post->ID, 'pricingtable_themes', true );
	$pricingtable_total_row = get_post_meta( $post->ID, 'pricingtable_total_row', true );
	$pricingtable_total_column = get_post_meta( $post->ID, 'pricingtable_total_column', true );
	
	if(empty($pricingtable_total_row))
		{
			$pricingtable_total_row = 7;
		}
		
	if(empty($pricingtable_total_column))
		{
			$pricingtable_total_column = 3;
		}		

	$pricingtable_cell = get_post_meta( $post->ID, 'pricingtable_cell', true );
	
	$pricingtable_column_width = get_post_meta( $post->ID, 'pricingtable_column_width', true );
	$pricingtable_column_featured = get_post_meta( $post->ID, 'pricingtable_column_featured', true );
	$pricingtable_column_ribbon = get_post_meta( $post->ID, 'pricingtable_column_ribbon', true );	
	
	$pricingtable_cell_price_duration = get_post_meta( $post->ID, 'pricingtable_cell_price_duration', true );
	$pricingtable_cell_price = get_post_meta( $post->ID, 'pricingtable_cell_price', true );
	$pricingtable_cell_price_bg_color = get_post_meta( $post->ID, 'pricingtable_cell_price_bg_color', true );	
	
	$pricingtable_cell_signup_bg_color = get_post_meta( $post->ID, 'pricingtable_cell_signup_bg_color', true );
	$pricingtable_cell_signup_button_bg_color = get_post_meta( $post->ID, 'pricingtable_cell_signup_button_bg_color', true );
	$pricingtable_cell_signup_name = get_post_meta( $post->ID, 'pricingtable_cell_signup_name', true );
	$pricingtable_cell_signup_url = get_post_meta( $post->ID, 'pricingtable_cell_signup_url', true );
	
	$pricingtable_cell_header_description = get_post_meta( $post->ID, 'pricingtable_cell_header_description', true );	
	$pricingtable_cell_header_image = get_post_meta( $post->ID, 'pricingtable_cell_header_image', true );
	$pricingtable_cell_header_bg_color = get_post_meta( $post->ID, 'pricingtable_cell_header_bg_color', true );
	$pricingtable_cell_header_text = get_post_meta( $post->ID, 'pricingtable_cell_header_text', true );	
	

   ?>

<table class="form-table">





<tr valign="top">
		<td style="vertical-align:middle;">
        
        <strong>Shortcode</strong><br />
  <span style=" color:#22aa5d;font-size: 12px;">Copy this shortcode and paste on page or post where you want to display pricing table. <br />Use PHP code to your themes file to display pricing table</span>
        
        <br /> <br /> 
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[pricingtable <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br /><br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[pricingtable id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        
 <br />

		</td>
	</tr>









    <tr valign="top">

        <td style="vertical-align:middle;">
        
        <strong>Price table Themes</strong><br /><br /> 
        
        <select name="pricingtable_themes" >
        	<option value="flat" <?php if($pricingtable_themes=="flat")echo "selected"; ?>>Flat</option>
        	<option value="rounded" <?php if($pricingtable_themes=="rounded")echo "selected"; ?>>Rounded</option>
        </select>
        
        </td>
    </tr> 






<script>
jQuery(document).ready(function(jQuery)
	{
			jQuery(".pricingtable_bg_img_list li").click(function()
				{ 	
					jQuery('.pricingtable_bg_img_list li.bg-selected').removeClass('bg-selected');
					jQuery(this).addClass('bg-selected');
					
					var pricingtable_bg_img = jQuery(this).attr('data-url');

					jQuery('#pricingtable_bg_img').val(pricingtable_bg_img);
					
				})	

					
	})

</script>








    <tr valign="top">

        <td style="vertical-align:middle;">
        
        <strong>Price table Background Image</strong><br /><br /> 
        

<?php



	$dir_path = pricingtable_plugin_dir."css/background/";
	$filenames=glob($dir_path."*.png*");


	$pricingtable_bg_img = get_post_meta( $post->ID, 'pricingtable_bg_img', true );
	
	if(empty($pricingtable_bg_img))
		{
		$pricingtable_bg_img = "";
		}


	$count=count($filenames);
	

	$i=0;
	echo "<ul class='pricingtable_bg_img_list' >";

	while($i<$count)
		{
			$filelink= str_replace($dir_path,"",$filenames[$i]);
			
			$filelink= pricingtable_plugin_url."css/background/".$filelink;
			
			
			if($pricingtable_bg_img==$filelink)
				{
					echo "<li class='bg-selected' data-url='".$filelink."'>";
				}
			else
				{
					echo "<li data-url='".$filelink."'>";
				}
			
			
			echo "<img  width='70px' height='50px' src='".$filelink."' />";
			echo "</li>";
			$i++;
		}
		
	echo "</ul>";
	
	echo "<input style='width:80%;' value='".$pricingtable_bg_img."'    placeholder='Please select image or left blank' id='pricingtable_bg_img' name='pricingtable_bg_img'  type='text' />";



?>
        </td>
    </tr> 


















    
<tr valign="top">

        <td style="vertical-align:middle;">
        
        <strong>Total Row</strong><br /><br /> 
        <input class="pricingtable_total_row" name="pricingtable_total_row" type="text" value="<?php echo $pricingtable_total_row; ?>"  />
        
        </td>
    </tr>
    
    
    
<tr valign="top">
        <td style="vertical-align:middle;">
        
        <strong>Total Column</strong><br /><br /> 
        <input class="pricingtable_total_column" name="pricingtable_total_column" type="text" value="<?php echo $pricingtable_total_column; ?>"  />
        
        </td>
    </tr>    
    
    
    
    
    
<tr valign="top">
        <td style="vertical-align:middle;">
        <strong>Table Input</strong><br /><br />

     <div class="pricingtable_admin_cell">
      
      
      
      <?php
      
		$pricingtable_customer_type = get_option('pricingtable_customer_type');

		if($pricingtable_customer_type=="free")
			{
				echo '<script>
					jQuery(document).ready(function()
						{

							jQuery(".pricingtable_column_width, .pricingtable_cell_header_bg_color, .pricingtable_cell_price_bg_color, .pricingtable_cell_signup_bg_color").attr("title","Only For Premium Version")
							jQuery(".pricingtable_column_width, .pricingtable_cell_header_bg_color, .pricingtable_cell_price_bg_color, .pricingtable_cell_signup_bg_color").attr("disabled","disabled")
						
						})
	 				</script>';
      
			}
		elseif($pricingtable_customer_type=="pro")
			{
				//premium customer support.
			}
	  


$pricingtable_admin_cell = "";
$pricingtable_admin_cell .= '<table id="pricingtable_admin" border="0" post_id="'.$post->ID.'">';


for($j=1; $j<=$pricingtable_total_row; $j++)
  {
	  if($j==1)
	  	{
			$pricingtable_admin_cell .=  "<tr class='nosort pricingtable_admin_tr_".$j."' row_id='".$j."' >";
		}

	else
		{
			$pricingtable_admin_cell .=  "<tr  class='pricingtable_admin_tr_".$j."' row_id='".$j."' >";
		}

  
		for($i=1; $i<=$pricingtable_total_column; $i++)
			{
				
				
				if(empty($pricingtable_cell_header_text[$i]))
					{
						$pricingtable_cell_header_text[$i] ="";
					}				
				
				if(empty($pricingtable_cell_header_description[$i]))
					{
						$pricingtable_cell_header_description[$i] ="";
					}				
				
				if(empty($pricingtable_cell_header_bg_color[$i]))
					{
						$pricingtable_cell_header_bg_color[$i] ="";
					}
				
				if(empty($pricingtable_cell_header_image[$i]))
					{
						$pricingtable_cell_header_image[$i] ="";
					}				
				
				if(empty($pricingtable_column_width[$i]))
					{
						$pricingtable_column_width[$i] ="";
					}				
				
				
				if(empty($pricingtable_cell_price_bg_color[$i]))
					{
						$pricingtable_cell_price_bg_color[$i] ="";
					}				
				
				
				if(empty($pricingtable_cell_price[$i]))
					{
						$pricingtable_cell_price[$i] ="";
					}				
				
				if(empty($pricingtable_cell_signup_bg_color[$i]))
					{
						$pricingtable_cell_signup_bg_color[$i] ="";
					}				
				
				
				if(empty($pricingtable_cell_signup_name[$i]))
					{
						$pricingtable_cell_signup_name[$i] ="";
					}				
				
				if(empty($pricingtable_cell_signup_url[$i]))
					{
						$pricingtable_cell_signup_url[$i] ="";
					}				
				
				if(empty($pricingtable_cell_price_duration[$i]))
					{
						$pricingtable_cell_price_duration[$i] ="";
					}				
				
				
				
				
				
				
				
				
				
				
				
				
				
				if($i==1 && $j==1)
					{
						$pricingtable_admin_cell .=  "<td class='nosort pricingtable_admin_td_".$i."' column_id='".$j."-".$i."' >";
						
					$pricingtable_admin_cell .=  "<div title='Double click to expand or collapse' class='header-pack lock'>Featured Column<br /><br /><input class='pricingtable_column_featured' id='pricingtable_column_featured[".$i."]' name='pricingtable_column_featured[".$i."]'  size='20' type='checkbox' value='1' ";
						
					if(!empty($pricingtable_column_featured[$i]))
						{
						$pricingtable_admin_cell .=  " checked='checked'/><label title='Click to remove featured column.' for='pricingtable_column_featured[".$i."]'>Remove Featured</label>";
						}
					else
						{
						$pricingtable_admin_cell .=  " /><label title='Select to make featured column.' for='pricingtable_column_featured[".$i."]'>Make Featured</label>";
						}

					
					$pricingtable_admin_cell .=  "<br />";
						
						$pricingtable_admin_cell .=  '<br />Column Ribbons<br />
							<select name="pricingtable_column_ribbon['.$i.']" >';
							
								if(empty($pricingtable_column_ribbon[$i]))
									{
										$pricingtable_column_ribbon[$i] = "";
									}
								$pricingtable_admin_cell .=  '<option value="none" '.(($pricingtable_column_ribbon[$i]=="none" ) ? "selected" : "").' >None</option>';
								$pricingtable_admin_cell .=  '<option value="free" '.(($pricingtable_column_ribbon[$i]=="free" ) ? "selected" : "").' >Free</option>';
								$pricingtable_admin_cell .=  '<option value="save" '.(($pricingtable_column_ribbon[$i]=="save" ) ? "selected" : "").' >Save</option>';								
								$pricingtable_admin_cell .=  '<option value="hot" '.(($pricingtable_column_ribbon[$i]=="hot" ) ? "selected" : "").' >Hot</option>';
								$pricingtable_admin_cell .=  '<option value="pro" '.(($pricingtable_column_ribbon[$i]=="pro" ) ? "selected" : "").' >Pro</option>';								
								$pricingtable_admin_cell .=  '<option value="best" '.(($pricingtable_column_ribbon[$i]=="best" ) ? "selected" : "").' >Best</option>';
								$pricingtable_admin_cell .=  '<option value="gift" '.(($pricingtable_column_ribbon[$i]=="gift" ) ? "selected" : "").' >Gift</option>';
								$pricingtable_admin_cell .=  '<option value="sale" '.(($pricingtable_column_ribbon[$i]=="sale" ) ? "selected" : "").' >Sale</option>';																
								$pricingtable_admin_cell .=  '<option value="new" '.(($pricingtable_column_ribbon[$i]=="new" ) ? "selected" : "").' >New</option>';	
								$pricingtable_admin_cell .=  '<option value="top" '.(($pricingtable_column_ribbon[$i]=="top" ) ? "selected" : "").' >Top</option>';
								$pricingtable_admin_cell .=  '<option value="fresh" '.(($pricingtable_column_ribbon[$i]=="fresh" ) ? "selected" : "").' >Fresh</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_10" '.(($pricingtable_column_ribbon[$i]=="dis_10" ) ? "selected" : "").' >-10%</option>';								
								$pricingtable_admin_cell .=  '<option value="dis_20" '.(($pricingtable_column_ribbon[$i]=="dis_20" ) ? "selected" : "").' >-20%</option>';
								$pricingtable_admin_cell .=  '<option value="dis_30" '.(($pricingtable_column_ribbon[$i]=="dis_30" ) ? "selected" : "").' >-30%</option>';
								$pricingtable_admin_cell .=  '<option value="dis_40" '.(($pricingtable_column_ribbon[$i]=="dis_40" ) ? "selected" : "").' >-40%</option>';
								
								$pricingtable_admin_cell .=  '<option value="dis_50" '.(($pricingtable_column_ribbon[$i]=="dis_50" ) ? "selected" : "").' >-50%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_60" '.(($pricingtable_column_ribbon[$i]=="dis_60" ) ? "selected" : "").' >-60%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_70" '.(($pricingtable_column_ribbon[$i]=="dis_70" ) ? "selected" : "").' >-70%</option>';									
								
								$pricingtable_admin_cell .=  '<option value="dis_80" '.(($pricingtable_column_ribbon[$i]=="dis_80" ) ? "selected" : "").' >-80%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_90" '.(($pricingtable_column_ribbon[$i]=="dis_90" ) ? "selected" : "").' >-90%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_100" '.(($pricingtable_column_ribbon[$i]=="dis_100" ) ? "selected" : "").' >-100%</option>';									
								
									
							$pricingtable_admin_cell .=  '</select><br />';
							
							
							
							
						
						$pricingtable_admin_cell .=  "<br />Header Background Color<br /><input class='pricingtable_cell_header_bg_color' name='pricingtable_cell_header_bg_color[".$i."]'  size='20' type='text' value='".$pricingtable_cell_header_bg_color[$i]."' /><br />";
						
						
						
						
						
					$pricingtable_admin_cell .=  "<br />Header Image or Video(url)<br /><input class='pricingtable_cell_header_image' name='pricingtable_cell_header_image[".$i."]'  size='20' type='text' value='".$pricingtable_cell_header_image[$i]."' /><br />";	
						
					$pricingtable_admin_cell .=  "<br />Header Description Text<br /><input class='pricingtable_cell_header_description' name='pricingtable_cell_header_description[".$i."]'  size='20' type='text' value='".$pricingtable_cell_header_description[$i]."' /><br />";
					
					
						$pricingtable_admin_cell .=  "<br />Column Width<br /><input  class='pricingtable_column_width' name='pricingtable_column_width[".$i."]'  size='20' type='text' value='".$pricingtable_column_width[$i]."' /><br /></div>";						

					}
					
					
				elseif($j==1)
					{
					
					$pricingtable_admin_cell .=  "<td class='pricingtable_admin_td_".$i."' column_id='".$j."-".$i."' > ";
					
					$pricingtable_admin_cell .=  "<div title='Double click to expand or collapse' class='header-pack lock'>Featured Column<br /><br /><input class='pricingtable_column_featured' id='pricingtable_column_featured[".$i."]' name='pricingtable_column_featured[".$i."]'  size='20' type='checkbox' value='1'";
					
					if(!empty($pricingtable_column_featured[$i]))
						{
						$pricingtable_admin_cell .=  " checked='checked'/><label title='Click to remove featured column.' for='pricingtable_column_featured[".$i."]'>Remove Featured</label>";
						}
					else
						{
						$pricingtable_admin_cell .=  " /><label title='Select to make featured column.' for='pricingtable_column_featured[".$i."]'>Make Featured</label>";
						}

					
					$pricingtable_admin_cell .=  "<br />";
					
					
						$pricingtable_admin_cell .=  '<br />Column Ribbons<br />
							<select name="pricingtable_column_ribbon['.$i.']" >';
							
								if(empty($pricingtable_column_ribbon[$i]))
									{
										$pricingtable_column_ribbon[$i] = "";
									}

								$pricingtable_admin_cell .=  '<option value="none" '.(($pricingtable_column_ribbon[$i]=="none" ) ? "selected" : "").' >None</option>';
								$pricingtable_admin_cell .=  '<option value="free" '.(($pricingtable_column_ribbon[$i]=="free" ) ? "selected" : "").' >Free</option>';
								$pricingtable_admin_cell .=  '<option value="save" '.(($pricingtable_column_ribbon[$i]=="save" ) ? "selected" : "").' >Save</option>';								
								$pricingtable_admin_cell .=  '<option value="hot" '.(($pricingtable_column_ribbon[$i]=="hot" ) ? "selected" : "").' >Hot</option>';
								$pricingtable_admin_cell .=  '<option value="pro" '.(($pricingtable_column_ribbon[$i]=="pro" ) ? "selected" : "").' >Pro</option>';								
								$pricingtable_admin_cell .=  '<option value="best" '.(($pricingtable_column_ribbon[$i]=="best" ) ? "selected" : "").' >Best</option>';
								$pricingtable_admin_cell .=  '<option value="gift" '.(($pricingtable_column_ribbon[$i]=="gift" ) ? "selected" : "").' >Gift</option>';
								$pricingtable_admin_cell .=  '<option value="sale" '.(($pricingtable_column_ribbon[$i]=="sale" ) ? "selected" : "").' >Sale</option>';																
								$pricingtable_admin_cell .=  '<option value="new" '.(($pricingtable_column_ribbon[$i]=="new" ) ? "selected" : "").' >New</option>';	
								$pricingtable_admin_cell .=  '<option value="top" '.(($pricingtable_column_ribbon[$i]=="top" ) ? "selected" : "").' >Top</option>';
								$pricingtable_admin_cell .=  '<option value="fresh" '.(($pricingtable_column_ribbon[$i]=="fresh" ) ? "selected" : "").' >Fresh</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_10" '.(($pricingtable_column_ribbon[$i]=="dis_10" ) ? "selected" : "").' >-10%</option>';								
								$pricingtable_admin_cell .=  '<option value="dis_20" '.(($pricingtable_column_ribbon[$i]=="dis_20" ) ? "selected" : "").' >-20%</option>';
								$pricingtable_admin_cell .=  '<option value="dis_30" '.(($pricingtable_column_ribbon[$i]=="dis_30" ) ? "selected" : "").' >-30%</option>';
								$pricingtable_admin_cell .=  '<option value="dis_40" '.(($pricingtable_column_ribbon[$i]=="dis_40" ) ? "selected" : "").' >-40%</option>';
								
								$pricingtable_admin_cell .=  '<option value="dis_50" '.(($pricingtable_column_ribbon[$i]=="dis_50" ) ? "selected" : "").' >-50%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_60" '.(($pricingtable_column_ribbon[$i]=="dis_60" ) ? "selected" : "").' >-60%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_70" '.(($pricingtable_column_ribbon[$i]=="dis_70" ) ? "selected" : "").' >-70%</option>';									
								
								$pricingtable_admin_cell .=  '<option value="dis_80" '.(($pricingtable_column_ribbon[$i]=="dis_80" ) ? "selected" : "").' >-80%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_90" '.(($pricingtable_column_ribbon[$i]=="dis_90" ) ? "selected" : "").' >-90%</option>';								
								
								$pricingtable_admin_cell .=  '<option value="dis_100" '.(($pricingtable_column_ribbon[$i]=="dis_100" ) ? "selected" : "").' >-100%</option>';									
								
									
							$pricingtable_admin_cell .=  '</select><br />';
					
					
					
					
					
					
					
					
					
					$pricingtable_admin_cell .=  "<br />Header Background Color<br /><input class='pricingtable_cell_header_bg_color' name='pricingtable_cell_header_bg_color[".$i."]'  size='20' type='text' value='".$pricingtable_cell_header_bg_color[$i]."' /><br />";
					
					$pricingtable_admin_cell .=  "<br />Header Image or Video(url)<br /><input class='pricingtable_cell_header_image' name='pricingtable_cell_header_image[".$i."]'  size='20' type='text' value='".$pricingtable_cell_header_image[$i]."' /><br />";					
					
					$pricingtable_admin_cell .=  "<br />Header Description Text<br /><input class='pricingtable_cell_header_description' name='pricingtable_cell_header_description[".$i."]'  size='20' type='text' value='".$pricingtable_cell_header_description[$i]."' /><br />";						
					
					$pricingtable_admin_cell .=  "<br />Column Width<br /><input class='pricingtable_column_width' name='pricingtable_column_width[".$i."]'  size='20' type='text' value='".$pricingtable_column_width[$i]."' /><br /></div>";	
					
					}
					

				else
					{
						$pricingtable_admin_cell .=  "<td class='pricingtable_admin_td_".$i."' >";
						
					}
				

			if($i==1 && $j!=1)
				{

					$pricingtable_admin_cell .=  "<span data_row='".$j."' class='pricingtable_admin_tr_remove' title='Remove this Row' ></span>";
					$pricingtable_admin_cell .=  '<span class="pricingtable_admin_tr_gripper" title="Drag to reorder"></span>';
				}
			
			if($j==1 && $i!=1 )
				{

					$pricingtable_admin_cell .=  "<span data-column='".$i."' class='pricingtable_admin_td_remove' title='Remove this Column' ></span>";
					$pricingtable_admin_cell .=  '<span class="pricingtable_admin_td_gripper" title="Drag to reorder"></span>';


					
				}
							
			if(empty($pricingtable_cell[$j.$i]))
				{
					$pricingtable_cell[$j.$i] = "";
				}
			
			
			if($j==1)
				{
					$pricingtable_admin_cell .=  "<br />Table Header Text<br /><input name='pricingtable_cell_header_text[".$i."]' size='20' type='text' value='".$pricingtable_cell_header_text[$i]."' />";
				
				}			
			
			
			elseif($j==2)
				{
					
					$pricingtable_admin_cell .=  "<div title='Double click to expand or collapse' class='price-pack lock'>Price Background Color<br /><input class='pricingtable_cell_price_bg_color' name='pricingtable_cell_price_bg_color[".$i."]'  size='20' type='text' value='".$pricingtable_cell_price_bg_color[$i]."' /><br />";
					
					$pricingtable_admin_cell .=  "<br />Price Duration Text<br /><input placeholder='Pre Month' class='pricingtable_cell_price_duration' name='pricingtable_cell_price_duration[".$i."]'  size='20' type='text' value='".$pricingtable_cell_price_duration[$i]."' /></div><br />";	
					
					
					$pricingtable_admin_cell .=  "<br />Column Price<br /><input placeholder='$20' name='pricingtable_cell_price[".$i."]' data_cell='".$j.$i."' size='20' type='text' value='".$pricingtable_cell_price[$i]."' /><br />";
					
				
				}			
			
			elseif($j==$pricingtable_total_row)
				{
					$pricingtable_admin_cell .=  "<div class='signup-pack lock'>Signup Background Color<br /><input class='pricingtable_cell_signup_bg_color' name='pricingtable_cell_signup_bg_color[".$i."]'  size='20' type='text' value='".$pricingtable_cell_signup_bg_color[$i]."' />";
					
					 
					if(empty($pricingtable_cell_signup_button_bg_color[$i]))
						{
							$pricingtable_cell_signup_button_bg_color[$i] = "";
						}
					
					
					
					$pricingtable_admin_cell .=  "<br /><br />Signup Button Background Color<br /><input class='pricingtable_cell_signup_button_bg_color' name='pricingtable_cell_signup_button_bg_color[".$i."]'  size='20' type='text' value='".$pricingtable_cell_signup_button_bg_color[$i]."' /></div>";					
					
					$pricingtable_admin_cell .=  "<br /><br />Signup Text<br /><input placeholder='SignUp' name='pricingtable_cell_signup_name[".$i."]' data_cell='".$j.$i."' size='20' type='text' value='".$pricingtable_cell_signup_name[$i]."' />";
					
					$pricingtable_admin_cell .=  "<br /><br />SignUp URL<br /><input placeholder='http://example.com' name='pricingtable_cell_signup_url[".$i."]' data_cell='".$j.$i."' size='20' type='text' value='".$pricingtable_cell_signup_url[$i]."' />";					
				}
			else
				{
					$pricingtable_admin_cell .=  "<br />Table Data<br /><input name='pricingtable_cell[".$j.$i."]' data_cell='".$j.$i."' size='20' type='text' value='".$pricingtable_cell[$j.$i]."' />";

				}
			
			
			

			$pricingtable_admin_cell .=  "</td>";
			
			}
	$pricingtable_admin_cell .=  "</tr>";
			
  }


$pricingtable_admin_cell .= "</table>";


echo $pricingtable_admin_cell;

?>

     
     </div>



        

        
        </td>
    </tr>    
    
  <tr valign="top">
        <td style="vertical-align:middle;">
        
        <strong>Preview</strong><br /><br /> 
<?php echo do_shortcode("[pricingtable id='".$post->ID."' ]"); ?>
        
        </td>
    </tr>  
    


</table>
















<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_pricingtable_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_pricingtable_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_pricingtable_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_pricingtable_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$pricingtable_bg_img = sanitize_text_field( $_POST['pricingtable_bg_img'] );	
	$pricingtable_themes = sanitize_text_field( $_POST['pricingtable_themes'] );	
	$pricingtable_total_row = sanitize_text_field( $_POST['pricingtable_total_row'] );
	$pricingtable_total_column = sanitize_text_field( $_POST['pricingtable_total_column'] );
	$pricingtable_cell = stripslashes_deep( $_POST['pricingtable_cell'] );
	
	$pricingtable_column_width = stripslashes_deep( $_POST['pricingtable_column_width'] );
	$pricingtable_column_featured = stripslashes_deep( $_POST['pricingtable_column_featured'] );
	$pricingtable_column_ribbon = stripslashes_deep( $_POST['pricingtable_column_ribbon'] );	
	
	
	$pricingtable_cell_price_duration = stripslashes_deep( $_POST['pricingtable_cell_price_duration'] );
	$pricingtable_cell_price = stripslashes_deep( $_POST['pricingtable_cell_price'] );
	$pricingtable_cell_price_bg_color = stripslashes_deep( $_POST['pricingtable_cell_price_bg_color'] );		
	
	
	$pricingtable_cell_signup_bg_color = stripslashes_deep( $_POST['pricingtable_cell_signup_bg_color'] );
	$pricingtable_cell_signup_button_bg_color = stripslashes_deep( $_POST['pricingtable_cell_signup_button_bg_color'] );		
	$pricingtable_cell_signup_name = stripslashes_deep( $_POST['pricingtable_cell_signup_name'] );
	$pricingtable_cell_signup_url = stripslashes_deep( $_POST['pricingtable_cell_signup_url'] );
	
	
	$pricingtable_cell_header_description = stripslashes_deep( $_POST['pricingtable_cell_header_description'] );	
	$pricingtable_cell_header_image = stripslashes_deep( $_POST['pricingtable_cell_header_image'] );	
	$pricingtable_cell_header_bg_color = stripslashes_deep( $_POST['pricingtable_cell_header_bg_color'] );
	$pricingtable_cell_header_text = stripslashes_deep( $_POST['pricingtable_cell_header_text'] );	

  // Update the meta field in the database.
	update_post_meta( $post_id, 'pricingtable_bg_img', $pricingtable_bg_img );	
	update_post_meta( $post_id, 'pricingtable_themes', $pricingtable_themes );	
	update_post_meta( $post_id, 'pricingtable_total_row', $pricingtable_total_row );
	update_post_meta( $post_id, 'pricingtable_total_column', $pricingtable_total_column );
	update_post_meta( $post_id, 'pricingtable_cell',$pricingtable_cell );
	
	update_post_meta( $post_id, 'pricingtable_column_width',$pricingtable_column_width );
	update_post_meta( $post_id, 'pricingtable_column_featured',$pricingtable_column_featured );
	update_post_meta( $post_id, 'pricingtable_column_ribbon',$pricingtable_column_ribbon );	
	
	
	update_post_meta( $post_id, 'pricingtable_cell_price_duration',$pricingtable_cell_price_duration );
	update_post_meta( $post_id, 'pricingtable_cell_price',$pricingtable_cell_price );
	update_post_meta( $post_id, 'pricingtable_cell_price_bg_color',$pricingtable_cell_price_bg_color );	
	
	update_post_meta( $post_id, 'pricingtable_cell_signup_bg_color',$pricingtable_cell_signup_bg_color );
	update_post_meta( $post_id, 'pricingtable_cell_signup_button_bg_color',$pricingtable_cell_signup_button_bg_color );	
	update_post_meta( $post_id, 'pricingtable_cell_signup_name',$pricingtable_cell_signup_name );
	update_post_meta( $post_id, 'pricingtable_cell_signup_url',$pricingtable_cell_signup_url );
	
	
	update_post_meta( $post_id, 'pricingtable_cell_header_description',$pricingtable_cell_header_description );	
	update_post_meta( $post_id, 'pricingtable_cell_header_image',$pricingtable_cell_header_image );
	update_post_meta( $post_id, 'pricingtable_cell_header_bg_color',$pricingtable_cell_header_bg_color );
	update_post_meta( $post_id, 'pricingtable_cell_header_text',$pricingtable_cell_header_text );	
  
}
add_action( 'save_post', 'meta_boxes_pricingtable_save' );


























?>