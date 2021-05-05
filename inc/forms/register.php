<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal">
    <div class="form-group">
        <label for="first_name" class="col-sm-3 control-label">الاسم الاول</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo (isset($_POST['first_name']) ? $_POST['first_name'] : null); ?>" placeholder="أدخل الاسم الاول">
        </div>
    </div>
    <div class="form-group">
        <label for="last_name" class="col-sm-3 control-label">الاسم الاخير</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo (isset($_POST['last_name']) ? $_POST['last_name'] : null); ?>" placeholder="أدخل الاسم الاخير">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">البريد الالكتروني</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : null); ?>" placeholder="أدخل البريد الالكتروني">
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
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" name="register" id="register" class="btn btn-danger">التسجيل</button>
        </div>
    </div>
</form>