<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - البريد الوارد </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><i class="glyphicon glyphicon-inbox"></i> البريد الوارد</h1>
                <div class="col-md-12">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['delete'])){
                    $contact->deleteMessages($_GET['delete']);
                }
                ?>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>البريد الالكتروني</th>
                                            <th>الرساله</th>
                                            <th>مشاهده</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    if (!empty($messages)):
                                        foreach ($messages as $value):
                                    ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $value['username'];?></td>
                                            <td><?php echo $value['email'];?></td>
                                            <td><?php echo $value['message'];?></td>
                                            <td><a href="read.php?id=<?php echo $value['id'];?>" class="btn btn-sm btn-info">مشاهده</a></td>
                                            <td><a href="inbox.php?delete=<?php echo $value['id'];?>" class="btn btn-sm btn-danger">حذف</a></td>
                                        </tr>
                                    <?php
                                        endforeach;
                                    else:
                                    ?>
                                        <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                            <strong>تنبيه !</strong> لا يوجد اي رسائل حاليا
                                        </div>
                                    <?php
                                    endif;
                                    ?>
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