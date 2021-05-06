<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - لوحه التحكم </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php require_once 'inc/sidbar.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="col-sm-12">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['addCat'])){
                    $addCat = new Category();
                    $addCat->addSetInput($_POST['cat_name'],$_POST['cat_unique']);
                    $addCat->displayAddErrors();
                }
                ?>
            </div>
            <h1 class="page-header"><i class="glyphicon glyphicon-list"></i> اقسام الموقع</h1>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                       <div class="table-responsive">
                           <table class="table table-hover">
                               <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم القسم</th>
                                        <th>الاسم الفريد</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>1</td>
                                   <td>افلام</td>
                                   <td>movies</td>
                                   <td><a href="" class="btn btn-sm btn-warning">تعديل</a></td>
                                   <td><a href="" class="btn btn-sm btn-danger">حذف</a></td>
                               </tr>
                               </tbody>
                           </table>
                       </div>
                    </div>
                    <div class="col-md-4">
                        <div class="page-header">اضافه قسم جديد</div>
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="form-group">
                                <label for="cat_name" class="col-sm-3 control-label">اسم القسم</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo (isset($_POST['cat_name']) ? $_POST['cat_name'] : null); ?>" placeholder="ادخل اسم القسم">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cat_unique" class="col-sm-3 control-label">الاسم الفريد</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cat_unique" name="cat_unique" value="<?php echo (isset($_POST['cat_unique']) ? $_POST['cat_unique'] : null); ?>" placeholder="ادخل الاسم الفريد">
                                </div>
                            </div>
                            <div class="col-sm-offset-3 col-sm-8">
                                <button type="submit" name="addCat" class="btn btn-info btn-block">اضافه</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once 'inc/footer.php'; ?>