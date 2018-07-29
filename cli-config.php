<?php
require_once dirname(__file__) . "/vendor/autoload.php";
use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once dirname(__file__) . "/res/Model.php";

return ConsoleRunner::createHelperSet(Model::getDoctrine());