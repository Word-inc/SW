<?php

//<title>タグを出力する
add_theme_support('title-tag');



function get_page_title()
{
  // ページタイトルを取得
  $page_title = wp_get_document_title();

  return $page_title;
}

//タイトルタグの区切り文字をエン・ダッシュから縦線に変更する
add_filter('document_title_separator', 'my_document_title_separator');
function my_document_title_separator($separator)
{
  $separator = '|';
  return $separator;
}

//WP用jquery削除（slickのバグが発生するため）
function sw_delete_local_jquery()
{
  wp_deregister_script('jquery');
}
add_action('wp_enqueue_scripts', 'sw_delete_local_jquery');



//css読み込み
define("DIRE", get_template_directory_uri()); //echo get_template_directory_uri使用可能
function add_files()
{
  //css
  wp_enqueue_style('main_style', DIRE . '/assets/css/main.css');

  //js
  wp_enqueue_script('jquery_script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
}
add_action('wp_enqueue_scripts', 'add_files');


//PHP関数 jsで使用
$tmp_path_arr = array(
  'temp_uri' => get_template_directory_uri(),
  'home_url' => home_url()
);
//PHP関数を使用したいjsのパス（main.jsの読み込みも兼ねて）
wp_enqueue_script('main', DIRE . '/assets/js/main.js', '', '1.0', true);
wp_localize_script('main', 'tmp_path', $tmp_path_arr);



//googleフォント 最後に読み込み
function add_font()
{
  wp_enqueue_style('font_style', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&family=Outfit&display=swap', array(), null);
}
add_action('wp_footer', 'add_font');




// ツールバー デフォルト非表示
add_filter('show_admin_bar', '__return_false');



//noindex設定
function add_noindex_insert()
{

  /* 特定の固定ページ */

  /* アーカイブ */
  if (is_archive()) {
    echo '<meta name="robots" content="noindex,nofollow,noarchive">' . "\n";
    echo '<meta name="googlebot" content="noindex,nofollow,noarchive">' . "\n";
  }
}
add_action('wp_head', 'add_noindex_insert');




//アーカイブページURL変更（投稿記事一覧ページ作成に必要）
function post_has_archive($args, $post_type)
{

  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'news'; //任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);




//アイキャッチ画像 追加
add_theme_support('post-thumbnails');



//画像にwidthとheight出力させない
add_filter('post_thumbnail_html', 'custom_attribute2');
function custom_attribute2($html)
{
  // width height を削除する
  $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
  return $html;
}




// テーマフォルダ直下のeditor-style.cssを読み込み
add_action('admin_init', function () {
  add_editor_style('assets/css/editor-style.css');
});
/* エディタースタイルのキャッシュクリア */
function extend_tiny_mce_before_init($mce_init)
{
  $mce_init['cache_suffix'] = 'v=' . time();
  return $mce_init;
}
add_filter('tiny_mce_before_init', 'extend_tiny_mce_before_init');




//投稿 パーマリンク日本語自動変換
function auto_post_slug($slug, $post_ID, $post_status, $post_type)
{
  if (preg_match('/(%[0-9a-f]{2})+/', $slug)) {
    $slug = utf8_uri_encode($post_type) . '-' . $post_ID;
  }
  return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);


//iframe 投稿者フィルター削除
add_filter('user_has_cap', 'allow_unfiltered_html', 10, 3);

function allow_unfiltered_html($allcaps, $cap, $args)
{
  $allcaps['unfiltered_html'] = $allcaps['edit_posts'];
  return ($allcaps);
}





//アーカイブ 表示件数制御
function change_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  if ($query->is_archive()) { /* アーカイブページの時に表示件数を10件にセット */
    $query->set('posts_per_page', 15);
  }
}
add_action('pre_get_posts', 'change_posts_per_page');



//画質制限撤廃
add_filter('jpeg_quality', function ($arg) {
  return 100;
});

//768pxサイズ生成停止
update_option('medium_large_size_w', 0);

//最大サイズ1024pxに設定
function otocon_resize_at_upload($file)
{

  if ($file['type'] == 'image/jpeg' or $file['type'] == 'image/gif' or $file['type'] == 'image/png') {

    $w = 1024;
    $h = 1024;

    $image = wp_get_image_editor($file['file']);

    if (!is_wp_error($image)) {
      $size = getimagesize($file['file']);

      if ($size[0] > $w || $size[1] > $h) {
        $image->resize($w, $h, false);
        $final_image = $image->save($file['file']);
      }
    }
  }

  return $file;
}
add_action('wp_handle_upload', 'otocon_resize_at_upload');




//is_mobile関数作成 タブレットはipadのみ含む
function is_mobile()
{
  $useragents = array(
    'iPhone',          // iPhone
    'iPod',            // iPod touch
    'Android',         // 1.5+ Android
    'dream',           // Pre 1.5 Android
    'CUPCAKE',         // 1.5+ Android
    'blackberry9500',  // Storm
    'blackberry9530',  // Storm
    'blackberry9520',  // Storm v2
    'blackberry9550',  // Storm v2
    'blackberry9800',  // Torch
    'webOS',           // Palm Pre Experimental
    'incognito',       // Other iPhone browser
    'webmate'          // Other iPhone browser
  );
  $pattern = '/' . implode('|', $useragents) . '/i';
  return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}






//「投稿」→「お知らせ」に変換
function Change_menulabel()
{
  global $menu;
  global $submenu;
  $name = 'お知らせ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name . '一覧';
  $submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
  global $wp_post_types;
  $name = 'お知らせ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name . 'の新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_found = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');



//管理画面メニュー 並び替え
function custom_menu_order($menu_ord)
{
  if (!$menu_ord) return true;

  return array(
    'index.php', // ダッシュボード
    'separator1', // 最初の区切り線
    'edit.php', // お知らせ
    'edit.php?post_type=page', // 固定ページ
    'edit.php?post_type=mw-wp-form', // mw-wp-form
  );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');



//ログイン画面変更
function custom_login_logo()
{
?>
  <style>
    .login #login h1 a {
      max-width: 205px;
      width: 100%;
      background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/common/logo1.png) no-repeat center / contain;
    }
  </style>
<?php
}
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo_url()
{
  return get_bloginfo('url');
}
add_filter('login_headerurl', 'custom_login_logo_url');





// ユーザー登録時の管理メールアドレス宛メール送信停止
add_filter('wp_new_user_notification_email_admin', '__return_false');

// ユーザー登録時の登録ユーザー宛メール送信停止
add_filter('wp_new_user_notification_email', '__return_false');

// メールアドレス変更時のメール送信停止
add_filter('send_email_change_email', '__return_false');

// パスワード変更時のメール送信停止
add_filter('send_password_change_email', '__return_false');

// パスワードリセット時のメール送信停止
add_filter('wp_password_change_notification_email', '__return_false');



//メールアドレス無しでユーザー登録
add_action('user_profile_update_errors', 'my_user_profile_update_errors', 10, 3);
function my_user_profile_update_errors($errors, $update, $user)
{
  $errors->remove('empty_email');
}
// This will remove javascript required validation for email input
// It will also remove the '(required)' text in the label
// Works for new user, user profile and edit user forms
add_action('user_new_form', 'my_user_new_form', 10, 1);
add_action('show_user_profile', 'my_user_new_form', 10, 1);
add_action('edit_user_profile', 'my_user_new_form', 10, 1);
function my_user_new_form($form_type)
{
?>
  <script type="text/javascript">
    jQuery('#email').closest('tr').removeClass('form-required').find('.description').remove();
    // Uncheck send new user email option by default
    <?php if (isset($form_type) && $form_type === 'add-new-user') : ?>
      jQuery('#send_user_notification').removeAttr('checked');
    <?php endif; ?>
  </script>
<?php
}



/*********************
OGPタグ/Twitterカード設定を出力
 *********************/
function my_meta_ogp()
{
  if (is_front_page() || is_home() || is_singular()) {
    global $post;
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if (is_singular()) { //記事＆固定ページ
      setup_postdata($post);
      $ogp_descr = mb_substr(get_the_excerpt(), 0, 103);
      $ogp_url = get_permalink();
      wp_reset_postdata();
    } elseif (is_front_page() || is_home()) { //トップページ
      $ogp_descr = get_bloginfo('description');
      $ogp_url = home_url();
    }

    //og:type
    $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';

    //og:image
    if (is_singular() && has_post_thumbnail()) {
      $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
      $ogp_img = $ps_thumb[0];
    } else {
      $ogp_img =  DIRE . '/assets/img/common/ogp.jpg';
    }

    //出力するOGPタグをまとめる
    $insert .= '<meta property="og:description" content="' . esc_attr($ogp_descr) . '" />' . "\n";
    $insert .= '<meta property="og:type" content="' . $ogp_type . '" />' . "\n";
    $insert .= '<meta property="og:url" content="' . esc_url($ogp_url) . '" />' . "\n";
    $insert .= '<meta property="og:image" content="' . esc_url($ogp_img) . '" />' . "\n";
    $insert .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    $insert .= '<meta name="twitter:site" content="" />' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";

    //facebookのapp_id（設定する場合）
    //$insert .= '<meta property="fb:app_id" content="">' . "\n";
    //app_idを設定しない場合ここまで消す

    echo $insert;
  }
} //END my_meta_ogp

add_action('wp_head', 'my_meta_ogp'); //headにOGPを出力




//
//プラグイン関連
//


//mw wp form pタグ自動挿入削除
function mvwpform_autop_filter()
{
  if (class_exists('MW_WP_Form_Admin')) {
    $mw_wp_form_admin = new MW_WP_Form_Admin();
    $forms = $mw_wp_form_admin->get_forms();
    foreach ($forms as $form) {
      add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
    }
  }
}
mvwpform_autop_filter();

//mw wp form ビジュアルエディタ削除
function visual_editor_off(){
  global $typenow;
  if( in_array( $typenow, array( 'page' ,'mw-wp-form' ) ) ){
      add_filter('user_can_richedit', 'off_visual_editor');
  }
}
function off_visual_editor(){
  return false;
}
add_action( 'load-post.php', 'visual_editor_off' );
add_action( 'load-post-new.php', 'visual_editor_off' );
