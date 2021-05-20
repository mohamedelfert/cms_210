<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - الملف الشخصي </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><i class="glyphicon glyphicon-folder-open"></i> الملف الشخصي</h1>
                <div class="col-md-12">
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['delete'])){
                        $id = (int)$_GET['delete'];
                        $video = $video->deleteVideo($id);
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding: 0">
                                    <ul class="list-group" style="margin-bottom: 0">
                                        <li class="list-group-item">الاسم : <?php echo $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'];?></li>
                                        <li class="list-group-item">البريد الالكتروني : <?php echo $_SESSION['user']['email'];?></li>
                                        <li class="list-group-item">الرتبه : <span class="btn btn-info btn-sm"><?php if($_SESSION['user']['isAdmin'] == true){echo 'مدير الموقع';}?></span></li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <a href="../index.php?logout=true" class="btn btn-danger btn-sm pull-right">تسجيل الخروج</a>
                                    <a href="edit_user.php?id=<?php echo $_SESSION['user']['id'];?>" class="btn btn-warning btn-sm pull-left">تعديل البيانات</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title"><i class="glyphicon glyphicon-film"></i> الفيديوهات التي قمت باضافتها </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الصوره</th>
                                            <th class="text-center">العنوان</th>
                                            <th class="text-center">القسم</th>
                                            <th class="text-center">مشاهده</th>
                                            <th class="text-center">تعديل</th>
                                            <th class="text-center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $id = 1;
                                        $user_id = $_SESSION['user']['id'];
                                        $tubes = $video->displayVideos("WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 10");
                                        if (!empty($tubes)):
                                            foreach ($tubes as $tube):
                                                ?>
                                                <tr class="text-center">
                                                    <td class="text-center"><?php echo $id++; ?></td>
                                                    <td class="text-center"><img src="../libs/upload/<?php echo $tube['image']; ?>" alt="user_photo" width="52px" height="42px"></td>
                                                    <td class="text-center"><?php echo substr($tube['title'],0,120); ?> ...</td>
                                                    <td class="text-center"><?php echo $category->getCatNameById($tube['category']); ?></td>
                                                    <td class="text-center"><a href="../video.php?v=<?php echo $tube['videoLink']; ?>" target="_blank" class="btn btn-sm btn-info">مشاهده</a></td>
                                                    <td class="text-center"><a href="editvideo.php?id=<?php echo $tube['id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                                    <td class="text-center"><a href="profile.php?delete=<?php echo $tube['id']; ?>" class="btn btn-sm btn-danger">حذف</a></td>
                                                </tr>
                                            <?php
                                            endforeach;
                                        else:
                                            ?>
                                            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                                <strong>تنبيه !</strong> لم تقم برفع اي فيديوهات حتي الان يا : <?php echo $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'];?>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'inc/footer.php'; ?>