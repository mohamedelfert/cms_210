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
            <article class="col-xs-12 col-md-12" style="min-height: 290px;">
                <div class="col-md-7 col-md-offset-3" style="padding: 0;">
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login'])){
                        $login = new Login;
                        $login->setInput($_POST['email'], $_POST['password']);
                        $login->displayErrors();
                    }
                    ?>
                </div>
                <div class="col-md-7 col-md-offset-3" style="background: #c6bebe55;padding: 15px;margin-bottom: 15px;border: 1px solid #dfd8d8;">
                    <div>
                        <h1 style="font-size: 25px;" class="glyphicon glyphicon glyphicon-log-in"> تسجيل الدخول </h1>
                    </div>
                    <div style="background: #ffffff;padding: 15px;margin: 15px 0;border: 1px solid #dfd8d8;">
                        <?php
                        if (isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == true){
                            Messages::setMessage('info','تنبيه','انت مسجل دخول بالفعل يا ' . $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname']);
                            echo Messages::getMessage();
                        }else{
                            require_once 'inc/forms/login.php';
                        }
                        ?>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <!-- END INDEX MAIN -->
    <!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>