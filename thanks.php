<?php
        // フォームのボタンが押されたら
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームから送信されたデータを各変数に格納
        $name = $_POST["name"];
        $email = $_POST["email"];
        $day1 = $_POST["day1"];
        $day2 = $_POST["day2"];
        $day3 = $_POST["day3"];
        $ask = $_POST["ask"];
            
        // 日本語をメールで送る場合のおまじない
            mb_language("ja");
        mb_internal_encoding("UTF-8");
        
        //mb_send_mail("kanda.it.school.trial@gmail.com", "メール送信テスト", "メール本文");

            // 件名を変数subjectに格納
            $subject = "お問い合わせ内容の確認(自動送信メール)";

            // メール本文を変数bodyに格納
        $body = <<< EOM
{$name}　様

お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 メール 】 
{$email}

【 ご希望のカウンセリング日程(第一希望) 】 
{$day1}

【 ご希望のカウンセリング日程(第二希望)】 
{$day2}

【ご希望のカウンセリング日程(第三希望) 】 
{$day3}

【 ご相談内容 】 
{$ask}
===================================================

内容を確認のうえ、後ほど返信させて頂きます。
しばらくお待ちくださいませ。

2~3日経っても返信がこない場合は、
弊社のメールアドレスにご連絡ださい。
お手数をかけますが、よろしくお願い致します。

---------------------------------------------------
【会社概要】
株式会社ジョージ
代表取締役：前田 拓也			
事業内容:英会話業務			
所在地:神奈川県川崎市高津区久本3-5-4-102		
Mail: maemune0218@gmail.com
Phone:080-5508-5478		

EOM;
        
        // 送信元のメールアドレスを変数fromEmailに格納
        $fromEmail = "info@george-english.com";

        // 送信元の名前を変数fromNameに格納
        $fromName = "株式会社ジョージinfo";
		
		$from = "株式会社ジョージinfo";
/*
        // ヘッダ情報を変数headerに格納する      
        $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";
		*/
		
		// 送信者情報の設定
        $header = '';
        $header .= "Content-Type: text/plain \r\n";
		$header .= "Return-Path: " . $fromEmail . " \r\n";
        $header .= "From: " . mb_encode_mimeheader($fromName) . " " . "<{$fromEmail}> \r\n";
        $header .= "Sender: " . mb_encode_mimeheader($fromName) . " " . "<{$fromEmail}> \r\n";
        $header .= "Reply-To: " . $fromEmail . " \r\n";
        $header .= "Organization: " . $fromName . " \r\n";
        $header .= "X-Sender: " . $fromEmail . " \r\n";
        $header .= "X-Priority: 3 \r\n";

        // メール送信を行う
        if(mb_send_mail($email, $subject, $body, $header)){
             echo "";
         } else {
             echo "メールの送信に失敗しました";
         };
		
		//確認用メール-------------------------------------
		
		   $subject2 = "無料カウンセリングのお問い合わせがきました(自動送信メール)";

            // メール本文を変数bodyに格納
          $body2 = <<< EOM

以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 メール 】 
{$email}

【 ご希望のカウンセリング日程(第一希望) 】 
{$day1}

【 ご希望のカウンセリング日程(第二希望)】 
{$day2}

【ご希望のカウンセリング日程(第三希望) 】 
{$day3}

【 ご相談内容 】 
{$ask}
===================================================
	

EOM;
 /*       
        // 送信元のメールアドレスを変数fromEmailに格納
        $fromEmail2 = "info@george-english.com";

        // 送信元の名前を変数fromNameに格納
        $fromName2 = "無料カウンセリング通知";
/*
        // ヘッダ情報を変数headerに格納する      
        $header2 = "From: " .mb_encode_mimeheader($fromName2) ."<{$fromEmail2}>";
		*/
		
		//$from2 = "無料カウンセリング通知";

		
		// 送信者情報の設定
        $header2 = '';
        $header2 .= "Content-Type: text/plain \r\n";
		$header2 .= "Return-Path: " . $fromEmail . " \r\n";
        $header2 .= "From: " . mb_encode_mimeheader($fromName) . " " . "<{$fromEmail}> \r\n";
        $header2 .= "Sender: " . mb_encode_mimeheader($fromName) . " " . "<{$fromEmail}> \r\n";
        $header2 .= "Reply-To: " . $fromEmail . " \r\n";
        $header2 .= "Organization: " . $fromName . " \r\n";
        $header2 .= "X-Sender: " . $fromEmail . " \r\n";
        $header2 .= "X-Priority: 3 \r\n";	
		
		
		if(mb_send_mail($fromEmail, $subject2, $body2, $header2)){
             echo "";
         } else {
             echo "メールの送信に失敗しました";
         };
    }

?>

<!doctype html>
<html>
  <head>
	  <!-- サイトジェネラルタグ -->
	 <script async src="https://s.yimg.jp/images/listing/tool/cv/ytag.js"></script>

<script>

window.yjDataLayer = window.yjDataLayer || [];

function ytag() { yjDataLayer.push(arguments); }

ytag({"type":"ycl_cookie"});

</script>
	<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PVN64RF');</script>
    <!-- End Google Tag Manager -->
	
	<script>
    dataLayer.push({
    'trackPageview': 'https://tayori.com/form/44915b21356eea5f9de6176b1bfe47d0a0db58bf/form/input',
    'event': 'loadready'
    });
    </script>
	<script>
    dataLayer.push({
    'trackPageview': 'https://tayori.com/form/44915b21356eea5f9de6176b1bfe47d0a0db58bf/form/thanks',
    'event': 'loadready'
    });
    </script>
	  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>【起業家向け】のジョージEnglish-「成功」する英語力を身につける</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<!--css-->  
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	  <!--fontawesome-->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
	 <!--boostrap.sosial-->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	  
	  <!--canonical-->
     <link rel="canonical" href="https://george-english.com">
	  
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158001728-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-158001728-1', { 'optimize_id': 'GTM-PJT6ZQ5'});
    </script> 
	  
	<!-- Global site tag (gtag.js) - Google Ads: 662769975 -->
