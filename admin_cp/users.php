<?php require_once 'inc/topHeader.php'; ?>
    <title><?php echo SITENAME; ?> - الاعضاء </title>
<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once 'inc/sidbar.php'; ?>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="col-md-12">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['delete'])){
                        $id = (int)$_GET['delete'];
                        $users->deleteUser($id);
                    }
                    ?>
                </div>
                <h1 class="page-header"><i class="glyphicon glyphicon-user"></i> الاعضاء</h1>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم العضو</th>
                                            <th>البريد الالكتروني</th>
                                            <th>الرتبه</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $per_page = 2;
                                    if (!isset($_GET['page'])){
                                        $page = 1;
                                    }else{
                                        $page = (int)$_GET['page'];
                                    }
                                    $start = ($page - 1) * $per_page;
                                    $allUsers = $users->getAllUsers("ORDER BY id DESC LIMIT $start,$per_page");
                                    $i = 1;
                                    foreach ($allUsers as $user):
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $user['first_name']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td><span class="btn btn-sm btn-<?php echo ($user['is_Admin'] == true ? 'primary' : 'info'); ?>"><?php echo ($user['is_Admin'] == true ? 'مدير' : 'عضو'); ?></span></td>
                                            <td><a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-warning">تعديل</a></td>
                                            <td><a href="users.php?delete=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger">حذف</a></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <nav class="text-center">
                            <ul class="pagination">
                                <?php
                                $getAllUsers = $users->countUsers();
                                $total_pages = ceil($getAllUsers / $per_page);
                                for ($i = 1;$i <= $total_pages;$i++){
                                    echo '<li '.($page == $i ? 'class="active"' : '').'"><a href="users.php?page='.$i.'">'.$i.'</li>';
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