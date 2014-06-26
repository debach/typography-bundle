<?php

namespace Debach\TypographyBundle\Extension\Twig;

class TypographyTokenParser extends \Twig_TokenParser
{
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();

        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideTypographyEnd'), true);
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        return new TypographyNode($body, $lineno, $this->getTag());
    }

    public function decideTypographyEnd(\Twig_Token $token)
    {
        return $token->test('endtypography');
    }

    public function getTag()
    {
        return 'typography';
    }
}
