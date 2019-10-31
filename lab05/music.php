<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
		<?php
			$song_count = "5678";
			$song_run_time = 602;
			print "I love music.\n";
			print "I have $song_count total songs,\n";
			print "which is over $song_run_time hours of music!";
		?>	
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<?php $newspages = $_GET["newspages"] ?>
		<div class="section">
			<h2>Billboard News</h2>
			<?php
				if($_GET["newspages"] === null) $newspages = 5;
			?>
			<ol>
				<?php for ($news_pages = 1; $news_pages <= $newspages; $news_pages++) { ?>
					<li><a href="https://www.billboard.com/archive/article/2019<?=12-$news_pages?>">2019-<?=12-$news_pages?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<?php $name = array();
		$name[0] = "Guns N' Roses";
		$name[1] = "Green day";
		$name[2] = "Blink182";
		$name[3] = "The Cranberries";
		$name[4] = "Bruno Mars";
		$name[5] = "Amy Winehouse";
		$name[6] = "Jason Mraz";
		?>
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?php for ($i = 0; $i <= 6; $i++) { ?>
					<li><a href="http://en.wikipedia.org/wiki/<?=$name[$i]?>"><?=$name[$i]?></a></li>
				<?php } ?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<ul id="musiclist">
				<?php
					$music = glob('lab5/musicPHP/songs/*.mp3');
					function sizecmp($a, $b){
						if(filesize($a) >= filesize($b)){
							return -1;
						}
						else return 1;
					}
					usort($music, "sizecmp");
					foreach($music as $musicname){
						$musicaddress = $musicname;
						$musicname = basename($musicname);
						$musicsize = (int)(filesize($musicaddress)/1024);
						print "<li class='mp3item'><a href='".$musicaddress."'>".$musicname."</a> (".$musicsize. "KB)</li>";
					}
				?>
				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$m3ulists = glob('lab5/musicPHP/songs/*.m3u');
					rsort($m3ulists);
					foreach($m3ulists as $m3ulist){
						print "<li class='playlistitem'>". basename($m3ulist);
						print "<ul>";
						$m3ufile = file($m3ulist);
						shuffle($m3ufile);
						foreach($m3ufile as $m3u){
							if(strpos($m3u, "#") === false){
								print "<li>".$m3u."</li>";
							}
							
						}
						print "</ul>";
						print "</li>";
					}
				
				?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
