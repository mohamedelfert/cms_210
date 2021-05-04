<?php require_once 'inc/topHeader.php';?>
    <title><?php echo SITENAME; ?> - تسجيل عضويه جديده </title>
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
                <div class="col-md-7 col-md-offset-3" style="padding: 0px">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])){
                        $register = new Register();
                        $register->setInput($_POST['Fname'],$_POST['Lname'],$_POST['email'],$_POST['password'],$_POST['con_password']);
                        $register->displayErrors();
                    }
                    ?>
                </div>
                <div class="col-md-7 col-md-offset-3" style="background: #c6bebe55;padding: 15px;margin-bottom: 15px;border: 1px solid #dfd8d8;">
                    <div>
                        <h1 style="font-size: 25px;" class="glyphicon glyphicon-user"> تسجيل عضويه جديده <small>الرجاء التأكد من تعبئه كافه الحقول</small></h1>
                    </div>
                    <div style="background: #ffffff;padding: 15px;margin: 15px 0px;border: 1px solid #dfd8d8;">
                        <?php
                        if (isset($_SESSION['is_logged']) and $_SESSION['is_logged'] == true){
                            Messages::setMessage('info','تنبيه','عفوا يا ' . $_SESSION['user']['FName'] . ' ' . $_SESSION['user']['LName'] . ' انت بالفعل مسجل لدينا');
                            echo Messages::getMessage();
                        }else{
                            require_once 'inc/forms/register.php';
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