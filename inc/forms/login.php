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