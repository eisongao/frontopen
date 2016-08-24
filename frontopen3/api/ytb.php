<?php

$id = $_GET['id'];
$format = 'video/mp4';
parse_str(file_get_contents("http://www.youtube.com/get_video_info?video_id=" . $id), $info);
$streams = $info['url_encoded_fmt_stream_map'];
$streams = explode(',', $streams);
foreach($streams as $item)
{
    if(strpos($item, 'url=') !== false)
        $resultIndex++;
    if(!isset($results[$resultIndex]))
        $results[$resultIndex] = array();
    if(strpos($item, 'url=') === false)
    {
        $parse = explode('=', $item);
        $results[$resultIndex][$parse[0]] = urldecode($parse[1]);
        continue;
    }
    $parse = preg_match('#url=(.+)$#', $item, $url);
    $results[$resultIndex]['url'] = urldecode($url[1]);
}
$jsoncallback = htmlspecialchars($_REQUEST ['jsoncallback']);
echo $jsoncallback . "" . $results[1][url] . "";
?>