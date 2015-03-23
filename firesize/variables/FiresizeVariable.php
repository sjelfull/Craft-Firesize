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

class FiresizeVariable {

    public function url($urlOrOptions = null)
    {
        if (empty($urlOrOptions)) return;

        return craft()->firesize->getUrl($urlOrOptions);
    }

}