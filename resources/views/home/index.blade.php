
<?php
header("location: https://coinexmining.net");
exit();
?>
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


        <div class="iq-bg banner-stars">
        <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="coinexfly" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.4.6.3 fullwidth mode -->
            <div id="rev_slider_2_1" class="rev_slider fullwidthabanner tp-overflow-hidden" style="display:none;" data-version="5.4.6.3">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-5" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="revslider/assets/100x50_b78ec-04.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="revslider/assets/b78ec-04.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-3" id="slide-5-layer-3" data-x="right" data-hoffset="106" data-y="bottom" data-voffset="196" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"x:[100%];y:bottom;opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="revslider/assets/04c8d-05.png" alt="" data-ww="206px" data-hh="370px" data-no-retina> </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-10" id="slide-5-layer-2" data-x="370" data-y="40" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":2500,"speed":1000,"frame":"0","from":"x:[175%];y:top;z:{-20,20};opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;"><img src="revslider/assets/0dd17-06.png" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-5" id="slide-5-layer-9" data-x="-77" data-y="389" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":2810,"speed":1000,"frame":"0","from":"x:[175%];y:[-175%];opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7;"><img src="revslider/assets/0dd17-06.png" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-8" id="slide-5-layer-10" data-x="right" data-hoffset="-100" data-y="center" data-voffset="105" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":3160,"speed":1000,"frame":"0","from":"x:[175%];y:[-175%];opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;"><img src="revslider/assets/0dd17-06.png" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption   tp-resizeme" id="slide-5-layer-4" data-x="30" data-y="272" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; white-space: nowrap; font-size: 58px; line-height: 58px; font-weight: 400; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;">Be ready to fly with </div>
                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption   tp-resizeme" id="slide-5-layer-5" data-x="30" data-y="343" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10; white-space: nowrap; font-size: 78px; line-height: 80px; font-weight: 700; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;"><span class="iq-font-yellow">Crystal Trade.</span></div>
                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption   tp-resizeme" id="slide-5-layer-6" data-x="30" data-y="432" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; white-space: nowrap; font-size: 14px; line-height: 26px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Raleway;">Millions of crypto currency are currently in the hands of many people worldwide but they don't know
                            <br> how to use it or invest it for more earnings, we have a plan to assist all crypto holders.
                            <br>Our platform was built from the ground up with multiple layers of protection. </div>
                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption rev-btn button" id="slide-5-layer-7" data-x="30" data-y="540" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":""}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[1,1,1,1]" data-paddingright="[30,30,30,30]" data-paddingbottom="[1,1,1,1]" data-paddingleft="[30,30,30,30]" style="">View more</div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-7" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="500" data-thumb="revslider/assets/100x50_bebf9-11.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="revslider/assets/bebf9-11.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption   tp-resizeme" id="slide-7-layer-6" data-x="center" data-hoffset="" data-y="center" data-voffset="-98" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 72px; line-height: 80px; font-weight: 700; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;">what are future </div>
                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-11" data-x="center" data-hoffset="" data-y="center" data-voffset="-47" data-width="['70']" data-height="['1']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1220,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;background-color:rgb(247,201,1);"> </div>
                        <!-- LAYER NR. 11 -->
                        <div class="tp-caption   tp-resizeme" id="slide-7-layer-14" data-x="center" data-hoffset="1" data-y="center" data-voffset="-12" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1870,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 24px; line-height: 48px; font-weight: 400; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; ">Join, Submit, Invest crypto with Crystal Trade ! </div>
                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-1" id="slide-7-layer-1" data-x="194" data-y="center" data-voffset="180" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":2660,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;"><img src="revslider/assets/1f9f4-07.png" alt="" data-ww="157px" data-hh="231px" data-no-retina> </div>
                        <!-- LAYER NR. 13 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-3" id="slide-7-layer-3" data-x="382" data-y="center" data-voffset="182" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":4830,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;"><img src="revslider/assets/e1b9a-10.png" alt="" data-ww="265px" data-hh="263px" data-no-retina> </div>
                        <!-- LAYER NR. 14 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-2" id="slide-7-layer-4" data-x="right" data-hoffset="383" data-y="center" data-voffset="193" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":3400,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10;"><img src="revslider/assets/1f9f4-07.png" alt="" data-ww="105px" data-hh="229px" data-no-retina> </div>
                        <!-- LAYER NR. 15 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-1" id="slide-7-layer-5" data-x="right" data-hoffset="166" data-y="center" data-voffset="192" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":4120,"speed":1000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11;"><img src="revslider/assets/09e47-08.png" alt="" data-ww="153px" data-hh="233px" data-no-retina> </div>
                        <!-- LAYER NR. 16 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-13" data-x="83" data-y="340" data-width="['10']" data-height="['10']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1850,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 17 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-16" data-x="1141" data-y="496" data-width="['12']" data-height="['12']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":5670,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 18 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-20" data-x="855" data-y="410" data-width="['12']" data-height="['12']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":3440,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 19 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-23" data-x="731" data-y="201" data-width="['10']" data-height="['10']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1850,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 15;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 20 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-24" data-x="919" data-y="177" data-width="['10']" data-height="['10']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1850,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 16;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 21 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-25" data-x="497" data-y="351" data-width="['10']" data-height="['10']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1850,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 17;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 22 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-26" data-x="1118" data-y="639" data-width="['10']" data-height="['10']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1850,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 18;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 23 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-27" data-x="406" data-y="130" data-width="['11']" data-height="['11']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":5670,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 19;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 24 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-28" data-x="1114" data-y="174" data-width="['10']" data-height="['10']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1850,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 20;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                        <!-- LAYER NR. 25 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-7-layer-29" data-x="33" data-y="165" data-width="['10']" data-height="['10']" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":1850,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 21;background-color:rgb(255,204,0);border-radius:90px 90px 90px 90px;">
                            <div class="rs-looped rs-pulse" data-easing="Linear.easeNone" data-speed="2" data-zoomstart="1" data-zoomend="0"> </div>
                        </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-8" data-transition="random-static,random-premium,random" data-slotamount="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-randomtransition="on" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-masterspeed="600,default,default,default" data-thumb="" data-rotate="0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="revslider/assets/transparent.png" data-bgcolor='#000000' style='background:#000000' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 26 -->
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-11" data-x="30" data-y="340" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":660,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="revslider/assets/607ef-12.png" alt="" data-ww="146px" data-hh="180px" data-no-retina> </div>
                        <!-- LAYER NR. 27 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-2" id="slide-8-layer-12" data-x="-170" data-y="180" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":1170,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;">
                            <div class="rs-looped rs-rotate" data-easing="Linear.easeNone" data-startdeg="90" data-enddeg="-90" data-speed="50" data-origin="50% 50%"><img src="revslider/assets/57b4d-13.png" alt="" data-ww="525px" data-hh="504px" data-no-retina> </div>
                        </div>
                        <!-- LAYER NR. 28 -->
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-4" data-x="right" data-hoffset="28" data-y="center" data-voffset="-80" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 58px; line-height: 58px; font-weight: 400; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;">your best moves now! </div>
                        <!-- LAYER NR. 29 -->
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-5" data-x="right" data-hoffset="28" data-y="center" data-voffset="-10" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; white-space: nowrap; font-size: 65px; line-height: 70px; font-weight: 700; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;"><span class="iq-font-yellow">Easy and secure.</span></div>
                        <!-- LAYER NR. 30 -->
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-6" data-x="right" data-hoffset="30" data-y="center" data-voffset="60" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; white-space: nowrap; font-size: 14px; line-height: 26px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Raleway;">When choosing an exchange, trust matters. That’s why security has been and will
                            <br> always be our top consideration. We believe in the potential of crypto currency</div>
                        <!-- LAYER NR. 31 -->
                        <div class="tp-caption rev-btn button" id="slide-8-layer-7" data-x="right" data-hoffset="30" data-y="center" data-voffset="135" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":""}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[1,1,1,1]" data-paddingright="[35,35,35,35]" data-paddingbottom="[1,1,1,1]" data-paddingleft="[35,35,35,35]" style="">View more</div>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div>
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
    </div>
    <!-- Banner End -->


