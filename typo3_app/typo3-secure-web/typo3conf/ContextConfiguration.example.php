<?php
defined('TYPO3_MODE') or die();

$applicationContext = \TYPO3\CMS\Core\Core\Environment::getContext();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'] .= ' (' . (string)$applicationContext . ')';
$GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = '###INSTALLTOOL_PASSWORD###';

// T3monitor settings
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['t3monitoring_client']['secret'] = '###T3MONITOR_SECRET###';

// Production Settings
if ($applicationContext == 'Production') {
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = '###PROD_DB_NAME###';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['host'] = '###PROD_DB_HOST###';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = '###PROD_DB_USER###';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = '###PROD_DB_PASSWORD###';

    # disable deprecation log
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['TYPO3']['CMS']['deprecations']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::NOTICE] = [];

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = '###PROD_TRUSTED_HOST_PATTERN###';

    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'mail';
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = '';

    $GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = false;
    $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = false;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 0;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = 0;
}

// Staging Settings
if ($applicationContext == 'Production/Staging') {
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = '###STAGING_DB_NAME###';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['host'] = '###STAGING_DB_HOST###';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = '###STAGING_DB_USER###';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = '###STAGING_DB_PASSWORD###';

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = '###STAGING_TRUSTED_HOST_PATTERN###';

    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'mail';
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = '';

    $GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = false;
    $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = false;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 0;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = 0;
}

// ddev Settings
if ($applicationContext == 'Development/Local') {
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = 'db';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['host'] = 'db';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = 'db';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = 'db';
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['port'] = 3306;
    $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['driver'] = 'pdo_mysql';

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = '*';

    // This mail configuration sends all emails to mailhog
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'smtp';
    $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = 'localhost:1025';

    $GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = true;
    $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = true;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = 1;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';
}
