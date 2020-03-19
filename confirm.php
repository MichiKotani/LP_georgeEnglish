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
    }

    // 送信ボタンが押されたら
    if (isset($_POST["submit"])) {
        // 送信ボタンが押された時に動作する処理をここに記述する
            
        // 日本語をメールで送る場合のおまじない
            mb_language("ja");
        mb_internal_encoding("UTF-8");
        
        //mb_send_mail("kanda.it.school.trial@gmail.com", "メール送信テスト", "メール本文");

            // 件名を変数subjectに格納
            $subject = "［自動送信］お問い合わせ内容の確認";

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

内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。
EOM;
        
        // 送信元のメールアドレスを変数fromEmailに格納
        $fromEmail = "info@george-english.com";

        // 送信元の名前を変数fromNameに格納
        $fromName = "株式会社ジョージinfo";

        // ヘッダ情報を変数headerに格納する      
        $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

        // メール送信を行う
        mb_send_mail($email, $subject, $body, $header);
        // サンクスページに画面遷移させる
        header("Location: https://george-english.com/thanks.html");
        exit;
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
	<script src="js/script.js"></script>
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

  </head>


  


<body class=form-body>
	<div class="container">
	 <div class="section-inner">
          <h1 class="form-title text-center">ご確認</h1>
		    <div class="form-text col-md-8 offset-md-2 ">
				<p class="confirm-title">お名前</p>
	            <p class="confirm-text"><?php echo $name; ?></p>
				<p class="confirm-title">メールアドレス</p>
				<p class="confirm-text"><?php echo $email; ?></p>
				<p class="confirm-title">ご希望のカウンセリング日程(第一希望)</p>
				<p class="confirm-text"><?php echo $day1; ?></p>
				<p class="confirm-title">ご希望のカウンセリング日程(第二希望)</p>
				<p class="confirm-text"><?php echo $day2; ?></p>
				<p class="confirm-title">ご希望のカウンセリング日程(第三希望)</p>
				<p class="confirm-text"><?php echo $day3; ?></p>
				<p class="confirm-title">ご相談内容</p>
				<p class="confirm-text"><?php echo $ask; ?></p> 	 
	     	 </div>


	
    <form class="form-main col-md-8 offset-md-2" method="post" action="https://george-english.com/thanks.php">
	        <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="day1" value="<?php echo $day1; ?>">
            <input type="hidden" name="day2" value="<?php echo $day2; ?>">
            <input type="hidden" name="day3" value="<?php echo $day3; ?>">
            <input type="hidden" name="ask" value="<?php echo $ask; ?>">
		  　<div class="form-group text-center">
			   <input class="btn-light form-submit" type="button" value="内容を修正" onclick="history.back(-1)">
		       <input class="btn-primary  form-submit " type="submit" value="内容を送信">
		    </div>
		</form>
		
 　　　　 </div>



	   </div>
  </div>
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