<!-- Topbar Chart -->
        <div class="topbar-chart iq-chart">
            <div class="container-fluid">
                <div class="row">
                    <script>
                    baseUrl = "https://widgets.cryptocompare.com/";
                    var scripts = document.getElementsByTagName("script");
                    var embedder = scripts[scripts.length - 1];
                    var cccTheme = { "General": { "enableMarquee": true } };
                    (function() {
                        var appName = encodeURIComponent(window.location.hostname);
                        if (appName == "") { appName = "local"; }
                        var s = document.createElement("script");
                        s.type = "text/javascript";
                        s.async = true;
                        var theUrl = baseUrl + 'serve/v3/coin/header?fsyms=BTC,ETH,XMR,LTC,DASH&tsyms=BTC,USD,CNY,EUR';
                        s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                        embedder.parentNode.appendChild(s);
                    })();
                    </script>
                </div>
            </div>
        </div>

 <!-- Topbar Chart End -->

    <!-- Main Content -->
    <div class="main-content">
        <!-- Easy Steps -->
        <section class="overview-block-ptb easy-step">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title">
                            <h3 class="title iq-tw-5 iq-mb-25">3 Easy Steps to Get Started</h3>
                            <p>If you are a crypto currency holder, you can start exploring our versatile trading products. In our exchange market, you can invest hundreds of crypto currency, without paying any fees </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12 iq-mt-20">
                        <div class="iq-features1">
                            <div class="iq-bg" style="background-image: url('images/feature/01.jpg');"></div>
                            <div class="iq-blog">
                                <div class="step">1</div>
                                <div class="icon"><i aria-hidden="true" class="ion-ios-compose-outline"></i></div>
                                <h4 class="iq-tw-5 iq-mt-20"><a href="javascript:void(0)">Fill Up Your Form</a></h4>
                                <p>Register a Crystal Trade account from our website with your name, email, phone number and a unique password.</p>
                                <a href="javascript:void(0)">Read More <i aria-hidden="true" class="ion-ios-arrow-forward"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 iq-mt-20">
                        <div class="iq-features1">
                            <div class="iq-bg" style="background-image: url('images/feature/01.jpg');"></div>
                            <div class="iq-blog">
                                <div class="step">2</div>
                                <div class="icon"><i aria-hidden="true" class="ion-ios-paper-outline"></i></div>
                                <h4 class="iq-tw-5 iq-mt-20"><a href="javascript:void(0)">Make Payment</a></h4>
                                <p>If you already hold crypto in another wallet, you can deposit them into your Crystal Trade Wallet and invest.</p>
                                <a href="javascript:void(0)">Read More <i aria-hidden="true" class="ion-ios-arrow-forward"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 iq-mt-20">
                        <div class="iq-features1">
                            <div class="iq-bg" style="background-image: url('images/feature/01.jpg');"></div>
                            <div class="iq-blog">
                                <div class="step">3</div>
                                <div class="icon"><i aria-hidden="true" class="ion-ios-cart-outline"></i></div>
                                <h4 class="iq-tw-5 iq-mt-20"><a href="javascript:void(0)">Withdraw/Reinvest</a></h4>
                                <p>Withdraw your investment returns, or you can choose to use your returns to invest again.</p>
                                <a href="javascript:void(0)">Read More <i aria-hidden="true" class="ion-ios-arrow-forward"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Easy Steps -->
        <!-- About Us -->
        <section class="overview-block-ptb iq-bg iq-over-black-80 jarallax iq-about-us" style="background-image: url('images/bg/bg-13.jpg'); background-position: left center;">
            <div class="container">
                <div class="row">
              
                    <div class="col-lg-8 col-md-12">
                        <h2 class="iq-font-white iq-tw-6">Everything <br>
                            <span class="iq-font-yellow">You Need To Know!</span>
                        </h2>
                        <p class="iq-font-white iq-mt-20">Crystal Trade is based in UK and Bermuda, placing us in world class financial systems governed by revolutionary legislation. We operate under the framework of the Digital Asset Busines Act (DABA) in Bermuda, and within the Transactions Systems Based on Trustworthy Technologies Act (the “Blockchain Act”) in Boston. Crystal Trade (Bermuda) is fully licensed to conduct Digital Asset Business by the Bermuda Monetary Authority (BMA) </p>
                        <ul class="listing-hand iq-tw-5 iq-font-white">
                            <li class="iq-mt-20">Our company is licensed to operate a Digital Asset Business.</li>
                            <li class="iq-mt-20">Our Company must, for the first three years follow the rules of its license.</li>
                            <li class="iq-mt-20">OurCompany maintains minimum net assets of USD 3,070,000 amount, or equivalent.</li>
                            <li class="iq-mt-20">We are supervised by the Office of Economic Affairs of UK and the UK Financial Market Authority.</li>
                           
                        </ul>
                       
                    </div>
                          <div class="col-lg-4 col-md-12 iq-about1">
                              
                        <div style="height:433px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38; padding: 0px; margin: 0px; width: 100%;"><div style="height:413px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=dark&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
                            
                        </div>

                    </div>
                </div>
        
        </section>
        <!-- About Us -->
        
        
        <section class="overview-block-ptb iq-feature4 iq-additional">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title">
                            <h3 class="title iq-tw-5 iq-mb-20">Our Plan</h3>
                            
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    @foreach ($plans as $plan)
                    <div class="col-sm-6 col-lg-3 iq-r-mt-40">
                        
                        <div class="pricing-small dark-bg">
                            <h6 class="iq-font-yellow">Minimum: {{$settings->currency}}{{$plan->min_price}} </h6>
                            <h3 class="iq-tw-6  iq-mtb-10">{{$plan->expiration}}</h3>
                            
                        
                            <span class="iq-mt-15 text-uppercase">*you get 
                            <?php 
              
              
              
