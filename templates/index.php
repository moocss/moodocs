<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>MooTools1.3.2 中英文参考文档 - <?php echo htmlentities($title); ?></title>
	<link rel="stylesheet" href="<?php echo $basepath; ?>assets/screen.css">
	<!--[if lt IE 9]><script src="<?php echo $basepath; ?>assets/html5.js" type="text/javascript"></script><![endif]-->
	<!--[if gt IE 6]><script src="<?php echo $basepath; ?>assets/respond.min.js" type="text/javascript"></script><![endif]-->
</head>
<body id="page" role="document">
    <!--#header{{{-->
	<header id="header" role="banner" class="group" rel="<?php if(htmlentities($module)=="core"){echo "MooTools CORE";} else {echo "MooTools MORE";}?>">
		<hgroup>
			<h1>MooTools 1.3.2 中英文参考文档</h1>
			<h2>mootools, a super lightweight web2.0 javascript framework.</h2>
        </hgroup>
		<nav role="navigation">
			<ul class="group">
				<li><a href="http://mootools.net/forge/" title="插件画廊" target="_blank">Forge</a></li>
				<li><a href="/moodocs/index.php/more" title="扩展库">MORE</a></li>
				<li><a tabindex="1" class="current" href="/moodocs/index.php/core" title="核心库">CORE</a></li>
			</ul>
		</nav>
	</header>
    <!--}}}#header-->
	<!--#wraper{{{-->
    <div id="wraper">
	    <!--#content{{{-->
        <div id="content" role="main">
		        <?php if(!empty($methods)){ ?>
                <aside class="page-toc">
					<ul>
						<?php foreach($methods as $group => $submethods): ?>
							<li>
								<strong><a href="<?php echo '#'.$group; ?>"><?php echo str_replace('-','.',$group); ?></a></strong>
								<ul>
									<?php foreach($submethods as $method): ?>
									<li><a href="<?php echo '#'.$group.':'.$method; ?>"><?php echo str_replace('-','.',$method); ?></a></li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul> 
                </aside>
				<?php }?>
                <article class="page-content">
                    <?php echo $content; ?>
                </article>
        </div>
		<!--}}}#content-->
    </div>
	<!--}}}#wraper-->
	<!--#secondary{{{-->
	<aside id="secondary">
		<nav role="navigation">
			<ul>
				<?php foreach($menu as $category => $link): ?>
				<li><strong><?php echo $category; ?></strong>
					<ul>
						<?php foreach($link as $text): ?>
						<li><a href="<?php echo $baseurl.'/'.$module.'/'.$category.'/'.$text; ?>"><?php echo $text; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
				<?php endforeach; ?>
			</ul>
		</nav>
		<section class="contact-info" role="complementary">
		   <ul>
               <li><strong>Bolg:</strong><a href="http://moocss.com">moocss.com</a></li>
               <li><strong>Email:</strong> moocss[at]gmail.com</li>
           </ul>
		</section>
	</aside>
	<!--}}}#secondary-->
	<!--#footer{{{-->
	<footer id="footer" role="contentinfo">
		<p id="copyright"> This documentation is released under a <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Attribution-NonCommercial-ShareAlike 3.0</a> License. </p>
		<p id="back-top"><a href="#page"><span></span><em>Back to top</em></a></p>
	</footer>
	<!--}}}#footer-->
</body>
</html>