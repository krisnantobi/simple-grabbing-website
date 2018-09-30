<?php
include("simple_html_dom.php");
include("lib/Hastags.php");

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
        if (isset($data['image'])) {
            $data['image'] = $html->find('div[class="image-wrapper"] img', 0)->attr['src'];
        }
        foreach ($html->find('div[data-qa-id="qa_product_info"]') as $html) :
            $data['title']   = $html->find('span', 0)->plaintext;
            $data['price']   = $html->find('span', 1)->plaintext;
            $data['desc']    = str_replace('<span>Ukuran berdasarkan standar Salestock</span>', '', $html->find('.markdown', 0)->innertext);
            $data['hastags'] = (new Hastags())->get($_POST);
        endforeach;

        return $data;
    }
}
