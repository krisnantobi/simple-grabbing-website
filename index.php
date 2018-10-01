<?php

include("lib/Engine.php");

if (isset($_POST['send']) && !empty($_POST['url'])) {
	$data    = (new Engine())->init($_POST);
}

$img   = (isset($data['image'])) ? $data['image'] : "" ;
$title = (isset($data['title'])) ? $data['title'] : "";
$price = (isset($data['price'])) ? $data['price'] : "";
$desc  = (isset($data['desc'])) ? $data['desc'] : "";
$hash  = (isset($data['hashtags'])) ? $data['hashtags'] : "";
$error = (empty($data) || empty($title) || empty($price) || empty($desc)) ? "If you don't see anything. please enter your URL and try again" : "";
$style_output = (isset($data['image'])) ? "margin-top:100px" : "" ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Salto</title>
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
					<a style="color:#f89b86"><?= $error?></a> <br><br>
					Get in touch
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="url" placeholder="enter Salto URL">
					<span class="shadow-input1"></span><hr>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<span style="color:#9fa6a8">Include Hashtags</span><br>
					<input class="check1" type="checkbox" name="check1" placeholder="Name">Pants
					<input class="check2" type="checkbox" name="check2" placeholder="Name">Dress
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
			<?=empty($error)? '<hr>' : '<hr><span style="color:#f89b86">Result not completed. Please enter your URL and try again</span>'?>
				<div class="row">
					<div class="col-sm-6">
						<img src="<?=$img?>" style="width:80%">
					</div>
					<div class="col-sm-6">
						<strong><?=$title?></strong><br>
						<strong><b><?=$price?></b></strong><br><br>
						<?=$desc?><br><br>
						<?=$hash?>
					</div>
				</div>
			</div>

		</div>
		<div>
			<span style="color : #bdf3ff">&copy copyright 2018 wixout : salto</span>
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
<script>
    $(document).ready(function(){ 
        $('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
});
</script>

</body>
</html>
