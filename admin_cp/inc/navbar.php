<nav class="navbar navbar-inverse navbar-fixed-top" style="font-family: Tahoma;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" style="margin-left: 10px"><i class="glyphicon glyphicon-dashboard"></i> <?php echo SITENAME; ?> - لوحه التحكم </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="../index.php" target="_blank"><i class="glyphicon glyphicon-home"></i> مشاهدة الموقع</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> الاعدادات <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="right: -46px;">
                        <li><a href="profile.php"><i class="glyphicon glyphicon-edit"></i> الملف الشخصي</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../index.php?logout=true">تسجيل الخروج</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>