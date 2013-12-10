<?php

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace smmoosavi\util\twiggettext;
use smmoosavi\gettext\L10n;

class Extension_L10n extends \Twig_Extension
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers()
    {
        return array(new \smmoosavi\util\twiggettext\TokenParser_Trans());
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array An array of filters
     */
    public function getFilters()
    {
        return array(
            'trans' => new \Twig_Filter_Function('\\smmoosavi\\gettext\\L10n::gettext'),
            '__' => new \Twig_Filter_Function('\\smmoosavi\\gettext\\L10n::gettext'),
        );
    }

    public function getFunctions()
    {
        return array(
            'trans' => new \Twig_Function_Function('\\smmoosavi\\gettext\\L10n::gettext'),
            '__' => new \Twig_Function_Function('\\smmoosavi\\gettext\\L10n::gettext'),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'l10n';
    }
}
