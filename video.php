<?php require_once 'inc/topHeader.php';
$id = $video->checkVideoUrl($_GET['v']);
$videos = $video->displayVideoInfo("WHERE id = '$id'");
/*عملت foreach عشان لما اعرض تكون مصفوفه واحده وليس مصفوفه بداخلها مصفوفه*/
/*تحت بالعرض انا مش مستخدم ال foreach ومستخدم الاستدعاء عن طريق كتابه المتغير بعده العنصر الاول بالمصفوفه الاولي ثم العنصر التالي يكون الشئ المطلوب وهو بالمصفوفه الداخليه*/
foreach ($videos as $videoId){
    $videoId;
}
?>
    <title><?php echo SITENAME . '-' . $videoId['title']; ?></title>
<?php require_once 'inc/header.php'; ?>
    <!-- NAVBAR START -->
<?php require_once 'inc/navbar.php'; ?>
    <!-- NAVBAR END ---->
    <!-- HEADER START -->
<?php require_once 'inc/welcome.php'; ?>
    <!-- HEADER END --->
    <!-- INDEX MAIN -->

    <main class="container">
        <div class="row">
            <article class="col-xs-12 col-md-12" style="min-height: 290px;">
                <div class="col-md-8" style="background: rgb(167 163 163 / 35%);margin-bottom: 20px;padding: 10px;border-radius: 10px;">
                    <div>
                        <h3 style="margin: 5px 0 15px 0;background: #6a696a7d;padding: 8px;color: #FFFFFF;"><?php echo $videos[0]['title'];?></h3>
                        <iframe width="100%" height="460" src="https://www.youtube.com/embed/<?php echo str_replace('https://www.youtube.com/watch?v=','',$videos[0]['link']);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div style="background: #f9f7f7;padding: 8px 2px;border-radius: 4px;border: solid 1px #efecec;">
                            <p class="pull-left" style="padding: 0px 10px;margin-bottom: 0px;">11 <i class=" glyphicon glyphicon-eye-open"></i></p>
                            <p class="pull-right" style="padding: 0px 10px;margin-bottom: 0px;"><i class="glyphicon glyphicon-list"></i> القسم : <a href="category.php?cat=<?php echo $category->getCatNameUniqueById($videos[0]['category']);?>"><?php echo $category->getCatNameById($videos[0]['category']);?></a></p>
                            <div class="clearfix"></div>
                        </div>
                        <p style="padding: 8px 10px;"><?php echo $videos[0]['description'];?></p>
                    </div>

                    <hr>

                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea name="comment" id="comment" class="form-control" style="max-height: 80px;height: 80px;max-width: 735px;width: 735px" placeholder="اكتب التعليق هنا"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="add" id="add" class="btn btn-success">اضافه التعليق</button>
                            </div>
                        </div>
                    </form>

                    <div id="commentResult"></div>

                    <div style="margin: 20px 0;">
                        <div style="background: #d2d2d2;padding: 5px;">
                            <div class="pull-right"><p><i class="glyphicon glyphicon-user"></i> <span>اسم المعلق</span></p></div>
                            <div class="pull-left"><a id="deleteReply" rel="11" data-toggle="tooltip" data-placement="top" title="حذف التعليق"><i class="glyphicon glyphicon-trash" style="color: #f56e6e"></i></a></div>
                            <div class="clearfix"></div>
                            <div style="background: #fff;padding: 4px;border-radius: 4px;border: solid 1px #d0d0d0;">التعليق هنا</div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="col-md-12" style="background: rgb(167 163 163 / 35%);margin-bottom: 20px;padding: 10px;border-radius: 10px;">
                        <h4 style="border-bottom: solid 1px #d0d0d0;padding-bottom: 8px;">شاهد ايضاً</h4>
                        <?php
                        $like = $video->likeVideos($videoId['title'],$videoId['category'],$videoId['id']);
                        if (!empty($like)):
                            foreach ($like as $likeVideo):
                        ?>
                                <div style="margin-bottom: 4px;padding: 5px;background: #ffffff;">
                                    <a href="video.php?v=<?php echo $likeVideo['videoLink'];?>">
                                        <img src="libs/upload/<?php echo $likeVideo['image'];?>" width="84px" height="64px" />
                                        <span><?php echo (mb_strlen($likeVideo['title'],'utf8') > 30 ? mb_substr($likeVideo['title'],0,30) : $likeVideo['title']);?></span>
                                    </a>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <!-- END INDEX MAIN -->
    <!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>