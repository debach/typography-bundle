<?php

namespace Debach\TypographyBundle\Extension\Twig;

class TypographyNode extends \Twig_Node
{
    public function __construct(\Twig_Node $body, $lineno, $tag = 'typography')
    {
        parent::__construct(array('body' => $body), array(), $lineno, $tag);
    }

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("echo \$this->env->getExtension('Debach\TypographyBundle\Extension\Extension')->typography(ob_get_clean());\n")
        ;
    }
}