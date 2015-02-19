<?php

namespace Debach\TypographyBundle\Form\DataTransformer;

use Debach\PhpTypography\PhpTypography;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\DataTransformerInterface;

class TypographyTransformer implements DataTransformerInterface
{
    /**
     * @var PhpTypography
     */
    private $typography;

    public function __construct(ContainerInterface $container)
    {
        $serviceName = $container->getParameter('debach_typography.typography_service');
        $this->typography = $container->get($serviceName);
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
