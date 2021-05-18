<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - التعليقات </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><i class="glyphicon glyphicon-comment"></i> التعليقات</h1>
                <div class="col-md-12">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['delete'])){
                    $video->deleteAnyComment($_GET['delete']);
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
                                    $per_page = 5;
                                    if (!isset($_GET['page'])){
                                        $page = 1;
                                    }else{
                                        $page = intval($_GET['page']);
                                    }
                                    $start = ($page - 1) * $per_page;
                                    $comments = $video->getAllVideoComments("ORDER BY id DESC LIMIT $start,$per_page");
                                    if (!empty($comments)):
                                        foreach ($comments as $value):
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++;?></td>
                                            <td class="text-center"><?php echo $video->getUserNameById($value['user_id']);?></td>
                                            <td class="text-center"><?php echo (mb_strlen($value['comment'],"utf8") > 50 ? mb_substr($value['comment'],0,50) . ' ...' : $value['comment']);?></td>
                                            <td class="text-center"><a href="../video.php?v=<?php echo $video->getVideoById($value['video_id']);?>" target="_blank" class="btn btn-sm btn-info">مشاهده</a></td>
                                            <td class="text-center"><a href="comments.php?delete=<?php echo $value['id'];?>" class="btn btn-sm btn-danger">حذف</a></td>
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

                        <nav class="text-center">
                            <ul class="pagination">
                                <?php
                                $allComments = $video->countComments();
                                $total_pages = ceil($allComments / $per_page);
                                for ($i = 1;$i <= $total_pages;$i++){
                                    echo '<li '.($page == $i ? 'class="active"' : '').'><a href="comments.php?page='.$i.'">'.$i.'</a></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php require_once 'inc/footer.php'; ?>