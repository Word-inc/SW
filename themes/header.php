<!DOCTYPE html>
<html lang="ja">

<head>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-V82XQHNNR4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-V82XQHNNR4');
  </script>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php if (is_home() || is_front_page()) : ?>
    <meta name="description" content="岡山の女性求人ならSW株式会社。あなたにあった企業、あなたにあった働き方、環境、あなたにピッタリの求人情報をお届け。働きたい女性をトータルサポートいたします。" />
  <?php else : ?>
    <?php $description = $post->post_content;
    $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', $description);
    $description = wp_strip_all_tags($description);
    $description = preg_replace('/\[.*\]/', '', $description);
    $description = mb_strimwidth($description, 0, 220, "..."); ?>
    <meta name="description" content="<?php echo $description; ?>">
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="<?php echo esc_attr($post->post_name); ?>">
  <header>
    <div class="headerWrap">
      <h1>
        <a href="<?php echo home_url(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo1.png" alt="SW株式会社" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo1.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/logo1@2x.png 2x">
        </a>
      </h1>
      <nav class="headerNav" id="js-nav">
        <ul>
          <li><a href="<?php echo home_url(); ?>">
              TOP<br>
              <span>トップページ</span>
            </a></li>
          <li><a href="<?php echo home_url(); ?>/about">
              ABOUT US<br>
              <span>私たちについて</span>
            </a></li>
          <li><a href="<?php echo home_url(); ?>/flow">
              FLOW<br>
              <span>お仕事紹介の流れ</span>
            </a></li>
          <li><a href="<?php echo home_url(); ?>/contact">
              CONTACT<br>
              <span>お問い合わせ</span>
            </a></li>
          <li class="img">
            <a href="https://hirucolle.com/" target="_blank" rel="noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo3.png" alt="SW株式会社" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo3.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/logo3@2x.png 2x">
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
      <a href="https://www.instagram.com/hirukorexxokayama/" target="_blank" rel="noreferrer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon2.svg" alt="Instagramアイコン">
      </a>
      <a href="https://twitter.com/hirukoreokayama" target="_blank" rel="noreferrer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon3.svg" alt="Twitterアイコン">
      </a>
    </div>
  </header>