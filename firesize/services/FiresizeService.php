<?php

namespace Craft;

class FiresizeService extends BaseApplicationComponent {

    /**
     * Get a formatted Firesize URL
     * @param array|string $urlOrOptions
     * @return bool|string
     */
    public function getUrl($urlOrOptions = null)
    {

        // If there is no options set, return early
        if ( ! is_array($urlOrOptions))
        {
            $url = $urlOrOptions;

            // Validate
            if ( ! $this->validate($url))
            {
                return false;
            }

            return 'http://firesize.com/' . $url;
        }

        // Options
        $segments = $this->buildArguments($urlOrOptions);

        return $segments;
    }

    /**
     * Build URL arguments
     * @param array $options
     * @return string
     */
    public function buildArguments($options = array())
    {
        // Return if there isn't any options
        if (count($options) === 0)
        {
            return false;
        }

        // If url isn't specified, throw a fit
        if ( ! array_key_exists('url', $options) or empty($options['url']))
        {
            Craft::log('(Firesize) URL isn\t specified in the options', LogLevel::Error);

            return false;
        }

        // Default options
        $resizingOptions = array('http://firesize.com/');
        $width = null;
        $height = null;
        $url = null;

        foreach ($options as $option => $value)
        {
            switch ($option)
            {
                case 'format':
                    $resizingOptions[] = $value;
                    break;

                case 'dimensions':
                    // TODO: Validate dimensions
                    $resizingOptions[] = $value;
                    break;

                case 'width':
                    $width = $value;
                    break;

                case 'frame':
                    $resizingOptions[] = 'frame_' . $value;
                    break;

                case 'height':
                    $height = $value;
                    break;

                case 'url':
                    $url = $value;
                    break;

                case 'crop':
                    // If crop is set to false, specify false as string to return 'g_none',
                    // as required by Firesize
                    $resizingOptions[] = (empty($value)) ? $this->normalizeCrop('false') : $this->normalizeCrop($value);
                    break;
            }
        }

        // Do a check to see if either width or height was specified as one of the options
        // Only checks if dimensions isn't set as a specific option
        if (( ! empty($width) or ! empty($height)) && ! array_key_exists('dimensions', $options))
        {
            $dimensions = null;
            // If width is set
            if ($width)
            {
                $dimensions = $width . 'x';
            }

            // If height is set
            if ( ! $width && $height)
            {
                $dimensions = 'x' . $height;
            }
            elseif ($height)
            {
                $dimensions .= $height;
            }

            $resizingOptions[] = $dimensions;
        }

        // Add URL last
        $resizingOptions[] = $url;
        $segments = $this->buildUrl($resizingOptions);

        return $segments;
    }

    public function validate($url = null)
    {
        return filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
    }

    private function buildUrl($segments = array())
    {
        foreach ($segments as $path)
        {
            $url[] = rtrim($path, '/');
        }

        return implode($url, '/');
    }

    /**
     * Normalize crop values
     * @param $specified
     * @return bool
     */
    private function normalizeCrop($specified)
    {
        $crops = array(
            'top'                                                           => 'g_north',
            'top-left|topleft|left-top|topleft|g_northwest'                 => 'g_northwest',
            'top-right|topright|right-top|righttop|g_northeast'             => 'g_northeast',
            'center|g_center'                                               => 'g_center',
            'bottom|g_south'                                                => 'g_south',
            'bottom-right|bottomright|right-bottom|bottomright|g_southeast' => 'g_southeast',
            'bottom-left|bottomleft|left-bottom|leftbottom|g_southwest'     => 'g_southwest',
            'left|g_west'                                                  => 'g_west',
            'right|g_east'                                                  => 'g_east',
            'none|false|g_none'                                             => 'g_none',
        );

        foreach ($crops as $crop => $value)
        {
            $options = explode('|', $crop);

            if (in_array($specified, $options))
            {
                return $value;
            }
        }

        return false;
    }
}