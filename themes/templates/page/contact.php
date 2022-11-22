<!-- @format -->

<section class="c-Ttl">
	<div class="wrap">
		<h2>
			<picture>
				<source media="(max-width:767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1-sp.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1-sp@2x.png 2x" />
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1.png" alt="タイトルアイコン" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1.png 1x,<?php echo get_template_directory_uri(); ?>/assets/img/common/icon1@2x.png 2x" />
			</picture>
			<p>CONTACT<span>お問い合わせ</span></p>
		</h2>
	</div>
</section>
<section class="contactMain c-Main">
	<div class="wrap">
		<div class="box">
			<h3>Mail Form</h3>
			<div class="txt">
				<div class="intro">
					昼職コレクションにお仕事を掲載されたい法人の方や、お仕事を探されている求職者の方は、下記のフォームよりお問い合わせください。<br />
					内容を確認後、担当者よりご連絡させていただきます。
				</div>
				<?php echo do_shortcode( '[mwform_formkey key="34"]' ); ?>
			</div>
		</div>
	</div>
</section>
