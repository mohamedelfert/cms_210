<?php require_once 'inc/topHeader.php';
$messages = $contact->getMessageById($_GET['id']);
?>
    <title><?php echo SITENAME; ?> - البريد الوارد </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><i class="glyphicon glyphicon-envelope"></i> رساله من : <?php echo $messages['username'];?></h1>
                <div class="col-md-8 col-md-offset-2">
                    <form id="messages">
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" id="email" name="email" disabled value="<?php echo $messages['email'];?>">
                        </div>
                        <div class="form-group">
                            <label for="email">اسم المستخدم</label>
                            <input type="text" name="email" class="form-control" id="username" name="username" disabled value="<?php echo $messages['username'];?>">
                        </div>
                        <div class="form-group">
                            <label for="desc">الرساله</label>
                            <textarea class="form-control" name="desc" id="desc" rows="6" disabled><?php echo $messages['message'];?></textarea>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="inbox.php" class="btn btn-block btn-primary">العوده للرسائل</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php require_once 'inc/footer.php'; ?>