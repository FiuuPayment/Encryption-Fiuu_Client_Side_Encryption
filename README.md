
# Client-Side-Encryption-CSE-
The Client-Side Encryption (CSE) integration lets you accept payments on your website while encrypting card data in your shopper's browser using the RMS encryption library.

## Before you begin
1) Make sure you have our merchant account.
2) Get your public key from RMS.

## Client Side
Start by creating a payment form integrated with the Client-Side Encryption (CSE) library. Ensure that your payment form includes the mandatory fields. You may replace the `[payment_action]` with your payment process URL and `[public_key]` with public key provided from RMS.

To ensures that the call does not send unencrypted card data to your server, you must encrypt card input fields by annotating them with the `data-encrypted-name` attribute.  
**Do not** use the `name` attribute.

```html
<script src="https://sandbox.merchant.razer.com/RMS/API/cse/checkout.js"></script>
<form action="[payment_action]" method="POST" id="molpay-payment-form">
  <input type="text" size="20" data-encrypted-name="PAN" placeholder="CC NUM" maxlength="16" required/>
  <input type="text" size="20" data-encrypted-name="CVV" placeholder="CVV" maxlength="3" required/>
  <input type="text" size="20" data-encrypted-name="EXPMONTH" placeholder="EXPMONTH [12]" maxlength="2" required/>
  <input type="text" size="20" data-encrypted-name="EXPYEAR" placeholder="EXPYEAR [2020]" min="4" maxlength="4" required/>
  <input type="submit" value="Pay">
</form>
<script type="text/javascript">
  var pub = "[public_key]";
  var molpay = MOLPAY.encrypt( pub );
  molpay.onSubmitEncryptForm('molpay-payment-form');
</script>
```        
## Server Side
From server, make an HTTP POST request to our Direct Server API endpoint. Please refer to our Direct Server API for payment request and response.
