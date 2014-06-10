<?php
error_reporting(E_ALL & ~E_STRICT);

require_once(dirname(__FILE__).'/../vendor/papaya/test-framework/src/PapayaTestCase.php');
PapayaTestCase::registerPapayaAutoloader(
  array(),
  dirname(__FILE__).'/../src/_classmap.php'
);