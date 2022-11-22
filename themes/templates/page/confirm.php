<section class="c-Ttl">
    <div class="wrap">
        <h2>
            <picture>
                <source media="(max-width:767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1-sp.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1-sp@2x.png 2x">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1.png" alt="タイトルアイコン" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1@2x.png 2x">
            </picture>
            <p>CONTACT<span>お問い合わせ</span></p>
        </h2>
    </div>

</section>
<section class="contactMain contactCheckMain c-Main">
    <div class="wrap">
        <div class="box">
            <div class="hide"></div>
            <div class="txt">
                <div class="intro">
                    <h4>確認</h4>
                    <p>
                        入力内容をご確認いただき、送信ボタンを押してください。
                    </p>
                </div>
                <?php echo do_shortcode('[mwform_formkey key="34"]'); ?>
            </div>
        </div>
    </div>
</section>