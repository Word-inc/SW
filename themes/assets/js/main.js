/** @format */

const ham = $("#js-hamburger");
const nav = $("#js-nav");
const sns = $('#js-sns');
var txt;
txt = "menu";
$("#js-txt").text("MENU");

$(function () {
	if (window.matchMedia("(max-width:768px)").matches) {
		$(function () {
			ham.on("click", function () {
				if (txt === "menu") {
					ham.addClass("active");
					nav.addClass("active");
					sns.removeClass("hidden");
					txt = "close";
					$("#js-txt").text("CLOSE");
				} else if (txt === "close") {
					ham.removeClass("active");
					nav.removeClass("active");
					sns.addClass("hidden")
					txt = "menu";
					$("#js-txt").text("MENU");
				}
			});
		});
	} else {
		$(function () {
			ham.on("mouseover", function () {
				ham.addClass("active");
				nav.addClass("active");
				$("#js-txt").text("CLOSE");
				txt = "close";
			});
			nav.on("mouseleave", function () {
				ham.removeClass("active");
				nav.removeClass("active");
				$("#js-txt").text("MENU");
				txt = "menu";
			});
		});
	}
});

$(function() {

	var footer = $('.js-menu').innerHeight(); // footerの高さを取得

	window.onscroll = function () {
		var point = window.pageYOffset; // 現在のスクロール地点
		var docHeight = $(document).height(); // ドキュメントの高さ
		var dispHeight = $(window).height(); // 表示領域の高さ

		if(point > docHeight-dispHeight-footer){ // スクロール地点>ドキュメントの高さ-表示領域-footerの高さ
			$('.homeLink').addClass('js-hidden'); //footerより下にスクロールしたらis-hiddenを追加
		}else{
			$('.homeLink').removeClass('js-hidden'); //footerより上にスクロールしたらis-hiddenを削除
		}
	};
	});