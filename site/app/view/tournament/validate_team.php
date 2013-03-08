<p>
Date : <?php echo date('l dS F Y - H:ia');?>
</p>

<div class="tour_show_team">
	<table border="1px" width="100%" height="100px">
		<tr>
			<?php
				for($i=0; $i<5; $i++)
				{
					echo"
						<td>
							Pseudo : ".($i+1)."
						</td>
						
						";
				}
				echo"</tr><tr>";
				for($i=0; $i<5; $i++)
				{
					echo"
						<td>
							<img src=\"/assets/img/pic.jpg\" width=\"\"> 
						</td>	
						";
				}
			?>
		</tr>
	</table>
</div>	
<br>
</br>
Payment Type :
<div class="tour_payment">
	<form method="POST" action="/tournament/validate_team">
		<img src="/assets/img/paypal_logo.png" > <input type="radio" name="tour_payment_type" value="paypal">     
		<img src="/assets/img/cb_logo.png" "><input type="radio" name="tour_payment_type" value="cb">
		<input type ="submit" name ="tour_payment" value="Choose">
	</form>
</div>

<?php
	if (isset($_POST['tour_payment'])) {
	echo"</br> The type is : ".$tour_payment_type;

	if($tour_payment_type == "cb")
	{?>
		</br>Payment Info :
		
		<form method="post" action="/tournament/validate_team">
			<table width="800px" cellspacing="10">
				<tr>
					<td align="right">Carde number (16 numbers on back):</td> <td width="20px"></td> <td align="left"> <input type="text" name="tour_card_number" size="15"> </td>
				</tr>
			 	<tr>
					<td align="right">Expiration  Date :</td> <td width="20px"></td> <td align="left">  <input type="text" name="tour_card_date_month" size="1"> <input type="text" name="tour_card_date_month" size="1"> </td>
				</tr>
				<tr>
					<td align="right">Security Code :</td> <td width="20px"></td> <td align="left"> <input type="text" name="tour_card_sec_number" size="2"> </td>
				</tr><tr><td></td></td>
				<tr>
					<td align="right">Name (Card Holder) :</td> <td width="20px"></td> <td align="left"><input type="text" name="tour_card_holder_fname" size="15"> </td>
				</tr>
				<tr>
					<td align="right">Last Name (Card Holder) :</td> <td width="20px"></td> <td align="left"> <input type="text" name="tour_card_holder_lname" size="15"> </td>
				</tr>
				<tr>
					<td align="right">Date Of Birth (Card Holder) :</td> <td width="20px"></td> <td align="left"> <input type="text" name="tour_card_holder_date_day" size="1"> <input type="text" name="tour_card_holder_date_month" size="1"> <input type="text" name="tour_card_holder_date_year" size="1"> </td>
				</tr>
				<tr>
					<td></td> <td width="20px"></td> <td align="right"> <input type ="submit" name ="tour_validate_payment" value="Pay"></td>
				</tr>
			</table>
		
	</form>	

<?php			
	}
	else if($tour_payment_type == "paypal")
	{
		echo"</br>Normal Paypal information";?>
		<form method="post" action="/tournament/validate_team">
		<input type ="submit" name ="tour_validate_payment" value="Pay">
		</form>
	<?php }}
?>