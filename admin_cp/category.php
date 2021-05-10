<?php require_once 'inc/topHeader.php';?>
    <title><?php echo SITENAME; ?> - الاقسام </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php require_once 'inc/sidbar.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="col-sm-12">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['addCat'])){
                    $category->addSetInput($_POST['cat_name'],$_POST['cat_unique']);
                    $category->displayAddErrors();
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['editCat'])){
                    $category->editCatInfo($_POST['cat_name'],$_POST['cat_unique'],$_POST['id']);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['box']) and $_GET['box'] == 'delete'){
                    $category->deleteCategory($_GET['id']);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['box']) and $_GET['box'] == 'edit'){
                    $cat_row = $category->getCatInfo($_GET['id']);
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
                               <?php
                               $id = 1;
                               if (!empty($cat)):
                                   foreach ($cat as $row):
                               ?>
                                   <tr>
                                       <td><?php echo $id++;?></td>
                                       <td><?php echo $row['cat_name'];?></td>
                                       <td><?php echo $row['cat_unique'];?></td>
                                       <td><a href="category.php?box=edit&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                       <td><a href="category.php?box=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">حذف</a></td>
                                   </tr>
                               <?php
                                    endforeach;
                               else:
                               ?>
                                   <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                       <strong>تنبيه !</strong> لا يوجد اي اقسام بالموقع حاليا
                                   </div>
                               <?php
                               endif;
                               ?>
                               </tbody>
                           </table>
                       </div>
                    </div>
                    <div class="col-md-4">
                        <?php if (isset($_GET['box']) and $_GET['box'] == 'edit'): ?>
                        <div class="page-header">تحديث بيانات القسم</div>
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="form-group">
                                <label for="cat_name" class="col-sm-3 control-label">اسم القسم</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo $cat_row['cat_name']; ?>" placeholder="ادخل اسم القسم">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cat_unique" class="col-sm-3 control-label">الاسم الفريد</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cat_unique" name="cat_unique" value="<?php echo str_replace('-',' ',$cat_row['cat_unique']); ?>" placeholder="ادخل الاسم الفريد">
                                </div>
                            </div>
                            <div class="col-sm-offset-3 col-sm-8">
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <button type="submit" name="editCat" class="btn btn-info btn-block">تحديث</button>
                            </div>
                        </form>
                        <?php else: ?>
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
                        <?php endif;?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once 'inc/footer.php'; ?>