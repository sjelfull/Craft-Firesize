<?php

namespace Craft;

class FiresizeVariable {

    public function url($urlOrOptions = null)
    {
        if (empty($urlOrOptions)) return;

        return craft()->firesize->getUrl($urlOrOptions);
    }

}