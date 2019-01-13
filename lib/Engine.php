<?php
/**
 * author : krisnantobiyuh@gmail.com
 */
error_reporting(0);
include("simple_html_dom.php");
include("lib/Hashtags.php");

class Engine
{
    public function init($post)
    {
        $url = $post['url'];
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
        $data['image'] = $html->find('div[class="image-wrapper"] img', 0);
        $data['image2'] = $html->find('div[data-qa-id="qa_common_card"] img', 0);
        if (isset($data['image'])) {
            $data['image'] = $html->find('div[class="image-wrapper"] img', 0)->attr['src'];
        } else if (isset($data['image2'])){
            $data['image'] = $html->find('div[data-qa-id="qa_common_card"] img', 0)->attr['src'];
        }

        // foreach ($html->find('div[data-qa-id="qa_product_title"]') as $html) :
            $desc = str_replace('<span>Ukuran berdasarkan standar Salestock</span>', '', $html->find('.markdown', 0)->innertext);
            $desc = str_replace('<span>Ukuran berdasarkan standar Sale Stock</span>', '', $desc);
            $desc = str_replace('<span>Ukuran Berdasarkan Standar Sale Stock</span>', '', $desc);

        $guide_size = "";
        if($html->find('.markdown', 1) !== null){
            $guide_size = $html->find('.markdown', 1)->innertext;
        }
        $guide_size = str_replace('<span>Ukuran berdasarkan standar Salestock</span>', '', $guide_size);
        $guide_size = str_replace('<span>Ukuran berdasarkan standar Sale Stock</span>', '', $guide_size);
        $guide_size = str_replace('<span>Ukuran Berdasarkan Standar Sale Stock</span>', '', $guide_size);
        $guide_size = str_replace('<span>Standar Sale Stock</span>', '', $guide_size);

                $data['title']   = $html->find('h3[data-qa-id="qa_product_title"]', 0)->innertext;
                $data['price']   = "Price ".$html->find('h2[data-qa-id="qa_price"]', 0)->innertext;
                $data['desc']    = $desc;
                $data['guide_size'] = $guide_size;

                $data['hashtags'] = (new Hashtags())->get($_POST);
        // endforeach;

        return $data;
    }
}
