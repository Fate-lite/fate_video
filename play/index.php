<?php

if(empty($_GET["vid"])){ header("Location: ../../");die(); }
require "../data/index.php";
$data = data(array("act" => "item","id" => $_GET["vid"]));
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="referrer" content="no-referrer">
<meta name="format-detection" content="telephone=no">
<link href="https://img.fatep.top/2022/04/27/d32f7e26c939f.png" rel="shortcut icon">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<?php if(isset($data['title'])){ ?>
<title>正在播放 - <?php echo htmlspecialchars($data['title'])?></title>
<meta name="keywords" content="<?php echo htmlspecialchars($data['title'])?>播放页">
<meta name="description" content="<?php echo htmlspecialchars($data['title'])?>播放页 - <?php echo htmlspecialchars($data['desc'])?>">
<script charset="UTF-8" id="LA_COLLECT" src="//sdk.51.la/js-sdk-pro.min.js"></script>
<script>LA.init({id: "JMhb7CQ2NqsTk32v",ck: "JMhb7CQ2NqsTk32v"})</script>
<?php }else{ ?>
<title>资源不存在</title>
<?php } ?>
<link rel="stylesheet" type="text/css" href="../static_yk/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="../static_yk/css/common.css">
<link rel="stylesheet" type="text/css" href="../static_yk/css/play.css">
</head>

<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//matomo.fatep.cf/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

<body class="body">

<div class="header one">
	<a class="logo" href="../" style="background-image:url(../static_yk/images/logo.png)"></a>
	<div class="search">
		<input type="text" placeholder="输入你想看的" id="search" />
		<a id="searchDo"></a>
	</div>
</div>

<?php if(count($data['from']) !== 0){ ?>
<div id="playBox">

	<div class="play-box" id="playBoxIframe">
		<div class="tip">如无法播放请尝试切换线路，或<a>点击前往<span></span>播放</a><i class="close"></i></div>
	</div>

	<div class="clear" style="height:0.3rem"></div>

	<h3 class="from-title" id="titleItem" value="<?php echo htmlspecialchars($data['title'])?>"><?php echo htmlspecialchars($data['title'])?></h3>
	<div class="from" id="fromList" style="display:none" from="<?php echo htmlspecialchars('{"data":'.json_encode($data).'}')?>">
		<div class="template"><a data-api="{{api}}" data-href="{{href}}" data-hasmore="{{hasmore}}" data-site="{{site}}">线路{{number}}</a></div>
		<span class="clear"></span>
	</div>

	<div class="loading" id="loadBox2">
		<span class="s-loading"><i class="first"></i><i class="second"></i><i class="third"></i></span>
	</div>

	<div class="episodes" id="episodesBox" style="display:none;">
		<div class="clear" style="height:0.3rem"></div>
		<h3 class="episodes-title">选集<span class="episodes-control" id="episodesControl"><a class="prev">上一集</a><a class="next">下一集</a></span></h3>
		<div class="episodes-list" id="episodesList">
			<div class="template"><a data-api="{{api}}" data-href="{{href}}" value="{{number}}">{{number}}</a></div>
			<span class="clear"></span>
		</div>
	</div>
</div>

<?php }else{ ?>
<div class="no-data" id="noDataBox">未找到可用播放线路</div>
<?php } ?>

<?php if(isset($data['title'])){ ?>
<div class="clear" style="height:2rem"></div>
<div id="itemList">
	<div class="more">
		<i style="background-image:url(<?php echo $data['pic']?>)"></i>
		<h5><?php echo htmlspecialchars($data['title'])?></h5>
		<span><?php echo implode('</span><span>',$data['item'])?></span>
	</div>
	<div class="more desc">
		<div>简介：<?php echo htmlspecialchars($data['desc'])?></div>
	</div>
</div>
<?php } ?>

<?php if(isset($data['guess']) && count($data['guess'])){ ?>
<div class="list" style="margin-top:1rem">
	<h3 class="title">猜你喜欢</h3>
	<div class="items" id="guessList">
		<?php foreach($data['guess'] as $v){ ?>
		<a href="./?vid=<?php echo urlencode($v['id'])?>">
			<i style="background-image:url(<?php echo $v['pic']?>)"></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>
</div>
<?php } ?>

<div class="clear" style="height:2rem"></div>

<div class="copyright">
	<p>本站内容均来自于互联网资源实时采集</p>
	<p>如有侵权请联系邮箱：fate_p@foxmail.com 删除</p>
</div>

<a class="scroll-to-top" id="scrollToTop"></a>

<script src="../static_yk/js/jquery.min.js"></script>
<script src="../static_yk/js/common.js"></script>
<script src="../static_yk/js/play.js"></script>
<script charset="UTF-8" id="LA_COLLECT" src="//sdk.51.la/js-sdk-pro.min.js"></script>
<script>LA.init({id: "JGzDUZS8zpCTuXJS",ck: "JGzDUZS8zpCTuXJS"})</script>
</body>
</html>