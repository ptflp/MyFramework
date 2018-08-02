<?php
require_once dirname(__file__) . "/vendor/autoload.php";
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Resource\Model;

return ConsoleRunner::createHelperSet(Model::getDoctrine());