$a= 100;  
$b= $plan->increment_amount;
$c=$b-$a;  
echo $c.'%'; 
               ?>*</span>
                            
                            
                            
                          @if($settings->site_preference =="Web dashboard only")
                           @guest 
                            <a class="button iq-mt-25" href="javascript:void(0)" data-toggle="modal" data-target=".iq-register" data-whatever="@fat">
                                Buy {{$plan->name}} Plan</a>
                                
                            @else    
                            
                            <a class="button iq-mt-25" href="https://crystaltrade.org/dashboard/mplans" >
                                Deposit Now</a>
                                
                                @endguest
                                         @endif
                        </div>
                        
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        
        
        <!-- Features -->
        <section class="overview-block-ptb iq-feature-aria">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title">
                            <h3 class="title iq-tw-5 iq-mb-25">Crystal Trade Features</h3>
                            
                        </div>
                    </div>
                </div>
                <div class="row pos-r h-100">
                    <div class="col-lg-4 col-md-12 text-right">
                        <div class="iq-feature2 iq-mtb-20 first-l">
                            <h4 class="iq-font-yellow iq-tw-5"><a href="#"> Intuitive Interface
</a><span class="iq-icon iq-ml-10"><img class="img-fluid" src="images/services/icon/01.png" alt=""></span>
                           </h4>
                            <p>Not many investors are familiar with trading. with us it is easy.<a href="javascript:void(0)" class="iq-font-green">[ ... ]</a></p>
                        </div>
                        <div class="iq-feature2 iq-mtb-20 second-l">
                            <h4 class="iq-font-yellow iq-tw-5"><a href="#">Secure and Stable
