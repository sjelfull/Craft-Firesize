<?php

namespace Craft;

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
        return craft()->templates->render('firesize/_settings', array(
            'settings' => $this->getSettings()
        ));
    }

}