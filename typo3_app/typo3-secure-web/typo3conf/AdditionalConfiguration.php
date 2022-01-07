<?php

putenv("MAGICK_THREAD_LIMIT=1");
putenv("OMP_NUM_THREADS=1");

$contextConfiguration = \TYPO3\CMS\Core\Core\Environment::getPublicPath() . '/typo3conf/ContextConfiguration.php';
if (file_exists($contextConfiguration)) {
    require_once($contextConfiguration);
} else {
    $isCommandLineContext = \TYPO3\CMS\Core\Core\Environment::isCli();
    if (!$isCommandLineContext) {
        throw new Exception('Missing ContextConfiguration file at ' . $contextConfiguration . ' called from ' . __FILE__);
    }
}
