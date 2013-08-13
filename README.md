Generous PHP SDK (v0.1.1)

# Usage

A simple custom request looks like:

```
require_once('/path/to/generous-php-sdk/src/Generous.php');

$slider_data = Generous::customRequest('GET', 'sliders/{SLIDER_ID}');

print $slider_data['title'];

```