</a> <span class="iq-icon iq-ml-10"><img class="img-fluid" src="images/services/icon/02.png" alt=""></span>
                            </h4>
                            <p>it’s not surprising that security around cryptocurrencies must be a forefront consideration. <a href="javascript:void(0)" class="iq-font-green">[ ... ]</a></p>
                        </div>
                        <div class="iq-feature2 iq-mtb-20 first-l">
                            <h4 class="iq-font-yellow iq-tw-5"><a href="#">Usability</a> <span class="iq-icon iq-ml-10"><img class="img-fluid" src="images/services/icon/03.png" alt=""></span>
                           </h4>
                            <p>Our system is easy to use to ensure speeding up completing transactions. <a href="javascript:void(0)" class="iq-font-green">[ ... ]</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 align-self-center text-center">
                        <img class="img-fluid" src="images/feature/features-img1.png" alt="">
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="iq-feature2 iq-mtb-20 first-r">
                            <h4 class="iq-font-yellow iq-tw-5"><span class="iq-icon iq-mr-10"><img class="img-fluid" src="images/services/icon/04.png" alt=""></span><a href="#">Trustworthy</a>
                           </h4>
                            <p>We safely do trades without the value of your crypto currency being diminished.  <a href="javascript:void(0)" class="iq-font-green">[ ... ]</a></p>
                        </div>
                        <div class="iq-feature2 iq-mtb-20 second-r">
                            <h4 class="iq-font-yellow iq-tw-5"><span class="iq-icon iq-mr-10"><img class="img-fluid" src="images/services/icon/05.png" alt=""></span><a href="#">Legally Recognized</a>
                              </h4>
                            <p>Crystal Trade is accepted by the government of every country as a legal entity.  <a href="javascript:void(0)" class="iq-font-green">[ ... ]</a></p>
                        </div>
                        <div class="iq-feature2 iq-mtb-20 first-r">
                            <h4 class="iq-font-yellow iq-tw-5"><span class="iq-icon iq-mr-10"><img class="img-fluid" src="images/services/icon/06.png" alt=""></span><a href="#">Transparent</a>
                             </h4>
                            <p>Our system keeps its services and transaction transparent to the public <a href="javascript:void(0)" class="iq-font-green">[ ... ]</a></p>
                        </div>
                    </div>
                    <div class="particles text-center"><img class="img-fluid" src="images/particles.png" alt=""></div>
                </div>
            </div>
        </section>
        <!-- Features -->
        <!-- Bitcoin Charts -->
        
      <!-- TradingView Widget BEGIN -->
