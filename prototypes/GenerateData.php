<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 10/31/2017
 * Time: 7:01 PM
 */

require '../config/autoloader.php';
require '../database/factory/PopulateDB.php';

$populate = new PopulateDB();
/*$populate->populateDepartment();
$populate->populateUser(15);*/
$populate->populateReport(5);
