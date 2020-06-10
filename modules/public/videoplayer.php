<?php


$link = isset($_GET['link'])?$_GET['link']:"";
/*
$downloadURL = isset($_GET['dlink'])?$_GET['dlink']:"";

if(empty($downloadURL)) {
//$psp = 'https://r2---sn-njv23-pnce.googlevideo.com/videoplayback?expire=1591730993&ei=0Y7fXujALNPbsALNwpSQBA&ip=118.107.130.75&id=o-ADHNZBwFpmLYpVSSHZATOemgja7KWpgp5YwA9Xn67070&itag=278&aitags=133%2C134%2C135%2C136%2C137%2C160%2C242%2C243%2C244%2C247%2C248%2C278&source=youtube&requiressl=yes&mh=zF&mm=31%2C29&mn=sn-njv23-pnce%2Csn-2uja-3ipe7&ms=au%2Crdu&mv=m&mvi=1&pl=20&initcwndbps=43750&vprv=1&mime=video%2Fwebm&gir=yes&clen=7387930&dur=715.005&lmt=1591677393354826&mt=1591709199&fvip=3&keepalive=yes&fexp=23882513&c=WEB&txp=5535432&sparams=expire%2Cei%2Cip%2Cid%2Caitags%2Csource%2Crequiressl%2Cvprv%2Cmime%2Cgir%2Cclen%2Cdur%2Clmt&sig=AOq0QJ8wRQIgBHmSWZfdL-ddVzTnhpKfn1C2KtEVa3oLsQ01JeyzxdsCIQD_Ewqs3F_EnLSx5lqDJhee6wGXz86DWkdxJWGGUDY0bQ%3D%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRQIgS_kaZTdb3xqou69ELuhkaLCSl4wrDmAO7pdovQ1pdjUCIQDbWOmso37LQk6IcMWFfGtWsoLiQXJkjF8jvIYWnRET6A%3D%3D';

// echo dirname(dirname(dirname(__FILE__)))."/backend/models/youtube.php";exit;

include_once dirname(dirname(dirname(__FILE__)))."/backend/models/youtube.php";
$yt  = new YouTubeDownloader();
$downloadLinks ='';

    $videoLink = 'https://www.youtube.com/watch?v=GphKdYUkyME';
    $vid = $yt->getYouTubeCode($videoLink);
    if($vid) {
        $result = $yt->processVideo($vid);
        // print_r($result);
        $info = $result['info'];
		$downloadLinks = $result['videos'];
		// echo "<pre>".print_r($downloadLinks,true)."</pre>";

        // $videoInfo = json_decode($info['player_response']);

		// $title = $videoInfo->videoDetails->title;
		// echo "title".$title;

		// $thumbnail = $videoInfo->videoDetails->thumbnail->thumbnails{0}->url;
		
		
    }

}else {
	
//print  $downloadURL;exit;
$type = urldecode($_GET['type']);
$title = urldecode($_GET['title']);

//Finding file extension from the mime type
$typeArr = explode("/",$type);
$extension = $typeArr[1];

$fileName = $title.'.'.$extension;
// echo $fileName;exit;

if (!empty($downloadURL)) {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment;filename=\"$fileName\"");
    header("Content-Transfer-Encoding: binary");

    readfile($downloadURL);

}
}//*/

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<iframe width="100%" height="550px"
src="<?php echo 'https://www.youtube.com/embed/'.$link ?>">
</iframe>


<?php if($downloadLinks):?>
        <div class="row formSmall">
            <div class="col-lg-3">
                <img src="<?php print $thumbnail?>">
            </div>
            <div class="col-lg-9">
                <?php print $title?>
            </div>
        </div>

        <table class="table formSmall">
            <tr>
                <td>Type</td>
                <td>Quality</td>
                <td>Download</td>
            </tr>
            <?php foreach ($downloadLinks as $video) :?>
                <tr>
                    <td><?php print $video['type']?></td>
                    <td><?php print $video['quality']?></td>
                    <td><a href="index.php?p=<?php echo P_VIDEO_PLAY;?>&dlink=<?php print urlencode($video['link'])?>&title=<?php print urlencode($title)?>&type=<?php print urlencode($video['type'])?>">Download</a> </td>
                </tr>
            <?php endforeach;?>
        </table>
		<?php endif;?>
		
</body>
</html>