<?php require_once 'inc/topHeader.php'; ?>
<title><?php echo SITENAME; ?></title>
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
      <article class="col-xs-12 col-md-12" style="min-height: 240px">
          <?php
          if ($video->displayVideoInfo() > 0):
              $videos = $video->displayVideoInfo('ORDER BY RAND() , id DESC LIMIT 9');
              if (!empty($videos)):
                  foreach ($videos as $value):
          ?>
                      <div class="col-md-4" style="position: relative;">
                          <div style="position: absolute;left: 65px;top: 10px;color: #3a3636;font-size: 12px;" data-toggle="tooltip" data-placement="top" title="المشاهدات">
                              <i class="glyphicon glyphicon-eye-open" style="color: #c7c7c7;" ></i> 22
                          </div>
                          <div style="position: absolute;left: 25px;top: 10px;color: #3a3636;font-size: 12px;" data-toggle="tooltip" data-placement="top" title="التعليقات">
                              <i class="glyphicon glyphicon-comment" style="color: #d0c358;"></i> 22
                          </div>
                          <div style="padding: 5px;background: #f6f5f7;border: solid 1px #e7e7e7;margin-bottom: 20px;">
                              <img src="libs/upload/<?php echo $value['image']; ?>" class="img-responsive" style="width: 100%;min-height: 20px;max-height: 190px;" />
                            <h5 style="background: #fff;padding: 5px;text-align: center;margin: 5px 0;font-weight: bold;border: solid 1px #e2e0e4;"><?php echo (mb_strlen($value['title'] , 'utf8') > 40 ? mb_substr($value['title'],0,40) . ' ...' : $value['title']); ?></h5>
                            <a href="category.php?cat=<?php echo $category->getCatNameUniqueById($value['category']); ?>"><h5 style="background: #607D8B;padding: 5px 12px;text-align: center;margin: 5px 0;border: solid 1px #546f7b;position: absolute;top: 30px;color: #fff;"><?php echo $category->getCatNameById($value['category']); ?></h5></a>
                            <p style="background: #fff;padding: 5px;text-align: justify;margin: 5px 0;border: solid 1px #e2e0e4;"><?php echo (mb_strlen($value['description'],'utf8') > 120 ? mb_substr($value['description'],0,120) . ' ...' : $value['description']); ?></p>
                            <div class="text-center"><a href="video.php?v=<?php echo $value['videoLink']; ?>" class="btn btn-danger">شاهد الآن</a></div>
                          </div>
                      </div>
          <?php
                endforeach;
              else:
          ?>
                  <div class="alert alert-danger alert-dismissible text-center" role="alert">
                      <strong>تنبيه !</strong> لا يوجد اي فيديوهات بالموقع حاليا
                  </div>
          <?php
              endif;
          endif;
          ?>
      </article>
  </div>
</main>

<!-- END INDEX MAIN -->
<!-- FOOTER START -->
<?php require_once 'inc/footer.php'; ?>