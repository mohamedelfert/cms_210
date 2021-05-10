<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - لوحه التحكم </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['delete'])){
                        $id = (int)$_GET['delete'];
                        $video = $video->deleteVideo($id);
                    }
                ?>
                <h1 class="page-header"><i class="glyphicon glyphicon-film"></i> الفيديوهات بالموقع</h1>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الصوره</th>
                                            <th class="text-center">العنوان</th>
                                            <th class="text-center">القسم</th>
                                            <th class="text-center"><i class="glyphicon glyphicon-comment"></i></th>
                                            <th class="text-center">مشاهده</th>
                                            <th class="text-center">تعديل</th>
                                            <th class="text-center">حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $id = 1;
                                    if (!empty($tubes)):
                                        foreach ($tubes as $tube):
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $id++; ?></td>
                                            <td><img src="../libs/upload/<?php echo $tube['image']; ?>" alt="user_photo" class="img-thumbnail" style="width: 100px;height: 75px;"></td>
                                            <td><?php echo substr($tube['title'],0,120); ?> ...</td>
                                            <td><?php echo $category->getCatNameById($tube['category']); ?></td>
                                            <td>1</td>
                                            <td><a href="../video.php?v=<?php echo $tube['videoLink']; ?>" class="btn btn-sm btn-info">مشاهده</a></td>
                                            <td><a href="editvideo.php?id=<?php echo $tube['id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                            <td><a href="tubes.php?delete=<?php echo $tube['id']; ?>" class="btn btn-sm btn-danger">حذف</a></td>
                                        </tr>
                                    <?php
                                        endforeach;
                                    else:
                                    ?>
                                        <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                            <strong>تنبيه !</strong> لا يوجد اي فيديوهات بالموقع حاليا
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