　　　<script async src="https://www.googletagmanager.com/gtag/js?id=AW-662769975"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());
     gtag('config', 'AW-662769975');
   </script>
	  
	<!-- Event snippet for お申し込み conversion page -->
　　　<script>
 　　　 gtag('event', 'conversion', {'send_to': 'AW-662769975/ug7LCNqVu8gBELeihLwC'});
　　　</script>

  </head>

<body  style="background: #d2eefb">
	<div class="container  col-md-8 offset-md-2 text-center" style="background: #ffffff; border-radius: 7px; padding-top: 20px; padding-bottom: 20p;">
		<div class="thanks-sentence">
		<h3 class="form-title text-center mt-20 mb-20" style="padding-top: 20px; padding-bottom: 20px;">お問い合わせありがとうございます</h3>
		<p class="text-center" style="padding-bottom: 20px;">ご記入頂いた情報は無事送信されました。<br><br>ご確認のためお客様への自動返信メールをお送りさせて頂きました。<br>後ほどご返信をさせて頂きます。<br><br>もしメールが届かなかった場合は、こちらのメールアドレスに直接ご連絡ください。<br>mail : maemune0218@gmail.com<br><br>お問い合わせ頂きありがとうございました。</p>
</div>
	<a class="text-center btn-primary form-submit" href="https://george-english.com" style="padding-bottom: 20px;">トップページに戻る</a>
		
		<div class="section-inner">
		 <div class="row sns-share">
			 <div class="col col-md-8 offset-lg-2">
			  <ul class="snsbtniti">
                 <li><a href="https://www.instagram.com/imgeorge0218" class="flowbtn insta_btn1"><i class="fab fa-instagram"></i><div>Instagram</div></a></li>
                 <li><a href="https://www.facebook.com/profile.php?id=100008145618761" class="flowbtn fl_fb1"><i class="fab fa-facebook-f"></i><div>Facebook</div></a></li>
                 <li><a href="https://m.youtube.com/channel/UCFvhxOZvy7lao9N5IEFu4aw" class="flowbtn fl_yu1"><i class="fab fa-youtube"></i><div>YouTube</div></a></li>
                 <li><a href="https://lin.ee/q2KvIsW" class="flowbtn fl_li1"><i class="fab fa-line"></i><div>LINE＠</div></a></li>
			</ul>
				 </div>
			  </div>
		</div>
		
		<section class="conversion pt-20">
   <div class="section-inner">
	<div class="container">
	  <div class="row">
		<div class="col-md-offset-2 offset-md-1 col-md-10 offset-lg-1">   
	      <h2 class="conversion-message">今なら、元有名英語スクールの人気講師が教える,<br>
			  ｢<span class="strong-orange">英語力ゼロ</span>｣でも口から勝手にスラスラ英語がでるための<br>3レッスン動画を<span class="strong-orange">無料提供中！</span></h2>
		</div>
      </div>
	   </div>
		
		<div class="row ">
			<div class="col text-center">
			<a class=" btn btn-conversion btn-primary" href="https://lin.ee/q2KvIsW">無料レッスン動画を受け取る</a>
			</div>
			</div>
		</div>
			</div>
			<!--ydnコンバージョンタグ-->
			<script async>

ytag({

  "type":"yjad_conversion",

  "config":{

    "yahoo_ydn_conv_io": "kh.tFOwOLDWtxsHWXoh9",

    "yahoo_ydn_conv_label": "WUVKGIDF5ZLH282JCV3690832",

    "yahoo_ydn_conv_transaction_id": "",

    "yahoo_ydn_conv_value": "0"

  }

});

</script>
		
		<!--スポンサードサーチ_申込タグ-->
		<script async>

ytag({

  "type": "yss_conversion",

  "config": {

    "yahoo_conversion_id": "1001118460",

    "yahoo_conversion_label": "Q006CP_YsMgBEN-rh7wC",

    "yahoo_conversion_value": "0"

  }

});

</script>

	<!--ydnリターゲティング-->
		<script async src="https://s.yimg.jp/images/listing/tool/cv/ytag.js"></script>

<script>

window.yjDataLayer = window.yjDataLayer || [];

function ytag() { yjDataLayer.push(arguments); }

ytag({

  "type":"yjad_retargeting",

  "config":{

    "yahoo_retargeting_id": "1YAZ7ANOFK",

    "yahoo_retargeting_label": ""

    /*,

    "yahoo_retargeting_page_type": "",

    "yahoo_retargeting_items":[

      {item_id: '', category_id: '', price: '', quantity: ''}

    ]*/

  }

});

</script>
		
	<!--スポンサードサーチ_サイトリターゲティングタグ-->
	<script async src="https://s.yimg.jp/images/listing/tool/cv/ytag.js"></script>

<script>

window.yjDataLayer = window.yjDataLayer || [];

function ytag() { yjDataLayer.push(arguments); }

ytag({

  "type":"yss_retargeting",

  "config": {

    "yahoo_ss_retargeting_id": "1001118460",

    "yahoo_sstag_custom_params": {

    }

  }

});

</script>
</body>
</html>
