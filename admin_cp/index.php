<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - لوحه التحكم </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php require_once 'inc/sidbar.php'; ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i> لوحه التحكم</h1>
            <div class="col-md-12">
                <?php
                if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['delete'])){
                    $id = (int)$_GET['delete'];
                    $video = $video->deleteVideo($id);
                }
                if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['deletecomment'])){
                    $video->deleteAnyComment($_GET['deletecomment']);
                }
                ?>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
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
                                <a href="edit-user.php?id=<?php echo '1';?>" class="btn btn-warning btn-sm pull-left">تعديل البيانات</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-4">
                            <div class="panel panel-info text-center">
                                <div class="panel-heading">الاعضاء المسجلين</div>
                                <div class="panel-body">
                                    <h1 style="color: #7285b1"><i class="glyphicon glyphicon-user pull-right"></i></h1>
                                    <p class="pull-left" style="font-size: 25px">5</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-footer">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                    <a href="users.php">مشاهده الاعضاء</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-danger text-center">
                                <div class="panel-heading">الفيديوهات</div>
                                <div class="panel-body">
                                    <h1 style="color: #b17277"><i class="glyphicon glyphicon-film pull-right"></i></h1>
                                    <p class="pull-left" style="font-size: 25px"><?php echo $video->countVideos();?></p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-footer">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                    <a href="tubes.php">مشاهده الفيديوهات</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-success text-center">
                                <div class="panel-heading">التعليقات</div>
                                <div class="panel-body">
                                    <h1 style="color: #74b172"><i class="glyphicon glyphicon-user pull-right"></i></h1>
                                    <p class="pull-left" style="font-size: 25px"><?php echo $video->countComments();?></p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-footer">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                    <a href="comments.php">مشاهده التعليقات</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="glyphicon glyphicon-film"></i> جديد الفيديوهات </div>
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
                                                <td class="text-center"><a href="index.php?delete=<?php echo $tube['id']; ?>" class="btn btn-sm btn-danger">حذف</a></td>
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
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8"></div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="glyphicon glyphicon-comment"></i> جديد التعليقات </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">اسم العضو</th>
                                            <th class="text-center">التعليق</th>
                                            <th class="text-center">مشاهده التعليق</th>
                                            <th class="text-center">حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $comments = $video->getAllVideoComments();
                                    if (!empty($comments)):
                                        foreach ($comments as $value):
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++;?></td>
                                                <td class="text-center"><?php echo $video->getUserNameById($value['user_id']);?></td>
                                                <td class="text-center"><?php echo $value['comment'];?></td>
                                                <td class="text-center"><a href="../video.php?v=<?php echo $video->getVideoById($value['video_id']);?>" target="_blank" class="btn btn-sm btn-info">مشاهده</a></td>
                                                <td class="text-center"><a href="index.php?deletecomment=<?php echo $value['id'];?>" class="btn btn-sm btn-danger">حذف</a></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                    else:
                                        ?>
                                        <div class="alert alert-danger alert-dismissible text-center" role="alert">
                                            <strong>تنبيه !</strong> لا يوجد اي تعليقات حاليا
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