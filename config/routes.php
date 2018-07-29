<?php
/*
* Example searching rule regexp '([a-z])' => 'news/view' replace path name to change controller
*/
return Array (
	'news\/([a-z]+)\/([0-9]+)$' => 'news/view/$2/$1',
	'news\/([0-9]+)$' => 'news/view/$1',
	'news$' => 'news/index',
);