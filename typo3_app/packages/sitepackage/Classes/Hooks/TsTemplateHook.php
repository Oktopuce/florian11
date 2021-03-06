<?php

namespace KK\Sitepackage\Hooks;

use TYPO3\CMS\Core\TypoScript\TemplateService;

class TsTemplateHook
{
    /**
     * Hooks into TemplateService to add a TS template
     *
     * @param array $parameters
     * @param \TYPO3\CMS\Core\TypoScript\TemplateService $parentObject
     */
    public function addTypoScriptTemplate($parameters, TemplateService $parentObject)
    {
        // Read any constants / setup that may have been set via an actual
        // sys_template record. Append those values later to our <INCLUDE_TYPOSCRIPT>
        // These values *override* values that may be set via the extension
        // TypoScript!
        $constantOverrides = $parentObject->constants;
        $setupOverrides = $parentObject->config;

        // Add a custom, fake 'sys_template' record
        $row = [
            'uid' => 'templatebootstrap',
            'constants' => '@import "EXT:sitepackage/Configuration/TypoScript/constants.typoscript"' . PHP_EOL . implode(PHP_EOL, $constantOverrides) . PHP_EOL,
            'config' => '@import "EXT:sitepackage/Configuration/TypoScript/setup.typoscript"' . PHP_EOL . implode(PHP_EOL, $setupOverrides) . PHP_EOL,
            'title' => 'Virtual Sitepackage TS root template'
        ];

        $parentObject->processTemplate(
            $row,
            'sys_' . $row['uid'],
            $parameters['absoluteRootLine'][0]['uid'],
            'sys_' . $row['uid']
        );

        // Though $parentObject->rootId is deprecated (and protected),
        // this needs to be set (as there are no alternatives yet).
        // One of the side-effects, if not set, is that the menu
        // rendering cannot determine the current/active states.
        $parentObject->rootId = $parameters['absoluteRootLine'][0]['uid'];
    }
}
