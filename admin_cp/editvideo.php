<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - تعديل فيديو </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="col-md-12">
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])){
                        $id = (int)$_GET['id'];
                        $video = $video->displayVideoInfo("WHERE `id` = '{$id}'");
                    }

                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['edit'])){
                        if(isset($_FILES['image']) and $_FILES['image']['name'] != ''){
                            $image = $_FILES['image'];
                        }else{
                            $image = NULL;
                        }
                        $video->setVideosInput($_POST['title'], $_POST['link'],$image, $_POST['desc'], $_POST['category'] , "edit",$_POST['id']);
                        $video->displayErrors();
                    }
                    ?>
                </div>
                <h1 class="page-header"><i class="glyphicon glyphicon-play"></i> تعديل فيديو</h1>
                <div class="col-md-12">
                    <div class="row">
                    <?php if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])): ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">عنوان الفيديو</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $video[0]['title']; ?>" placeholder="ادخل عنوان الفيديو">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link" class="col-sm-2 control-label">رابط الفيديو</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $video[0]['link']; ?>" placeholder="ادخل رابط الفيديو">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">الصوره</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-2 control-label">وصف الفيديو</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="desc" id="desc" rows="6" style="max-height: 250px;max-width: 585px;min-height: 150px;min-width: 585px;" placeholder="ادخل وصف بسيط الفيديو"><?php echo $video[0]['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">القسم</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="category" name="category">
                                        <option value="">اختر القسم</option>
                                        <?php foreach ($cat as $value):?>
                                            <option value="<?php echo $value['id']; ?>" <?php if ($video[0]['category'] == $value['id']){echo "selected";} ?>><?php echo $value['cat_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" id="edit" name="edit" class="btn btn-block btn-warning">تعديل الفيديو</button>
                                </div>
                            </div>
                        </form>
                    <?php elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['edit'])): ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">عنوان الفيديو</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo (isset($_POST['title']) ? $_POST['title'] : null);?>" placeholder="ادخل عنوان الفيديو">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link" class="col-sm-2 control-label">رابط الفيديو</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="link" name="link" value="<?php echo (isset($_POST['link']) ? $_POST['link'] : null);?>" placeholder="ادخل رابط الفيديو">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">الصوره</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-2 control-label">وصف الفيديو</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="desc" id="desc" rows="6" style="max-height: 250px;max-width: 585px;min-height: 150px;min-width: 585px;" placeholder="ادخل وصف بسيط الفيديو"><?php echo (isset($_POST['desc']) ? $_POST['desc'] : null);?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">القسم</label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="category" name="category">
                                        <option value="">اختر القسم</option>
                                        <?php foreach ($cat as $value):?>
                                            <option value="<?php echo $value['id']; ?>" <?php if (isset($_POST['category']) and $_POST['category'] == $value['id']){echo "selected";} ?>><?php echo $value['cat_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                                    <button type="submit" id="edit" name="edit" class="btn btn-block btn-warning">تعديل الفيديو</button>
                                </div>
                            </div>
                        </form>
                    <?php else: header("Location: tubes.php");endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php require_once 'inc/footer.php'; ?>