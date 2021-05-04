<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - تسجيل الدخول </title>
<?php require_once 'inc/header.php'; ?>
    <!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
    <!-- NAVBAR END ---->
    <!-- HEADER START -->
<?php require_once 'inc/welcome.php'; ?>
    <!-- HEADER END --->
    <!-- INDEX MAIN -->

    <main class="container">
        <div class="row">
            <article class="col-xs-12 col-md-12">
                <div class="col-md-7 col-md-offset-3" style="padding: 0px;">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login'])){
                        $login = new Login();
                        $login->setInput($_POST['email'],$_POST['password']);
                        $login->displayErrors();
                    }
                    ?>
                </div>
                <div class="col-md-7 col-md-offset-3" style="background: #c6bebe55;padding: 15px;margin-bottom: 15px;border: 1px solid #dfd8d8;">
                    <div>
                        <h1 style="font-size: 25px;" class="glyphicon glyphicon glyphicon-log-in"> تسجيل الدخول </h1>
                    </div>
                    <div style="background: #ffffff;padding: 15px;margin: 15px 0px;border: 1px solid #dfd8d8;">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">البريد الالكتروني</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="أدخل البريد الالكتروني">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">كلمه المرور</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="ادخل كلمه المرور">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-10">
                                    <button type="submit" name="login" id="login" class="btn btn-danger">تسجيل الدخول</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <!-- END INDEX MAIN -->
    <!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>