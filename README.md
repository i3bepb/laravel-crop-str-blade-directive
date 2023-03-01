# laravel-crop-str-blade-directive
Crop str blade directive

## Install
```
composer require i3bepb/laravel-crop-str-blade-directive
```

## Support Policy

| Package Version | Laravel Version |
|:---------------:|:---------------:|
|        1        |        9        |
|        1        |        8        |
|   not support   |       <=7       |

## How use

#### With variable
For example, there is a $formatted variable with a text of more than 100 bytes, you can crop it using the directive
```blade
<div>As you can see @crop($formatted, 90)</div>
```

#### With string
Or an example with string
```blade
<div>@crop('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu', 90)</div>
```
Result
```html
<div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor...</div>
```
