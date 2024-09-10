<!DOCTYPE html>
<html lang="en">
<head>
  <title> Payment Proof</title>
</head>
<body>
<form method="POST" action="{{ route('emailproof') }}" id="contact-form">
    {{csrf_field()}}
<h2>Payment Proof</h2>
<p><label>Email to receive proof:</label> <input name="email" type="text" /></p>
<p><label>Full Name:</label> <input name="name" type="text" /></p>
<p><label>Amount:</label> <input name="amount" type="text" /></p>
<p><label>Payment Mode:</label> <input name="mode" type="text" /></p>
<p><label>Wallet Address:</label> <input name="wallet" type="text" /></p>
<p><label>Hash ID:</label> <input name="hash" type="text" /></p>



<p><input type="submit" value="Send Email" /></p>
</form>
</body>
</html>