<div class="container tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by Crystal Trade</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
  {
  "width": "100%",
  "height": "600",
  "defaultColumn": "overview",
  "screener_type": "crypto_mkt",
  "displayCurrency": "USD",
  "colorTheme": "dark",
  "locale": "en",
  "isTransparent": true
}
  </script>
</div>
<!-- TradingView Widget END -->
        <!-- Why us -->
        <!-- Contact Us -->
        <section class="overview-block-ptb8 iq-bg iq-over-black-80 jarallax" style="background-image: url('images/bg/bg-7.jpg'); background-position: center center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8 text-center iq-need-help">
                        <img src="images/need-help.png" alt="">
                        <h3 class="iq-font-yellow iq-tw-5 iq-mt-20">Any Query? Contact Us</h3>
                        <ul class="list-inline iq-mt-40">
                            <li class="list-inline-item iq-font-yellow">+447915604262</li>
                            <li class="list-inline-item iq-font-white">support@crystaltrade.org</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us -->
        <!-- Team -->
        
        <!-- Team -->
        <!-- Counter -->
        <section class="overview-block-ptb iq-bg iq-over-black-80 jarallax iq-we-happy" style="background-image: url('images/bg/bg-5.jpg'); background-position: center center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <h2 class="iq-font-white iq-tw-5">Crystal Trade is the <span class="iq-font-yellow">best choice</span> for you if:</h2>
                        <ul class="listing-hand iq-mt-30 iq-tw-5 iq-font-white">
                            <li class="iq-mt-20">Want to trade crypto to other cryptocurrencies</li>
                            <li class="iq-mt-20">You are looking for legit and legalised crypto investment.</li>
                            <li class="iq-mt-20"></li>
                            <li class="iq-mt-20">You want elegant, and secure platform to build your crypto.</li>
                            <li class="iq-mt-20">You are a beginner and active crypto currency traders</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12 counter-blog">
                        <div class="heading-left iq-font-white">
                            <h3 class="title iq-tw-5 iq-mb-25 iq-font-white">We're Fulfilled</h3>
                            <p>Premium 24/7 support available to all customers worldwide by livechat or WhatsApp. Dedicated account managers for users.

</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
                                <div class="counter"><i class="ion-ios-folder-outline iq-font-yellow" aria-hidden="true"></i>
                                    <div class="right text-left">
                                        <span class="timer1 iq-font-white"  data-speed="10000"><?php 
              
$x=3109;  
$y= $num_rows;
$z=$x+$y;  
echo  $z; ?></span>
                                        <label class="iq-font-white">USERS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
                                <div class="counter"> <i class="ion-ios-paper-outline iq-font-yellow" aria-hidden="true"></i>
                                    <div class="right text-left">
                                        <span class="timer1 iq-font-white"  data-speed="10000"><?php 
              
              
              
$a=80290210;  
$b= $num_depo;
$c=$a+$b;  
echo '$'.$c; 
               ?></span>
                                        <label class="iq-font-white">DEPOSITS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
                                <div class="counter"> <i class="ion-ios-person-outline iq-font-yellow" aria-hidden="true"></i>
                                    <div class="right text-left">
                                        <span class="timer1 iq-font-white" data-speed="10000"><?php 
$d=160983200;  
$e= $num_withd;
$f=$e+$d;  
echo '$'.$f; 
?></span>
                                        <label class="iq-font-white">WITHDRAWALS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
                                <div class="counter"> <i class="ion-ios-star-outline iq-font-yellow" aria-hidden="true"></i>
                                    <div class="right text-left">
                                        <span class="timer1 iq-font-white" data-speed="10000">127</span>
                                        <label class="iq-font-white">COUNTRIES</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Counter -->
        <!-- Testimonial -->
        
        <!-- Testimonial -->
        <!-- Latest News -->
    
        <!-- Latest News -->
        <!-- Clients -->
    
        <!-- Clients -->
    </div>
        
        
        @include('home.footer')
        

    </div>
    <!-- Wrapper Ends -->
</body>


<!-- Mirrored from slimhamdi.net/bayya/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 22:04:45 GMT -->
</html>