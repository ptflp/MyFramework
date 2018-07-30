<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>News</title>
</head>
<body>
	<ol>
	<?php foreach ($this->param['newsList'] as $news):?>
		<li>
			<ul>
				<li>Title: <?=$news->getTitle()?></li>
				<li>Date: <?=$news->getDate()?></li>
				<li>Author: <?=$news->getAuthorName()?></li>
				<li></li>
				<li><a href="/news/<?=$news->getId()?>">Read more</a></li>
			</ul>
		</li>
	<?php endforeach;?>
	</ol>
</body>
</html>