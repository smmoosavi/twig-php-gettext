<?php
use smmoosavi\gettext\L10n;

/**
 * Created by JetBrains PhpStorm.
 * User: smomoo
 * Date: 12/10/13
 * Time: 9:31 AM
 */

require_once '../vendor/autoload.php';

$locale = 'fa_IR';
$lang = 'fa';
L10n::init($lang, __DIR__ . "/locale/$locale/LC_MESSAGES/messages.mo");

$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);
$twig->addExtension(new smmoosavi\util\twiggettext\Extension_L10n());


echo "example __ function:\n";
echo $twig->render("{{ __('Hi') }} {{ name }}<br>", array('name' => 'علی'));
echo "\n\n";

echo "example __ filter:\n";
echo $twig->render("{{ 'Hi'|__ }} {{ name }}<br>", array('name' => 'علی'));
echo "\n\n";

echo "example trans tag:\n";
echo $twig->render("
{% trans %}
    Dear {{name}},
{% endtrans %}
", array('name' => 'علی'));
echo "\n\n";


echo "example plural trans tag:\n";
for ($i = 0; $i < 10; $i++) {
    echo $twig->render("
{% trans %}
    an apple
{% plural i %}
    {{count}} apples
{% endtrans %}
", array('i' => $i));
}
echo "\n\n";