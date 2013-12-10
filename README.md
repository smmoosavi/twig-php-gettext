twig-php-gettext
================

Twig extension for smmoosavi/php-gettext.

## How to Install

#### Using [Composer](http://getcomposer.org/)

Create a composer.json file in your project root:

```json
{
    "require": {
        "smmoosavi/twig-php-gettext": "dev-master"
    }
}
```

Then run the following composer command:

```bash
$ php composer.phar install
```
**Note**: *twig* and *php-gettext* will be installed with twig-php-gettext too.

## How to use

Do everything required for [twig](http://twig.sensiolabs.org/doc/intro.html) and [php-gettext](https://github.com/smmoosavi/php-gettext) and add following line:

```php
$twig->addExtension(new smmoosavi\util\twiggettext\Extension_L10n());
```

Now you can use `__`, `trans` in your template.
### Complete example

```php
<?php // test.php
require_once '../vendor/autoload.php';

// initializing php-gettext
$locale = 'fa_IR';
$lang = 'fa';
L10n::init($lang, __DIR__ . "/locale/$locale/LC_MESSAGES/messages.mo");

// simple using of php-gettext
echo __('Hi')."\n";

// initializing twig
$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);

// initializing twig-php-gettext
$twig->addExtension(new smmoosavi\util\twiggettext\Extension_L10n());

// using of twig-php-gettext
echo $twig->render("{{ __('Hi') }} {{ name }}<br>", array('name' => 'علی'));
```
## Reference

### Functions

* `trans('Hi')`
* `__('Hi')`

### Filters

* `'Hi'|trans`
* `'Hi'|__`

### Tags

* `trans`
* `plural`
* `endtrans`

#### Examples
Template:
```
{% trans %}
    Hi
{% endtrans %}
```
Translations in .po file:
```
msgid "Hi"
msgstr "سلام"
```

Template:
```
{% trans %}
    Dear {{name}},
{% endtrans %}
```
Translations in .po file:
```
msgid "Dear %name%,"
msgstr "%name% عزیز،"
```

Template:
```
{% trans %}
    an apple.
{% plural apple_count %}
    {{ count }} apples.
{% endtrans %}
```
Translations in .po file:
```
msgid "an apple"
msgid_plural "%count% apples"
msgstr[0] "یک سیب"
msgstr[1] "%count% سیب"
```
