
# [Encryption] – Fiuu Client-Side-Encryption
<img src="https://user-images.githubusercontent.com/38641542/157029625-e07deaa8-3adb-472f-a0e6-eb359d7a7636.jpg">
The Client-Side Encryption (CSE) integration lets you accept payments on your website while encrypting card data in your shopper's browser using the RMS encryption library.

## Before you begin
1) Make sure you have our merchant account.
2) Get your public key from RMS.

## Client Side
Start by creating a payment form integrated with the Client-Side Encryption (CSE) library. Ensure that your payment form includes the mandatory fields. You may replace the `[payment_action]` with your payment process URL and `[public_key]` with public key provided from RMS.

To ensures that the call does not send unencrypted card data to your server, you must encrypt card input fields by annotating them with the `data-encrypted-name` attribute.  
**Do not** use the `name` attribute.

```html
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://sandbox.merchant.razer.com/RMS/API/cse/checkout.js"></script>
<form action="[payment_action]" method="POST" id="payment-form">
  <input type="text" size="20" class ='cc-number' data-encrypted-name="PAN" placeholder="CC NUM" maxlength="19" required/>
  <input type="text" size="20" class='cc-cvv' data-encrypted-name="CVV" placeholder="CVV" maxlength="3" required/>
  <input type="text" size="20" class='cc-expiry' data-encrypted-name="EXPIRY" placeholder="MM/YYYY" maxlength="7" required/>
  <input type="submit" value="Pay">
  <div id='errorMsg'>
  </div> 
</form>
<script type="text/javascript">
  $(document).on("submit", "form", function (e) {
    if(creditCardValidation() == true) {
      var pub = "[public_key]";
      var encForm = CSE.encrypt( pub );
      encForm.onSubmitEncryptForm('payment-form');
    } else {
      e.preventDefault();
    } 
  })
</script>
```        
## Server Side
From server, make an HTTP POST request to our Direct Server API endpoint. Please refer to our Direct Server API for payment request and response.


## Resources
- GitHub:     https://github.com/FiuuPayment
- Website:    https://fiuu.com/
- Twitter:    https://twitter.com/FiuuPayment
- YouTube:    https://www.youtube.com/c/FiuuPayment
- Facebook:   https://www.facebook.com/FiuuPayment/
- Instagram:  https://www.instagram.com/FiuuPayment/


Issues
------------

Submit issue to this repository or email to our support@fiuu.com


## Support

Submit issue to this repository or email to our support@fiuu.com

Merchant Technical Support / Customer Care : support@fiuu.com<br>
Sales/Reseller Enquiry : sales@fiuu.com<br>
Marketing Campaign : marketing@fiuu.com<br>
Channel/Partner Enquiry : channel@fiuu.com<br>
Media Contact : media@fiuu.com<br>
R&D and Tech-related Suggestion : technical@fiuu.com<br>
Abuse Reporting : abuse@fiuu.com
