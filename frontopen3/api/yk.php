<?php

$url = $_GET["vid"];

function convert_html_to_swf($url) 
{
    if(!is_string($url) || empty($url)) return ;
    if(strpos($url, 'swf')) return $url;
    
    preg_match_all('/http:\/\/(.*?)?\.(.*?)?\.com\/(.*)/', $url, $types);
    $type = $types[2][0];
    $domain = $types[1][0];

    switch ($type) {
        case 'youku' :
            preg_match_all('/http:\/\/v\.youku\.com\/v_show\/id_(.*)?\.html/', $url, $url_array);
            $swf = 'http://player.youku.com/player.php/sid/' . str_replace('/', '', $url_array[1][0]) . '/v.swf';
            break;
        
        case 'tudou' :
            $method = substr($types[3][0], 0, 1);
            $method = $method == 'p' ? 'v' : $method;
            preg_match_all('/http:\/\/www.tudou\.com\/(.*)?\/(.*)?/', $url, $url_array);
            $str_arr = explode('/', $url_array[1][0]);
            $count = count($str_arr);
            
            if ($count == 1) {
                $id = explode('.', $url_array[2][0]);
                $id = $id[0];
            } else if ($count == 2) {
                $id = $str_arr[1];
            } else if ($count == 3) {
                $id = $str_arr[2];
            }
            
            $swf = 'http://www.tudou.com/' . $method . '/' . $id . '/v.swf';
            break;
            
        case 'qq' :
            $url_array = parse_url($url);
            $swf = "http://static.video.qq.com/TPout.swf?{$url_array['query']}&auto=0";
            break;

        default :
            $swf ='';
            break;
    }
    return $swf;
}



echo convert_html_to_swf($url);

   
?>
