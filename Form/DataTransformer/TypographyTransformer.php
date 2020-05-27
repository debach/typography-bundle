<?php

namespace Debach\TypographyBundle\Form\DataTransformer;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\DataTransformerInterface;

use PHP_Typography\PHP_Typography;
use PHP_Typography\Settings;

class TypographyTransformer implements DataTransformerInterface
{
    private $typography;
    private $settings;

    public function __construct(PHP_Typography $typography, Settings $settings)
    {
        $this->typography = $typography;
        $this->settings = $settings;
    }
    
    public function transform($value)
    {
        return $value;
    }
    
    public function reverseTransform($value)
    {
        return $this->typography->process($value, $this->settings);
    }
}
