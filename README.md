## Firesize plugin for Craft

Use [Firesize](http://www.firesize.com/) to super-quickly resize images on the fly, with built-in CDN.

*Note: The Firesize service was shut down together with the Assembly community. I will leave this for future reference.*

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
<table>
    <tr>
        <td><strong>Option</strong></td>
        <td><strong>Description</strong></td>
    </tr>
    <tr>
        <td>width</td>
        <td>Image width (will resize proportionally if only one dimension is specified.) </td>
    </tr>
    <tr>
        <td>height</td>
        <td>Image height </td>
    </tr>
    <tr>
        <td>crop</td>
        <td>Supported values are: top, top-left, top-right, center, left, right, bottom, bottom-left, bottom-right, none/false</td>
    </tr>
    <tr>
        <td>format</td>
        <td>Convert to format. Supported values are: png, jpg, jpeg, gif </td>
    </tr>
    <tr>
        <td>frame</td>
        <td>If the image file has multiple frames/layers, like a animated gif or PSD for instance, only the frame with the index specified will be selected.</td>
    </tr>
    <tr>
        <td colspan="2"><strong>If using the img method, you can also set these options</strong></td>
    </tr>
    <tr>
        <td>alt</td>
        <td>Sets the alternative text for the img tag</td>
    </tr>
    <tr>
        <td>class</td>
        <td>Set class attribute</td>
    </tr>
</table>

## License

[MIT](http://opensource.org/licenses/mit-license.php)

