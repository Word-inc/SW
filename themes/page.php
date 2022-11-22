<?php get_header(); ?>

<!-- プライバシーポリシー -->
<?php if (is_page('policy')) : ?>
  <?php get_template_part('templates/page/policy'); ?>

  <!-- 私たちについて -->
<?php elseif (is_page('about')) : ?>
  <?php get_template_part('templates/page/about'); ?>

  <!-- お仕事紹介の流れ -->
<?php elseif (is_page('flow')) : ?>
  <?php get_template_part('templates/page/flow'); ?>

  <!-- お問い合わせ -->
<?php elseif (is_page('contact')) : ?>
  <?php get_template_part('templates/page/contact'); ?>

  <!-- お問い合わせ確認 -->
<?php elseif (is_page('confirm')) : ?>
  <?php get_template_part('templates/page/confirm'); ?>

  <!-- サンクスページ -->
<?php elseif (is_page('thanks')) : ?>
  <?php get_template_part('templates/page/thanks'); ?>

<?php endif; ?>

<?php get_footer(); ?>