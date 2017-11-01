<?php
/**
 * Created by PhpStorm.
 * User: Joshua
 * Date: 11/2/2017
 * Time: 1:01 AM
 */

require '../config/autoloader.php';

$report = Report::find(1);
echo $report->user->Department;