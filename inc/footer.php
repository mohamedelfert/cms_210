        <footer class="container-fluid" style="background: #f8f8f8 ; border-top: solid 1px #e7e7e7; padding: 20px;">
            <div class="container">
                <div class="row">
                    <div class="pull-right">جميع الحقوق محفوظه &copy; Mohamed Elfert <?php echo date('Y');?></div>
                    <div class="pull-left">
                        <div class="text-left"><i class="glyphicon glyphicon-send"></i> <a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">اتصال بنا</a></div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- FOOTER END --->

        <!-- MODEL START -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">اتصل بنا</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="email">بريدك الإلكتروني</label>
                                <input type="email" class="form-control" id="email" placeholder="البريد الاكتروني">
                            </div>
                            <div class="form-group">
                                <label for="username">الاسم</label>
                                <input type="text" class="form-control" id="username" placeholder="اسمك">
                            </div>
                            <div class="form-group">
                                <label for="message">الرسالة</label>
                                <textarea class="form-control" rows="4" id="message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                        <button type="button" class="btn btn-success">ارسال الرسالة</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODEL END ---->

        <!-- widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+201141521054", // WhatsApp number
                    instagram: "medo_elfert", // Instagram username
                    call_to_action: "تواصل معنا ", // Call to action
                    button_color: "#67ce50", // Color of button
                    position: "right", // Position may be 'right' or 'left'
                    order: "whatsapp,instagram", // Order of buttons
                    pre_filled_message: "استفسار !", // WhatsApp pre-filled message
                };
                var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- widget -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="libs/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="libs/js/bootstrap.min.js"></script>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </body>
</html>