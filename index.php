<?php
$data['title']= "";
$data['image']= "";
$data['desc']= "";
$data['price']= "";
$style_output = "";
$error = "";

include("simple_html_dom.php");
if (isset($_POST['send']) && !empty($_POST['url'])) {
	$loader = "Please wait";
	$url = $_POST['url'];
	//curl init
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_URL, $url);
	$html = curl_exec($curl);
	$dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);
	$html = $dom->load($html, true, true);
	$html = file_get_html($url, false, null, 0);
	// store data
	$data['image'] = $html->find('div[class="image-wrapper"] img', 0)->attr['src'];
		foreach ($html->find('div[data-qa-id="qa_product_info"]') as $html) :
			$data['title'] = $html->find('span', 0)->plaintext;
			$data['price'] = $html->find('span', 1)->plaintext;
			$data['desc'] = str_replace('<span>Ukuran berdasarkan standar Salestock</span>', '', $html->find('.markdown', 0)->innertext);
		endforeach;

	//check data
	if (!isset($data) || empty($data['title']) || empty($data['price']) || empty($data['desc']) || empty($data['image'])) {
		$error = "Error request product. Try again";
	}

	$style_output = "margin-top:100px";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" action="" method="post">
				<span class="contact1-form-title">
					<a style="color:red"><?= $error?></a> <br><br>
					Get in touch
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="url" placeholder="Name">
					<span class="shadow-input1"></span>
				</div>
				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" type="submit" name="send">
						<span>
							Get Product
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
<!-- OUTPUT -->

			</form>

			<div class="container" data-validate = "Message is required" style=<?=$style_output?>>
				<div class="row">
					<div class="col-sm-6">
						<img src="<?= $data['image'] ?>" style="width:80%">
					</div>
					<div class="col-sm-6">
						<strong><?=$data['title']?></strong><br>
						<strong><b><?= $data['price'] ?></b></strong><br><br>
						<?=$data['desc']?>
					</div>
				</div>
			</div>

		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

