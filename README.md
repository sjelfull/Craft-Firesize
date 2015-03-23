## Firesize plugin for Craft

Use [Firesize](http://www.firesize.com/) to super-quickly resize images on the fly, with built-in CDN.

Note: The Firesize service is in development over on [Assembly](https://assembly.com/firesize), and will probably cost money in the future. It may also look like it service will be Heroku-exclusive for some time, while the team develop the system for users & billing.

### Usage

```twig
<h2>Image url</h2>
{{ craft.firesize.url('http://i.imgur.com/hHpJscb.png') }}

or

{% set url = craft.firesize.url({ 
    url : 'http://i.imgur.com/hHpJscb.png',
    width : 400,
    height : 200,
    crop: false,
    format: 'jpeg'
}) %}

<img src="{{ url }}" />

<h2>Image tag</h2>

{{ craft.firesize.img({
    url: 'http://i.imgur.com/hHpJscb.png',
    width: 480,
    height: 240,
    crop: 'left'
    alt: 'Lorem ipsum',
    class: 'image-class'
}) }}

```

## Options
| Option          | Description  |
| -------------   | -----|
| width           | Image width (Will resize proportionally if only one dimension is specified.) |
| height          | Image height |
| crop            | Supported values are: top, top-left, center, bottom, bottom-left, top-right, right, none/false |
| format          | Convert to format. Supported values are: png, jpg, jpeg, gif |
| frame           | If the image file has multiple frames/layers (PSD, like an animated gif for instance, only the frame with the index specified will be selected. |
| If using the img method, you can also set these options |
| alt             | Sets the alternative text for the img tag |
| class           | Set class attribute |

## License

[MIT](http://opensource.org/licenses/mit-license.php)

