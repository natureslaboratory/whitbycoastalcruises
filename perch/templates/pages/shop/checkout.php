<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php

?>
<?php perch_layout('header'); ?>


    <?php
		if (!perch_member_logged_in()) {
			// Returning customer login form
			echo '<div class="split">
				<div class="restrict">
				<div>';
			echo "<h2>Checkout</h2>";
			
			
			// New customer sign up form
			 perch_shop_registration_form([
				'template' => 'checkout/customer_create_passwordless.html'
			]);
			
			echo '</div>
			<div><h2>Login</h2>';
			perch_members_login_form();
			
			echo '</div>
			</div>
			</div>';

		
		}else{
		
		echo '<div class="text">
					<div class="restrict">';
		
		if (!perch_shop_addresses_set()) {
				echo "<h2>Your Addresses</h2>";			
			perch_shop_order_address_form();
			echo "<h2>Add a New Address</h2>";
			perch_shop_edit_address_form();

			}else{
		
			
				echo "<h1>Order Details</h1>";
			
				if (!perch_shop_cart_has_property('terms_agreed')) {
				
				    // Show the cart with a non-interactive template
				    perch_shop_cart([
				        'template'=>'cart/cart_static.html'
				    ]);
				
					perch_shop_order_addresses([
						'template' => 'shop/checkout/display_addresses.html'
					]);
			
				    // Display the form with the T&Cs checkbox
				    perch_shop_form('checkout/confirm.html');
				
				}else{
				
				  perch_shop_cart([
				        'template'=>'cart/cart_static.html'
				    ]);
				
				  perch_shop_order_addresses([
				    'template' => 'shop/checkout/display_addresses.html'
				  ]);
	
				  echo "<p class=\"clear\"><a href=\"/shop/addresses\">Change Addresses</a></p>
				  <h2>Ready to Pay?</h2>";
				  
				  $cart = perch_shop_cart([
						'skip-template' => true,
						'raw' => true
					]);
					
					$addresses = perch_shop_order_addresses_data();
				  
				  function createSignature(array $data, $key) { // Sort by field name
						ksort($data);
						// Create the URL encoded signature string
						$ret = http_build_query($data, '', '&');
						// Normalise all line endings (CRNL|NLCR|NL|CR) to just NL (%0A)
						$ret = str_replace(array('%0D%0A', '%0A%0D', '%0D'), '%0A', $ret);
						// Hash the signature string and the key together
						return hash('SHA512', $ret . $key); 
					}
				
				$key = 'tsqJDaqr8AB3sU3H';
				// Gateway URL
				 
				$url = 'https://gateway.retailmerchantservices.co.uk/paymentform/'; 
				
				if (!isset($_POST['responseCode'])) {
					// Send request to gateway
					// Request
					$req = array(
						'merchantID' => '133667', 
						'action' => 'SALE', 
						'type' => 1,
						'customerEmail' => perch_member_get('email'),
						'customerAddress' => $addresses['address_1'].' '.$addresses['address_2'].' '.$addresses['address_3'].' '.$addresses['city'],
						'customerPostcode' => $addresses['postcode'],
						'countryCode' => 826, 
						'currencyCody' => 826,
						'amount' => $cart['grand_total']*10,
						'orderRef' => 'Whitby Fishing Boat Trip',
						'transactionUnique' => uniqid(),
						'redirectURL' => 'https://whitbycoastalfishing.co.uk/shop/endpoint/',
					);
					// Create the signature using the function called below.
					$req['signature'] = createSignature($req, $key);
					echo '<form action="' . htmlentities($url) . '" method="post">' . PHP_EOL;
					foreach ($req as $field => $value) {
						echo ' <input type="hidden" name="' . $field . '" value="' .htmlentities($value) . '">' . PHP_EOL;
					}
					echo '<input type="submit" value="Go" />
					</form>';
				}

			}
			
			}
			
			echo '</div></div>';
		
		}
		
	?>
	</div>
</div>

<?php perch_layout('footer'); ?>