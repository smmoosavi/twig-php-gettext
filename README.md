twig-php-gettext
================

Twig extension for smmoosavi/php-gettext.

## How to Install

#### using [Composer](http://getcomposer.org/)

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
Note: twig and php-gettext will be installed with twig-php-gettext too

## How to use

do every thing require for [twig](http://twig.sensiolabs.org/doc/intro.html) and [php-gettext](https://github.com/smmoosavi/php-gettext) and add flowing line.

```php
$twig->addExtension(new smmoosavi\util\twiggettext\Extension_L10n());
```

now you can use `__` in your template.
### complete example

```php
<?php // test.php
require_once '../vendor/autoload.php';

// initialize php-gettext
$locale = 'fa_IR';
$lang = 'fa';
L10n::init($lang, __DIR__ . "/locale/$locale/LC_MESSAGES/messages.mo");

// simple use of php-gettext
echo __('Hi')."\n";

// initialize twig
$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);

// initialize twig-php-gettext
$twig->addExtension(new smmoosavi\util\twiggettext\Extension_L10n());

// simple use twig-php-gettext
echo $twig->render("{{ __('Hi') }} {{ name }}<br>", array('name' => 'علی'));
```
## refrence

### list of functions

* `trans('Hi')`
* `__('Hi')`

### list of filters

* `'Hi'|trans`
* `'Hi'|__`

### list of tags

* `trans`
* `plural`
* `endtrans`

#### example
example 1:

```
{% trans %}
    Hi
{% endtrans %}
```
will use:
```
msgid "Hi"
msgstr "سلام"
```


example 2:

```
{% trans %}
    Dear {{name}},
{% endtrans %}
```

will use:
```
msgid "Dear %name%,"
msgstr "%name% عزیز،"
```
example 3:

```
{% trans %}
    an apple.
{% plural apple_count %}
    {{ count }} apples.
{% endtrans %}
```
will use:
```
msgid "an apple"
msgid_plural "%count% apples"
msgstr[0] "یک سیب"
msgstr[1] "%count% سیب"
```
