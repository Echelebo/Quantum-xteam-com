
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<!-- Mirrored from ?a=signup by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Jul 2021 10:15:57 GMT -->
<head>
<!-- Basic Page Needs -->
<meta charset="utf-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
 <title>Sign Up - Crypteruim</title>

<meta name="author" content="themesflat.com">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Bootstrap  -->
<link rel="stylesheet" type="text/css" href="https://crypteruim.net/stylesheets/bootstrap.css">

<!-- Theme Style -->
<link rel="stylesheet" type="text/css" href="https://crypteruim.net/stylesheets/style.css">

<!-- Responsive -->
<link rel="stylesheet" type="text/css" href="https://crypteruim.net/stylesheets/responsive.css">

<!-- Colors -->
<link rel="stylesheet" type="text/css" href="https://crypteruim.net/stylesheets/colors/color4.css" id="colors">

<!-- Animation Style -->
<link rel="stylesheet" type="text/css" href="https://crypteruim.net/stylesheets/animate.css">
<link rel="stylesheet" type="text/css" href="https://crypteruim.net/main.css">

<link href="https://crypteruim.net/temp/wp-content/uploads/sites/56/elementor/thumbs/favicon.png" rel="shortcut icon" />

<!--[if lt IE 9]>
<script src="javascript/html5shiv.js"></script>
<script src="javascript/respond.min.js"></script>
<![endif]-->



</head>                                 
<body class="header_sticky"> 




 <div class="text-center mb-4">
                        
                            @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                    </div>

 <script language=javascript>
 function checkform() {
  if (document.regform.fullname.value == '') {
    alert("Please enter your full name!");
    document.regform.fullname.focus();
    return false;
  }
 
  
  if (document.regform.username.value == '') {
    alert("Please enter your username!");
    document.regform.username.focus();
    return false;
  }
  if (!document.regform.username.value.match(/^[A-Za-z0-9_\-]+$/)) {
    alert("For username you should use English letters and digits only!");
    document.regform.username.focus();
    return false;
  }
  if (document.regform.password.value == '') {
    alert("Please enter your password!");
    document.regform.password.focus();
    return false;
  }
  if (document.regform.password.value != document.regform.password2.value) {
    alert("Please check your password!");
    document.regform.password2.focus();
    return false;
  }
 
  
  if (document.regform.email.value == '') {
    alert("Please enter your e-mail address!");
    document.regform.email.focus();
    return false;
  }
  if (document.regform.email.value != document.regform.email1.value) {
    alert("Please retupe your e-mail!");
    document.regform.email.focus();
    return false;
  }

  for (i in document.regform.elements) {
    f = document.regform.elements[i];
    if (f.name && f.name.match(/^pay_account/)) {
      if (f.value == '') continue;
      var notice = f.getAttribute('data-validate-notice');
      var invalid = 0;
      if (f.getAttribute('data-validate') == 'regexp') {
        var re = new RegExp(f.getAttribute('data-validate-regexp'));
        if (!f.value.match(re)) {
          invalid = 1;
        }
      } else if (f.getAttribute('data-validate') == 'email') {
        var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
        if (!f.value.match(re)) {
          invalid = 1;
        }
      }
      if (invalid) {
        alert('Invalid account format. Expected '+notice);
        f.focus();
        return false;
      }
    }
  }

  if (document.regform.agree.checked == false) {
    alert("You have to agree with the Terms and Conditions!");
    return false;
  }

  return true;
 }

 function IsNumeric(sText) {
  var ValidChars = "0123456789";
  var IsNumber=true;
  var Char;
  if (sText == '') return false;
  for (i = 0; i < sText.length && IsNumber == true; i++) { 
    Char = sText.charAt(i); 
    if (ValidChars.indexOf(Char) == -1) {
      IsNumber = false;
    }
  }
  return IsNumber;
 }
 </script>
 
 
  
<section class="section-maps-form style2 parallax parallax4">
<div class="section-overlay style2"></div>
<div class="container">
<div class="row" style="justify-content: center;">
<div class="col-lg-6 text-center">
<div class="mainlogo">
<a href="https://crypteruim.net/"> <img src="https://crypteruim.net/images/logo.png" alt="image"></a>
</div>
<div class="wrap-formrequest padding-lr100">
<form class="contactform wrap-form style3 clearfix" method="POST" action="{{ route('register') }}">
    {{csrf_field()}}
    <input type="hidden" name="form_id" value="16253072038649"><input type="hidden" name="form_token" value="7a79c6aaddf844be41ae3065a389c3cc">
<input type=hidden name=a value="signup">
<input type=hidden name=action value="signup">
<span class="title-form" style="text-align: center;
    margin-bottom: 20px;">Registration at Coinex Mining</span>

<span class="flat-input">
    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
    <input name="name" value="{{ old('name') }}" id="f_name" placeholder="Enter First Name" type="text" required>
</span>
<span class="flat-input">
    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    <input name="email" value="{{ old('email') }}" id="email" placeholder="Enter Email" type="email" required>
</span>
<span class="flat-input">
    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
    <input name="phone" value="{{ old('phone') }}" id="phone" placeholder="Enter Phone number" type="mumber" required>
</span>
<span class="flat-input">
    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
    <input name="password" id="password" placeholder="Enter Password" type="password" required>
</span>


<span class="flat-input">
    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
    <input name="password_confirmation" value="{{ old('password_confirmation') }}" id="confirm-password" placeholder="Confirm Password" type="password" required>
</span>




<tr>
 <td colspan=2></td>
</tr>

<span class="flat-input" style="color: #fff;">
    <input type=checkbox name=agree value=1  style="width: 20px;
    height: 20px;"> I agree with <a href="https://crypteruim.net/indexb62d.php" style="color: #ff7742;">Terms and conditions</a>
</span>
<span class="flat-input">
     <input type="submit"  onclick="this.disabled=true;this.value='processing, please wait...';this.form.submit();" class="btn btn-blue btn-block pricing-action btn-primary nav-pills" value="Register" style=" border-radius: 40px;"></span>
  
</form>
                    </div>
                    <br><br> 
                    <span class="title-form" style="text-align: center;
    margin-bottom: 20px;color:#fff;">Account Login</span>
<a href="{{route('login')}}" style="color: #ff7742;">Click here</a>
                   <br> 
                  <span class="title-form" style="text-align: center;
    margin-bottom: 20px;color:#fff;">Reset Password?</span>
<a href="{{ url('/password/reset') }}" style="color: #ff7742;">click here</a>
                
                </div>
            </div>
        </div>
    </section>
   
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/66ccd801ea492f34bc0a5b5f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>