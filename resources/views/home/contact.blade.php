@include('home.header')
<main>
    <section class="section-base ">
        <div class="container">
            <div class="row" data-anima="fade-bottom" data-timeline="asc" data-time="2000">
                <div class="col-md-6 mx-auto">



                    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script language=javascript>
                        function checkform() {
                            if (document.mainform.name.value == '') {
                                alert("Please type your full name!");
                                document.mainform.name.focus();
                                return false;
                            }
                            if (document.mainform.email.value == '') {
                                alert("Please enter your e-mail address!");
                                document.mainform.email.focus();
                                return false;
                            }
                            if (document.mainform.message.value == '') {
                                alert("Please type your message!");
                                document.mainform.message.focus();
                                return false;
                            }
                            return true;
                        }
                    </script>

                    <form method=post name=mainform onsubmit="return checkform()"><input type="hidden" name="form_id"
                            value="17255765914787"><input type="hidden" name="form_token"
                            value="d42d89c0d8c4832a73356691a18d01de">
                        <input type=hidden name=a value=support>
                        <input type=hidden name=action value=send>


                        <table cellspacing=0 cellpadding=2 border=0>
                            <div class="form-group">
                                <label for="email">Your Name</label>
                                <input type="text" name="name" value="" size=30 class='form-control'>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="text" name="email" value="" size=30 class='form-control'>
                            </div>
                            <div class="form-group">
                                <label for="email">Message</label>
                                <textarea name=message class='form-control' cols=45 rows=4></textarea>
                            </div>


                            <input type=submit value="Send" class="btn btn-block btn-lg btn-warning">
                        </table>
                    </form>




                </div>
            </div>
        </div>
    </section>
</main>
@include('home.footer')
