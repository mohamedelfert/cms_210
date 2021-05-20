<?php require_once 'inc/topHeader.php';
$id = (int)$_GET['id'];
$user = $users->checkUserProfile($id);
?>
    <title><?php echo SITENAME; ?> - تعديل البيانات الشخصيه </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="col-md-12">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['edit'])){
                        $users->setInput($_POST['first_name'] , $_POST['last_name'] , $_POST['email'] , $_POST['password'] , $_POST['con_password'] , $id , $_POST['role']);
                        $users->displayErrors();
                    }
                    ?>
                </div>
                <h1 class="page-header"><i class="glyphicon glyphicon-user"></i> تعديل بيانات العضو</h1>
                <div style="background: #ffffff;padding: 15px;margin: 15px 0px;border: 1px solid #dfd8d8;">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET['id'];?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label">الاسم الاول</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo (isset($_POST['first_name']) ? $_POST['first_name'] : $user['first_name']); ?>" placeholder="أدخل الاسم الاول">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-sm-3 control-label">الاسم الاخير</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo (isset($_POST['last_name']) ? $_POST['last_name'] : $user['last_name']); ?>" placeholder="أدخل الاسم الاخير">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">البريد الالكتروني</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : $user['email']); ?>" placeholder="أدخل البريد الالكتروني">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">كلمه المرور</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo (isset($_POST['password']) ? $_POST['password'] : null); ?>" placeholder="ادخل كلمه المرور">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="con_password" class="col-sm-3 control-label">تاكيد كلمه المرور</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="con_password" name="con_password" value="<?php echo (isset($_POST['con_password']) ? $_POST['con_password'] : null); ?>" placeholder="اعاده كلمه المرور">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-sm-3 control-label">الرتبه</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="role" name="role">
                                    <option value="1" <?php echo ($user['is_Admin'] == true ? 'selected' : null);?>>مدير</option>
                                    <option value="0" <?php echo ($user['is_Admin'] == false ? 'selected' : null);?>>عضو</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-10">
                                <button type="submit" name="edit" id="edit" class="btn btn-warning">تعديل البيانات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'inc/footer.php'; ?>