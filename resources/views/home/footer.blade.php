<i class="scroll-top-btn scroll-top show"></i>
<footer class="light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="indexbc14.html?a=home">
                    <img class="logo-default scroll-hide" src="media/logo3aee.png?v=1.201990" alt="logo"
                        width="120" />
                    <img class="logo-retina scroll-hide" src="media/logo3aee.png?v=1.201990" alt="logo"
                        width="120" />
                    <img class="logo-default scroll-show" src="media/logo3aee.png?v=1.201990" alt="logo"
                        width="120" />
                    <img class="logo-retina scroll-show" src="media/logo3aee.png?v=1.201990" alt="logo"
                        width="120" />
                </a>
                <!-- <p>Full suite enable teams to develop unique search and discovery experiences.</p> -->
                <div class="icon-links icon-social icon-links-grid social-colors">



                </div><br><br>
                <ul class="icon-list icon-line">
                    "Great companies are built on great products."
                    <p>-Elon Musk</p>

                </ul>
            </div>
            <div class="col-lg-4">
                <h3>Quick Links</h3>
                <ul class="icon-list icon-line">
                    <li><a href="indexbc14.html?a=home">Home</a></li>
                    <li><a href="indexe47e.html?a=about">About Us</a></li>

                    <li><a href="indexdaa8.html?a=howto">Video Guides</a></li>
                    <li><a href="index058e.html?a=affiliate">Affiliate</a></li>
                    <li><a href="index38cd.html?a=faq">FAQ</a></li>
                    <li><a href="index54f9.html?a=tx">Live TX</a></li>
                    <li><a href="index15a0.html?a=support">Contact Us</a></li>
                    <li><a href="indexa972.html?a=rules">Terms</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="icon-list icon-line">
                    <li><b>Head office:</b>
                        <hr />
                        <p>
                            1339 South Park Ave Buffalo,
                            <br> NY 14220, USA.
                        </p>
                    </li>

                    <br>
                    <li><b>Branch office:</b>
                        <hr />
                        <p>
                            Oberkasseler Str. 1240545
                            <br>
                            Düsseldorf, Germany.

                        </p>
                    </li>


                    <br>
                    <li><b>Email</b>
                        <hr />
                        <p style="color:white;"><a
                                href="cdn-cgi/l/email-protection.html#6f1c1a1f1f001d1b2f1b0a0e021742190a1c1b410c0002"><span
                                    class="__cf_email__"
                                    data-cfemail="394a4c4949564b4d794d5c585441144f5c4a4d175a5654">[email&#160;protected]</span></a>
                        </p>
                    </li>
                    <!--
                        <li><b>Phone</b><hr /><p>+44 777 666 4455</p></li>
                    -->

                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bar">
        <div class="container">
            <span>© 2024 <a href="indexbc14.html?a=home">TEAMX-VEST.COM.</a> ALL RIGHTS RESERVED.</span>
            <span><a href="index15a0.html?a=support">Contact us</a> | <a href="indexa972.html?a=rules">Terms &
                    Conditions</a></span>
        </div>
    </div>
    <link rel="stylesheet" href="themekit/media/icons/iconsmind/line-icons.min.css">
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="themekit/scripts/parallax.min.js"></script>
    <script src="themekit/scripts/glide.min.js"></script>
    <script src="themekit/scripts/magnific-popup.min.js"></script>
    <script src="themekit/scripts/tab-accordion.js"></script>
    <script src="themekit/scripts/imagesloaded.min.js"></script>
    <script src="themekit/scripts/progress.js" async></script>


    <script src="themekit/scripts/contact-form/contact-form.js"></script>
    <script src='themekit/scripts/maps.min.js'></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDl7p8SWg-5kLe7i-usdYCu5m3eVllMDTs'></script>


    <!-- <script src="tools/sidebar/sidebar.js" data-setting="execoore"></script> -->
</footer>

<script src="spop.js"></script>



<script>
    function btc() {
        var btc = "https://api.blockcypher.com/v1/btc/main/txs";
        $.get(btc, function(data) {

            data.forEach(function(item) {
                const amount = item.total / 100000000;
                const link = "https://www.blockchain.com/btc/tx/" + item.hash;
                const date = new Date(item.received);
                date1 = date.toJSON().split("T")[0];
                $("#wdepo").remove();

                const tr = `<tr class="w3-center w3-tiny w3-hover-opacity ">
                            <td><img src="cssjs/50.html"></td>
                            <td>${date1}</td>
                            <td>${amount}<i class="icofont-bitcoin"></i></td>
                            <td><div title="${item.outputs[0].addresses[0]}" style="width:50px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap">
                            ${item.outputs[0].addresses[0]}
                            </div>
                            </td>
                            <td ><a href='${link}' style="text-decoration:none;font-size:xx-small;color:blue;" class="w3-center w3-hover-text-white " target="_blank">View on Blockchain</td>
                        </tr>`;


                $("#deposit").append(tr);

            });
        });

    }

    function btc1() {
        var btc1 = "https://api.blockcypher.com/v1/btc/main/txs";
        $.get(btc1, function(data) {
            data.forEach(function(item) {
                const amount = item.total / 100000000;
                const link = "https://www.blockchain.com/btc/tx/" + item.hash;
                const date = new Date(item.received);
                date1 = date.toJSON().split("T")[0];
                $("#wimage").remove();

                const tr = `<tr class="w3-center w3-tiny w3-hover-opacity ">
                            <td><img src="cssjs/50.html"></td>
                            <td>${date1}</td>
                            <td>${amount}<i class="icofont-bitcoin"></i></td>
                            <td><div title="${item.inputs[0].addresses[0]}" style="width:50px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap">
                            ${item.inputs[0].addresses[0]}
                            </div>
                            </td>
                            <td ><a href='${link}' style="text-decoration:none;font-size:xx-small;color:blue;" class="w3-center w3-hover-text-white " target="_blank">View on Blockchain</td>
                        </tr>`;


                $("#withdraw").append(tr);

            });
        });

    }





    setTimeout(btc, 500);
    setTimeout(btc1, 5000);
</script>

<script type="text/javascript">
    var country_list = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda",
        "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Belarus",
        "Belgium", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia & Herzegovina", "Botswana", "Brazil",
        "British Virgin Islands", "Brunei", "Bulgaria", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Chad",
        "Chile", "China", "Colombia", "Congo", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Cyprus",
        "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
        "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Finland",
        "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Gibraltar",
        "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Haiti", "Honduras", "Hong Kong", "Hungary",
        "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jersey",
        "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
        "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia",
        "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia",
        "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands",
        "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Norway", "Oman", "Pakistan",
        "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal",
        "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre & Miquelon", "San Marino",
        "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia",
        "South Africa", "South Korea", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden",
        "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga",
        "Trinidad & Tobago", "Tunisia", "Turkey", "Turkmenistan", , "Ukraine", "United Arab Emirates",
        "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen"
    ];

    function choice(array) {
        return array[Math.floor(Math.random() * array.length)];
    }

    function randomNumber(min, max) {
        return Math.random() * (max - min) + min;
    }


    function payinout() {
        var nu = Math.floor(randomNumber(100, 3500));
        var con = choice(country_list);
        var mode = choice(['deposited', 'withdrew']);

        spop({
            template: "An Investor from " + con + " " + mode + " $" + nu + " ...",

            position: 'bottom-center',
            style: 'success',
            autoclose: 4000,
        });

    }

    setInterval(payinout, 7000);
</script>





</body>

<!-- Mirrored from teamx-vest.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2024 22:50:21 GMT -->

</html>
