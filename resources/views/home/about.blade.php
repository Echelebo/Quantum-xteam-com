<?php

$servername="localhost";
$username="coinsukq_crystaltrade";
$password="echelebo9";
$dbname="coinsukq_crystaltrade";

$con=mysqli_connect($servername,$username,$password,$dbname);

$sql = "SELECT count(id) AS total FROM users";
$result=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];

$depo = "SELECT sum(amount) AS depodepo FROM deposits";
$mydeposit=mysqli_query($con,$depo);
$myvalues=mysqli_fetch_assoc($mydeposit);
$num_depo=$myvalues['depodepo'];

$withdraw = "SELECT sum(amount) AS withd FROM withdrawals";
$mywithdraw=mysqli_query($con,$withdraw);
$mywithdrawvalues=mysqli_fetch_assoc($mywithdraw);
$num_withd=$mywithdrawvalues['withd'];


?>

@include('home.header')

<!-- Header End -->
    <div class="clearfix"></div>
    <!--======= Breadcrumb Inner Page =======-->
    <section class="iq-bg iq-bg-fixed iq-over-black-70 jarallax iq-breadcrumb text-center iq-font-white" style="background-image: url('images/bg/bg-2.jpg'); background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="heading-title iq-mb-25">
                        <h3 class="title text-uppercase iq-font-white iq-tw-6">About Us</h3>
                    </div>
                   
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://crystaltrade.org">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </section>
    <!--======= Breadcrumb Inner Page =======-->
    <!-- Main Content -->
    <div class="main-content">
        <!-- About Us -->
        <section class="overview-block-ptb device-blog">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="iq-font-white iq-tw-5">Crystal Trade: <span class="iq-font-yellow">Crypto Investment</span></h3>
                        <p class="iq-mt-10">Crystal Trade is based in UK and Bermuda, placing us in world class financial systems governed by revolutionary legislation. We operate under the framework of the Digital Asset Busines Act (DABA) in Bermuda, and within the Transactions Systems Based on Trustworthy Technologies Act (the “Blockchain Act”) in Boston. Crystal Trade (Bermuda) is fully licensed to conduct Digital Asset Business by the Bermuda Monetary Authority (BMA).</p>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <img class="img-fluid mx-auto d-block iq-mt-10" src="images/device/01.png" alt="icon1">
                    </div>
                    <div class="col-lg-6 col-md-12 about-box align-self-center">
                        <blockquote class="iq-mt-20 dark-bg iq-pall-30 font-italic">Crystal Trade is a community-driven crypto blockchain software system, with developers and contributors from all over the world. Crystal Trade is the decentralized exchange feature developed on top of Block Chain.
.</blockquote>
                        <p class="iq-mt-10 font-weight-bold">Crystal Trade is the native asset on block Chain, a crypto exchange software system developed by investors and the community. We have multiple forms of utility and powers the cap market. </p>
                        <p>Our vision is to increase the freedom of Crypto currency globally. We believe that by spreading this freedom, we can significantly improve lives around the world.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us -->
        <!-- services -->
        <section class="overview-block-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title iq-mb-0">
                            <h3 class="title iq-tw-5 iq-mb-20">Crystal Trade Features</h3>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 iq-mt-30">
                        <div class="iq-feature6 iq-mt-50">
                            <div class="iq-icon yellow-bg">
                                <i aria-hidden="true" class="fa fa-fighter-jet"></i>
                            </div>
                            <div class="fancy-content">
                                <h5 class="iq-tw-5"><a href="#">Intuitive Interface</a></h5>
                                <p>Not many investors are familiar with trading. with us it is easy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 iq-mt-30">
                        <div class="iq-feature6 iq-mt-50">
                            <div class="iq-icon yellow-bg">
                                <i aria-hidden="true" class="fa fa-lock"></i>
                            </div>
                            <div class="fancy-content">
                                <h5 class="iq-tw-5"><a href="#">Secure and Stable</a></h5>
                                <p>it’s not surprising that security around cryptocurrencies must be a forefront consideration. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 iq-mt-30">
                        <div class="iq-feature6 iq-mt-50">
                            <div class="iq-icon yellow-bg">
                                <i aria-hidden="true" class="fa fa-exchange"></i>
                            </div>
                            <div class="fancy-content">
                                <h5 class="iq-tw-5"><a href="#">Usability</a></h5>
                                <p>Our system is easy to use to ensure speeding up completing transactions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 iq-mt-30">
                        <div class="iq-feature6 iq-mt-50">
                            <div class="iq-icon yellow-bg">
                                <i aria-hidden="true" class="ion-android-phone-portrait"></i>
                            </div>
                            <div class="fancy-content">
                                <h5 class="iq-tw-5"><a href="#">Trustworthy</a></h5>
                                <p>We safely do trades without the value of your crypto currency being diminished.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 iq-mt-30">
                        <div class="iq-feature6 iq-mt-50">
                            <div class="iq-icon yellow-bg">
                                <i aria-hidden="true" class="fa fa-bar-chart"></i>
                            </div>
                            <div class="fancy-content">
                                <h5 class="iq-tw-5"><a href="#">Legally Recognized</a></h5><p>Crystal Trade is accepted by the government of every country as a legal entity.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 iq-mt-30">
                        <div class="iq-feature6 iq-mt-50">
                            <div class="iq-icon yellow-bg">
                                <i aria-hidden="true" class="fa fa-headphones"></i>
                            </div>
                            <div class="fancy-content">
                                <h5 class="iq-tw-5"><a href="#">Transparent</a></h5>
                                <p>Our system keeps its services and transaction transparent to the public.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services -->

        <!-- Counter -->
        <div class="overview-block-ptb3 iq-bg iq-over-black-80 jarallax" style="background-image: url('images/bg/bg-5.jpg'); background-position: center center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
                        <div class="counter"><i class="ion-ios-folder-outline iq-font-yellow" aria-hidden="true"></i>
                            <div class="right text-left">
                                <span class="timer1 iq-font-white" data-to="1540" data-speed="10000"><?php 
              
$x=3109;  
$y= $num_rows;
$z=$x+$y;  
echo  $z; ?></span>
                                <label class="iq-font-white">USERS</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
                        <div class="counter"> <i class="ion-ios-paper-outline iq-font-yellow" aria-hidden="true"></i>
                            <div class="right text-left">
                                <span class="timer1 iq-font-white" data-to="2530" data-speed="10000"><?php 
              
              
              
$a=80290210;  
$b= $num_depo;
$c=$a+$b;  
echo '$'.$c; 
               ?></span>
                                <label class="iq-font-white">DEPOSITS</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
                        <div class="counter"> <i class="ion-ios-person-outline iq-font-yellow" aria-hidden="true"></i>
                            <div class="right text-left">
                                <span class="timer1 iq-font-white" data-to="8120" data-speed="10000"><?php 
$d=160983200;  
$e= $num_withd;
$f=$e+$d;  
echo '$'.$f; 
?></span>
                                <label class="iq-font-white">PAYOUTS</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
                        <div class="counter"> <i class="ion-ios-star-outline iq-font-yellow" aria-hidden="true"></i>
                            <div class="right text-left">
                                <span class="timer1 iq-font-white" data-to="1620" data-speed="10000">127</span>
                                <label class="iq-font-white">COUNTRIES</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter -->
        @include('home.footer')
</body>


<!-- Mirrored from slimhamdi.net/bayya/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 22:06:21 GMT -->
</html>