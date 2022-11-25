<footer class="footer">
  <div class="wrap">
    <div class="info">
      <p class="name">SW株式会社</p>
      <p>
        〒700-0023<br>
        岡山県岡山市北区駅前町1-8-1 岡山新光ビル７階
      </p>
      <p class="tel">TEL:086-246-3031</p>
      <div class="sns">
        <a href="https://www.instagram.com/hirukorexxokayama/" target="_blank" rel="noreferrer">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon6.svg" alt="Instagramロゴ">
        </a>
      </div>
      <div class="sns">
        <a href="https://twitter.com/hirukoreokayama" target="_blank" rel="noreferrer">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon7.svg" alt="Twitterロゴ">
        </a>
      </div>
    </div>
    <div class="menu js-menu">
      <ul>
        <li>
          <a href="<?php echo home_url(); ?>">TOP</a><span>トップページ</span>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/about">ABOUT US</a><span>私たちについて</span>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/flow">FLOW</a><span>お仕事紹介の流れ</span>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/contact">CONTACT</a><span>お問い合わせ</span>
        </li>
      </ul>
      <div class="privacy">
        <div class="box">
          <a href="https://hirucolle.com/" class="imgLink" target="_blank" rel="noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo2.png" alt="昼職コレクションロゴ" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo2.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/logo2@2x.png 2x"></a>
          <p class="small"><a href="<?php echo home_url(); ?>/policy">プライバシーポリシー</a></p>
        </div>
        <p class="copyright">Copyright © 2022 SW株式会社 All rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>