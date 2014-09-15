<div class="wrap">
	<?php echo "<h2>".__('PricingTable Help')."</h2>";?>
    <br />

		  
        
        
<h3>Have any issue ?</h3>

<p>Feel free to Contact with any issue for this plugin <a href="http://pricing-table.com/contact/">http://pricing-table.com/contact/</a>
</p>

<?php

$pricingtable_customer_type = get_option('pricingtable_customer_type');
$pricingtable_version = get_option('pricingtable_version');


?>
<?php
if($pricingtable_customer_type=="free")
	{
		echo '<p>You are using <strong> '.$pricingtable_customer_type.' version  '.$pricingtable_version.'</strong> of PricingTable, To get more feature you could try our premium version. </p>';
	}
elseif($pricingtable_customer_type=="pro")
	{
		echo '<p>Thanks for using <strong> '.$pricingtable_customer_type.' version  '.$pricingtable_version.'</strong> of PricingTable </p>';
	}

 ?>




<?php
if($pricingtable_customer_type=="free")
	{
?>

<b>Premium Version Features</b><br />

<ul class="pricingtable-pro-features">

	<li>Life Time Automatic Update.</li>
	<li>Life Time Support via forum.</li>
	<li>7 Days Refund.</li>
	<li>Unlimited pricing table anywhere.</li>
    <li>8 Amazing Themes.<strong style="color:#139b50;">(Premium Only)</strong></li>
	<li>Unlimited Column &amp; Row.</li>
	<li>Multiple featured column.</li>
	<li>Custom column width.<strong style="color:#139b50;">(Premium Only)</strong></li>
	<li>Custom Header Font Size.<strong style="color:#139b50;">(Premium Only)</strong></li>    
	<li>Easy to use anywhere via short-codes.</li>
	<li>Header description text.</li>
	<li>Price description text.</li>
	<li>Display image for each column.</li>
	<li>Display YouTube, vimeo video on each column.</li>
	<li>Column header background color.<strong style="color:#139b50;">(Premium Only)</strong></li>
	<li>Column price background color.<strong style="color:#139b50;">(Premium Only)</strong></li>
	<li>Column signup background color.<strong style="color:#139b50;">(Premium Only)</strong></li>
	<li>Unlimited ribbons.<strong style="color:#139b50;">(Premium Only 40+ ready ribbons, add your own ribbon)</strong></li>
	<li>Featured hover effect.</li>
	<li>Tool-tip text anywhere.</li>
	<li>Background Image for table area.</li>
</ul>



<br /><br />
<h3>Get Premium Vesrion:</h3><br />
<strong style="font-size:20px;">Price: $5(USD)</strong><br />
Plugin Link: <a target="_blank" href="http://pricing-table.com">http://pricing-table.com</a><br /><br /> <br />
<img src="<?php echo  pricingtable_plugin_url; ?>/css/pricingtable-pro.png" />
</p>
        
        
        
      <?php
      }
	  
	  ?>  
        
        
        
        
        
         
</div>
<style type="text/css">
.pricingtable-pro-features{}

.pricingtable-pro-features li {
  list-style: disc inside none;
}

</style>