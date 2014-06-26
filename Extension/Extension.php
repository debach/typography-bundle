<?php

namespace Debach\TypographyBundle\Extension;

use Debach\TypographyBundle\Extension\Twig\TypographyTokenParser;
use Debach\TypographyBundle\Form\DataTransformer\TypographyTransformer;

use Symfony\Bundle\TwigBundle\TwigEngine;

class Extension extends \Twig_Extension
{
    /**
     * @var TypographyTransformer
     */
    private $transformer;

    public function __construct(TypographyTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function getName()
    {
        return 'debach_typography_extension';
    }

    public function getFilters()
    {
        return array(
            'typography' => new \Twig_Filter_Method($this, 'typography',
                array(
                    'is_safe' => array(
                        'html'
                    )
                ))
        );
    }

    public function getTokenParsers()
    {
        return array(
            new TypographyTokenParser(),
        );
    }

    public function typography($string)
    {
        return $this->transformer->reverseTransform($string);
    }
}
