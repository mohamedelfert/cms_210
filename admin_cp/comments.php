<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - لوحه التحكم </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><i class="glyphicon glyphicon-comment"></i> التعليقات</h1>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10 col-lg-offset-1">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان التعليق</th>
                                        <th>التعليق</th>
                                        <th>اسم العضو</th>
                                        <th>مشاهده التعليق</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>العنوان</td>
                                        <td>التعليق هنا يكون</td>
                                        <td>محمد</td>
                                        <td><a href="" class="btn btn-sm btn-info">مشاهده</a></td>
                                        <td><a href="" class="btn btn-sm btn-warning">تعديل</a></td>
                                        <td><a href="" class="btn btn-sm btn-danger">حذف</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <nav class="text-center">
                            <ul class="pagination">
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php require_once 'inc/footer.php'; ?>