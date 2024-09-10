
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<!-- Mirrored from /?a=login by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Jul 2021 10:15:57 GMT -->
<head>
<!-- Basic Page Needs -->
<meta charset="utf-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
 <title>Login - Crypteruim</title>

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




<script language=javascript>
function checkform() {
  if (document.mainform.username.value=='') {
    alert("Please type your username!");
    document.mainform.username.focus();
    return false;
  }
  if (document.mainform.password.value=='') {
    alert("Please type your password!");
    document.mainform.password.focus();
    return false;
  }
  return true;
}
</script>



<section class="section-maps-form style2 parallax parallax4" style="height: 100vh;">
        <div class="section-overlay style2"></div>
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-6 text-center">
                    <div class="mainlogo">
                        <a href="https://crypteruim.net/"> <img src="https://crypteruim.net/images/logo.png" alt="image"></a>
                    </div>
                    
                    <!-- Form Starts -->
						
						
						@if(Session::has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                             @endif

                            @if($rmessage!="")
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $rmessage }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                    <div class="wrap-formrequest padding-lr100">

<form class="contactform wrap-form style3 clearfix" method="POST" action="{{ route('login') }}">
    {{csrf_field()}}
    
    <input type="hidden" name="form_id" value="16253072037637"><input type="hidden" name="form_token" value="84ed46e81c80ef313ae4fbe073f821a9">
<input type=hidden name=a value='do_login'>
<input type=hidden name=follow value=''>
<input type=hidden name=follow_id value=''>
<span class="title-form" style="text-align: center;
    margin-bottom: 20px;">Login Your Account</span>
<span class="flat-input">
    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    <input name ="email" value="{{ old('email') }}" id="email" placeholder="ENTER EMAIL" type="email" required>
</span>
<span class="flat-input">
    @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
    <input name="password" id="password" placeholder="ENTER PASSWORD" type="password" required>
</span>


<span class="flat-input">
     <input type="submit"  onclick="this.disabled=true;this.value='processing, please wait...';this.form.submit();" class="btn btn-blue btn-block pricing-action btn-primary nav-pills" value="Login" style=" border-radius: 40px;"></span>

                        </form>
                    </div>
                    <br><br> 
                    <span class="title-form" style="text-align: center;
    margin-bottom: 20px;color:#fff;">Create An Account?</span>
<a href="{{route('register')}}" style="color: #ff7742;">Click here</a>
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