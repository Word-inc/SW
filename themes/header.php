<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body>
  <header>
    <div class="headerWrap">
      <h1>
        <a href="#">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo1.png" alt="SW株式会社"
            srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo1.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/logo1@2x.png 2x">
        </a>
      </h1>
      <nav class="headerNav" id="js-nav">
        <ul>
          <li><a href="#">
              TOP<br>
              <span>トップページ</span>
            </a></li>
          <li><a href="#">
              ABOUT US<br>
              <span>私たちについて</span>
            </a></li>
          <li><a href="#">
              FLOW<br>
              <span>お仕事紹介の流れ</span>
            </a></li>
          <li><a href="#">
              CONTACT<br>
              <span>お問い合わせ</span>
            </a></li>
          <li class="img">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo3.png" alt="SW株式会社"
                srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo3.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/logo3@2x.png 2x">
            </a>
          </li>
        </ul>
      </nav>
      <button class="headerHamburger hamburger" id="js-hamburger">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <p id="js-txt">MENU</p>
      </button>
    </div>
    <div id="js-sns" class="sns hidden">
      <a href="#">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon2.svg" alt="Instagramアイコン">
      </a>
      <a href="#">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon3.svg" alt="Twitterアイコン">
      </a>
    </div>
  </header>