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

echo __('Hi')."\n";

$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);
$twig->addExtension(new smmoosavi\util\twiggettext\Extension_L10n());

echo $twig->render("{{ __('Hi') }} {{ name }}<br>", array('name' => 'علی'));