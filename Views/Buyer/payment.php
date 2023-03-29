<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
<form action="payment.php" method="POST">
  <input type="text" name="card_number" placeholder="Card Number">
  <input type="text" name="exp_month" placeholder="MM">
  <input type="text" name="exp_year" placeholder="YYYY">
  <input type="text" name="cvc" placeholder="CVC">
  <input type="hidden" name="stripeToken" value="{{TOKEN}}">
  <input type="text" name="amount" placeholder="Amount">
  <input type="submit" value="Pay">
</form>
<script src="https://js.stripe.com/v3/"></script>
<script>
  var stripe = Stripe('pk_test_51MqqhISE31RGAaWwVgEbsNsm3jfcMtpx6QKo6E8dzm8BYkmFKXC7ccsLgszXDbonB8VZ1SGWc1SXwveWe5Q9OP4f00djbyZO1N' );
  var elements = stripe.elements();

  var card = elements.create('card');
  card.mount('#card-element');

  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Handle error
      } else {
        // Send token to server
        var token = result.token.id;
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token);
        form.appendChild(hiddenInput);
        form.submit();
      }
    });
  });
</script>
</body>
</html>