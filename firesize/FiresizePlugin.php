<?php

namespace Craft;

/**
 * Firesize for Craft, by Fred Carlsen
 *
 * @author      Fred Carlsen <http://sjelfull.no>
 * @package     Firesize
 * @since       Craft 1.3
 * @copyright   Copyright (c) 2015, Fred Carlsen
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link        https://github.com/sjelfull/Craft-Firesize
 */

class FiresizePlugin extends BasePlugin {

    function getName()
    {
        return Craft::t('Firesize');
    }

    function getVersion()
    {
        return '0.1';
    }

    function getDeveloper()
    {
        return 'Fred Carlsen';
    }

    function getDeveloperUrl()
    {
        return 'http://sjelfull.no';
    }

    public function getSettingsHtml()
    {
        return false;
    }

}