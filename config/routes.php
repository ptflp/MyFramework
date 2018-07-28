<?php
/*
* Example searching rule regexp '([a-z])' => 'news/view' replace path name
*/
return Array (
	'news/([a-z]+)/([0-9]+)' => 'news/view',
	'news' => 'news/index',
);