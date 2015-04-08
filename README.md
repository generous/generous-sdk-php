Generous SDK-PHP (v0.1.4)

# Usage

A simple custom request looks like:

```
require_once('/path/to/generous-sdk-php/src/Generous.php');

$slider_data = Generous::customRequest('GET', 'sliders/{SLIDER_ID}');

print $slider_data['slider']['title'];

```