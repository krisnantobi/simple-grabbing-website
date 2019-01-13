<?php
    $error = "";
    if (empty($_POST['url'])) {
        echo "<script>location.href='./'</script>";
    } else {
        $data    = (new Engine())->init($_POST);
        $error = (empty($data['image']) ||
                  empty($data['title']) ||
                  empty($data['price']) ||
                  empty($data['desc'])) ?
                  '<hr><span style=" color :#f89b86">Result not completed. Please enter your URL and try again</span>' :
                  "";
    }

    $img   = (isset($data['image'])) ? $data['image'] : "" ;
    $title = (isset($data['title'])) ? $data['title'] : "";
    $price = (isset($data['price'])) ? $data['price'] : "";
    $desc  = (isset($data['desc'])) ? $data['desc'] : "";
    $guide_size  = (isset($data['guide_size'])) ? $data['guide_size'] : "";
    $hash  = (isset($data['hashtags'])) ? $data['hashtags'] : "";
    $style_output = (isset($data['image'])) ? "margin-top:100px" : "" ;
?>
    
<a href="./" >
    <button class="contact1-form-btn" type="submit" name="send">
        Back
    </button>
</a>

<div class="container" data-validate = "Message is required" style=<?=$style_output?>>
<?=$error?>
    <div class="row">
        <div class="col-sm-6">
            <img src="<?=$img?>" style="width:80%">
        </div>
        <div class="col-sm-6">
            <strong><?=$title?></strong><br>
            <strong><b><?=$price?></b></strong>
            <?=$desc?>
            <?=$guide_size?>
            <?=$hash?>
        </div>
    </div>
</div>
