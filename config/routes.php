<?php
/*
* Example searching rule regexp '([a-z])' => 'news/view' replace path name
*/
return Array (
	'news\/([a-z]+)\/([0-9]+)' => 'news/view/$1/$2',
	'news\/([0-9]+)' => 'news/view/$1',
	'news' => 'news/index',
);