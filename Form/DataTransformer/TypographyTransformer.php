<?php

namespace Debach\TypographyBundle\Form\DataTransformer;

use Debach\PhpTypography\PhpTypography;

use Symfony\Component\Form\DataTransformerInterface;

class TypographyTransformer implements DataTransformerInterface
{
    /**
     * @var PhpTypography
     */
    private $typography;

    public function __construct(PhpTypography $typography)
    {
        $this->typography = $typography;
    }
    
    public function transform($value)
    {
        return $value;
    }
    
    public function reverseTransform($value)
    {
        return $this->typography->process($value);
    }
}
