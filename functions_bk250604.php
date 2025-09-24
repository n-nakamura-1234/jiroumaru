<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'slick-style', get_theme_file_uri( '/css/slick.css' ), array(), '1.9.0' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
	//子テーマのjs
	wp_enqueue_script( 'orignal-script', get_stylesheet_directory_uri() . '/js/jiromaru.js', array( 'jquery' ), '1.0.4', true );
	wp_enqueue_script( 'slick', get_theme_file_uri( '/js/slick.js' ), array( 'jquery' ), '1.9.0', true );
}

function header_stylecss_include() {
 $styleurl = get_bloginfo("stylesheet_url"); //現在のテーマのstyle.cssのパスを取得
 $styletime = filemtime( get_stylesheet_directory() . '/style.css'); //現在現在のテーマのstyle.cssのタイムスタンプ取得
 echo '<link rel="stylesheet" id="child-style-css" href="',$styleurl,'?',$styletime,'" />'; //タイムスタンプ付きstyle.cssを読み込む
}
add_action('wp_head', 'header_stylecss_include');

/* PHPの読み込み
---------------------------------------------------------- */
function my_php_Include($params = array()) {
extract(shortcode_atts(array('file' => 'default'), $params));
ob_start();
include(STYLESHEETPATH . "/template-parts/$file.php");
return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');

/* SVGアップロード
---------------------------------------------------------- */
function custom_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime_types' );

/* 自動形成OFF（固定ページ）
---------------------------------------------------------- */
function disable_page_wpautop() {
    if ( is_page() ) remove_filter( 'the_content', 'wpautop' );
}
add_action( 'wp', 'disable_page_wpautop' );

/* 不要なタイトル
---------------------------------------------------------- */
add_filter('get_the_archive_title', function($titname){
	if(is_category()){
			$titname = single_cat_title('',false);
		}elseif(is_date()) {
			$titname = get_the_time('Y年 n月');
		}elseif(is_tag()) {
			$titname = single_tag_title('',false);
		}elseif(is_tax()) {
			$titname = single_term_title('',false);
		}elseif(is_404()) {
			$titname = '404 Not Found';
		}else{
	}
	return $titname;
});

/* Contact Form 7　メールアドレス確認用
---------------------------------------------------------- */
add_filter( 'wpcf7_validate_email', 'wpcf7_validate_email_filter_confrim', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_validate_email_filter_confrim', 11, 2 );
function wpcf7_validate_email_filter_confrim( $result, $tag ) {
    $type = $tag['type'];
    $name = $tag['name'];
    if ( 'email' == $type || 'email*' == $type ) {
        if (preg_match('/(.*)_confirm$/', $name, $matches)){ //確認用メルアド入力フォーム名を ○○○_confirm としています。
            $target_name = $matches[1];
                $posted_value = trim( (string) $_POST[$name] ); //前後空白の削除
                $posted_target_value = trim( (string) $_POST[$target_name] ); //前後空白の削除
            if ($posted_value != $posted_target_value) {
                $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
            }
        }
    }
    return $result;
}


/* CSS Time Stamp
---------------------------------------------------------- */
