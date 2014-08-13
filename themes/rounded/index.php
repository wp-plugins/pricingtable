<?php

function pricingtable_body_rounded($post_id)
	{



		$pricingtable_ribbons = get_option( 'pricingtable_ribbons' );










		$pricingtable_bg_img = get_post_meta( $post_id, 'pricingtable_bg_img', true );



		$pricingtable_themes = get_post_meta( $post_id, 'pricingtable_themes', true );

		$pricingtable_total_column = get_post_meta( $post_id, 'pricingtable_total_column', true );
		$pricingtable_total_row = get_post_meta( $post_id, 'pricingtable_total_row', true );
		$pricingtable_cell = get_post_meta( $post_id, 'pricingtable_cell', true );
		
		$pricingtable_column_width = get_post_meta( $post_id, 'pricingtable_column_width', true );
		$pricingtable_column_featured = get_post_meta( $post_id, 'pricingtable_column_featured', true );
		$pricingtable_column_ribbon = get_post_meta( $post_id, 'pricingtable_column_ribbon', true );		

		$pricingtable_cell_header_description = get_post_meta( $post_id, 'pricingtable_cell_header_description', true );
		$pricingtable_cell_header_image = get_post_meta( $post_id, 'pricingtable_cell_header_image', true );
		$pricingtable_cell_header_bg_color = get_post_meta( $post_id, 'pricingtable_cell_header_bg_color', true );
		$pricingtable_cell_header_text = get_post_meta( $post_id, 'pricingtable_cell_header_text', true );		

		$pricingtable_cell_price_duration = get_post_meta( $post_id, 'pricingtable_cell_price_duration', true );
		$pricingtable_cell_price = get_post_meta( $post_id, 'pricingtable_cell_price', true );
		$pricingtable_cell_price_bg_color = get_post_meta( $post_id, 'pricingtable_cell_price_bg_color', true );
			
		$pricingtable_cell_signup_bg_color = get_post_meta( $post_id, 'pricingtable_cell_signup_bg_color', true );
		$pricingtable_cell_signup_button_bg_color = get_post_meta( $post_id, 'pricingtable_cell_signup_button_bg_color', true );		
		$pricingtable_cell_signup_name = get_post_meta( $post_id, 'pricingtable_cell_signup_name', true );
		$pricingtable_cell_signup_url = get_post_meta( $post_id, 'pricingtable_cell_signup_url', true );




				$pricingtable_body = "";
				$pricingtable_body.= '<div class="pricingtable-area" style="background:url('.$pricingtable_bg_img.') repeat scroll 0 0 rgba(0, 0, 0, 0);" >';
				$pricingtable_body.= "<div class='pricingtable-container pricingtable-themes-".$pricingtable_themes."' >";
				$j = 1;
				
				while($j<=$pricingtable_total_column)
					{
						
						if(!empty($pricingtable_column_featured[$j]))
					  		{
								$pricingtable_featured = "pricingtable_featured";
							}
						else
							{
							$pricingtable_featured = "";
							}
							

							
						if(empty($pricingtable_column_width[$j]))
					  		{
								$pricingtable_column_width[$j] = "";
							}
							
						if(empty($pricingtable_cell_header_bg_color[$j]))
					  		{
								$pricingtable_cell_header_bg_color[$j] = "";
							}							
							
						if(empty($pricingtable_cell_header_image[$j]))
					  		{
								$pricingtable_cell_header_image[$j] = "";
							}								
							
						if(empty($pricingtable_cell_price_bg_color[$j]))
					  		{
								$pricingtable_cell_price_bg_color[$j] = "";
							}							
							
						if(empty($pricingtable_cell_signup_bg_color[$j]))
					  		{
								$pricingtable_cell_signup_bg_color[$j] = "";
							}							
							
						if(empty($pricingtable_cell_signup_name[$j]))
					  		{
								$pricingtable_cell_signup_name[$j] = '<span class="pt-cell-blank normal">&nbsp;</span>';
							}								
							
							
							
							
							
							
					
					  
					$pricingtable_body.=  '<ul  style="width:'.$pricingtable_column_width[$j].'px;"  class="pricingtable-columns-container '.$pricingtable_featured.' column-hover-effect">';
					
					
					$pricingtable_body.=  '<li  style="width:'.$pricingtable_column_width[$j].'px;height:'.$pricingtable_column_width[$j].'px; background-color:'.$pricingtable_cell_signup_bg_color[$j].'"  class="pricingtable-columns" >';
					$pricingtable_body.=  '<ul  class="pricingtable-items-container">';
					
					$i = 1;
					while($i<=$pricingtable_total_row)
						{
							
							
						if(empty($pricingtable_cell[$i.$j]))
					  		{
								$pricingtable_cell[$i.$j] = '<span class="pt-cell-blank normal">&nbsp;</span>';
							}
							
						if(empty($pricingtable_cell_header_text[$j]))
					  		{
								$pricingtable_cell_header_text[$j] = '<span class="pt-cell-blank normal">&nbsp;</span>';
							}							
							
							
							

							
							if($i == 1)
								{
									
									$pricingtable_body.=  '<li style=" background-color:'.$pricingtable_cell_header_bg_color[$j].'" class="pricingtable-items pricingtable-header">';
									
									if(empty($pricingtable_ribbons[$pricingtable_column_ribbon[$j]]))
										{

											$pricingtable_body.=  '<span class="pricingtable-ribbon ribbon-'.$pricingtable_column_ribbon[$j].'"></span>';
									
										}
										
									else
										{
											$pricingtable_body.=  '<span style="background:url('.$pricingtable_ribbons[$pricingtable_column_ribbon[$j]].') repeat scroll 0 0 rgba(0, 0, 0, 0)" class="pricingtable-ribbon ribbon-'.$pricingtable_column_ribbon[$j].'"></span>';	
										}
										
								
									

									
									
									$pricingtable_body.=  "<span class='pricingtable-header-name'>".$pricingtable_cell_header_text[$j]."</span>";
									
									if(!empty($pricingtable_cell_header_description[$j]))
										{
										$pricingtable_body.=  "<span class='pt-hd'>".$pricingtable_cell_header_description[$j]."</span>";
										}		
									
									
								
									
									
									$video_ddomain = pricingtable_get_domain($pricingtable_cell_header_image[$j]);
									
									if($video_ddomain=="youtube.com")
									
										{
											$vid = pricingtable_get_youtube_id($pricingtable_cell_header_image[$j]);
											
											$pricingtable_body.=  '<iframe src="//www.youtube.com/embed/'.$vid.'?autoplay=0&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>';
										}
									elseif($video_ddomain=="vimeo.com")
									
										{
											$vid = pricingtable_get_vimeo_id($pricingtable_cell_header_image[$j]);
											
											$pricingtable_body.=  '<iframe src="//player.vimeo.com/video/'.$vid.'?title=0&amp;byline=0" width="" height="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
										}									elseif(empty($pricingtable_cell_header_image[$j])){$pricingtable_body.= '';
}
	
										
									else
										{
										$pricingtable_body.=  '<img src="'.$pricingtable_cell_header_image[$j].'" class="pricingtable-header-image" />';	
										
										}									
									
									
									

									
									
									$pricingtable_body.=  "</li>";
								}
								
							elseif($i == 2)
								{
									$pricingtable_body.=  '<li  style=" background-color:'.$pricingtable_cell_price_bg_color[$j].'" class="pricingtable-items pricingtable-price">';
									
									$pricingtable_body.=  "<span class='pricingtable-price-value'>".$pricingtable_cell_price[$j]."</span>";
									
									if(!empty($pricingtable_cell_price_duration[$j]))
										{
										$pricingtable_body.=  "<span class='pt-pd'>".$pricingtable_cell_price_duration[$j]."</span>";
										}
									
									
									$pricingtable_body.=  "</li>";
								}
								
							elseif($i == $pricingtable_total_row)
								{
									
									
								if(empty($pricingtable_cell_signup_button_bg_color[$j]))
									{
									$pricingtable_cell_signup_button_bg_color[$j] =  pricingtable_dark_color($pricingtable_cell_signup_button_bg_color[$j]);
									}


									
									
									
									$pricingtable_body.=  '<li style=" background-color:'.$pricingtable_cell_signup_bg_color[$j].'" class="pricingtable-items pricingtable-signup">';
									$pricingtable_body.=  '<a style="background-color:'.$pricingtable_cell_signup_button_bg_color[$j].';border-bottom:2px solid #555;" class="pricingtable-signup-name" href="'.$pricingtable_cell_signup_url[$j].'">'.$pricingtable_cell_signup_name[$j].'</a>';
									$pricingtable_body.=  "</li>";
								}								
																
							else
								{
									
									
									if($i%2 == 0)
										{
									$pricingtable_body.=  "<li class='pricingtable-items pricingtable-items-even'>".$pricingtable_cell[$i.$j];
									$pricingtable_body.=  "</li>";
										}
									else
										{
									$pricingtable_body.=  "<li class='pricingtable-items pricingtable-items-odd'>".$pricingtable_cell[$i.$j];
									$pricingtable_body.=  "</li>";
										}									
									
									
									
									
									


								}
							
							

						
						$i++;
						}
						
					$pricingtable_body.=  "</ul>";
					$pricingtable_body.=  "</li>";
					$pricingtable_body.=  "</ul>";
					
					$j++;
				  }

				
				
				
				
				$pricingtable_body.=  "</div>";
				$pricingtable_body.=  "</div>";
				
				return $pricingtable_body;
			
			
	}