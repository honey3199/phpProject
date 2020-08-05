<?php
include '../config/connection.php';

//Set useful variables for paypal form
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'promiseacademy33@gmail.com'; //Business Email

?>

<?php
    //Fetch products from the database
    $results = $conn->query("SELECT * FROM product");
    while($row = $results->fetch_assoc()){
?>
    
    Name: <?php echo $row['pname']; ?>
 Price: <?php echo $row['Price']; ?>   
 
    <form action="<?php echo $paypalURL; ?>" method="post">
    
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $row['pname']; ?>">
		<input type="hidden" name="amount" value="<?php echo $row['Price']; ?>">
          <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/demo/Paypal/cancel.php'>
		
        <input type='hidden' name='return' value='http://localhost/demo/Paypal/success.php'>
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>
<?php } ?>