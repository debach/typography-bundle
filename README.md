TypographyBundle
=================

The TypographyBundle provides easy access to the [PHP-Typography](https://github.com/mundschenk-at/php-typography) library for Symfony applications. PHP-Typography is n actively maintained fork of the discontinued [KINGdesk PHP Typography](http://kingdesk.com/projects/php-typography/) (seems to be no longer reachable as of 2020).

## How to use the TypographyBundle

To enhance the typography of your HTML inside a Twig template, you can use the the filter `{{ someText | typography }}` and the tag `{% typography %}`, i.e.

    {# template.html.twig #}
    {% typography %}
        <h1>Welcome to "The 'one &amp; only' Blog"</h1>

        <p>
            This is my personal website. I'm glad you found it - that makes you the 1st visitor. I estimate that about 6/7 of the future visitors will be typography-lovers...
        </p>

        <h2>Wikipedia about William Shakespeare</h2>

        <p>The following paragraph might look better with hyphenation.</p>

        <p>
            William Shakespeare (bapt. 26 April 1564 – 23 April 1616) was an English poet, playwright, and actor, widely regarded as the greatest writer in the English language and the world's greatest dramatist. He is often called England's national poet and the "Bard of Avon" (or simply "the Bard"). His extant works, including collaborations, consist of some 39 plays, 154 sonnets, two long narrative poems, and a few other verses, some of uncertain authorship. His plays have been translated into every major living language and are performed more often than those of any other playwright.
        </p>
    {% endtypography %}

The library won’t touch HTML tags and will process only plain text between tags. The output of the above Twig snippet would be – beware the soft hyphens are invisible, but will cause long words to be hyphenated:

    <h1>Wel­come to <span class="push-double"></span>​<span class="pull-double">“</span>The <span class="push-single"></span>​<span class="pull-single">‘</span>one <span class="amp">&amp;</span>&nbsp;only’ Blog”</h1>
    <p>This is my per­son­al web­site. I’m glad you found it — that makes you the <span class="numbers">1</span><sup class="ordinal">st</sup> vis­i­tor. I&nbsp;esti­mate that about <sup class="numerator"><span class="numbers">6</span></sup>⁄<sub class="denominator"><span class="numbers">7</span></sub> of the future vis­i­tors will be typography-lovers…</p>
    <h2>Wikipedia about William Shakespeare</h2>
    <p>The fol­low­ing para­graph might look bet­ter with hyphenation.</p>
    <p>William Shake­speare (bapt. <span class="numbers">26</span> April <span class="numbers">1564</span> – <span class="numbers">23</span> April <span class="numbers">1616</span>) was an Eng­lish poet, play­wright, and actor, wide­ly regard­ed as the great­est writer in the Eng­lish lan­guage and the world’s great­est drama­tist. He is often called Eng­land’s nation­al poet and the <span class="push-double"></span>​<span class="pull-double">“</span>Bard of Avon” (or sim­ply <span class="push-double"></span>​<span class="pull-double">“</span>the Bard”). His extant works, includ­ing col­lab­o­ra­tions, con­sist of some <span class="numbers">39</span> plays, <span class="numbers">154</span> son­nets, two long nar­ra­tive poems, and a&nbsp;few oth­er vers­es, some of uncer­tain author­ship. His plays have been trans­lat­ed into every major liv­ing lan­guage and are per­formed more often than those of any oth­er playwright.</p>

When you have a single string or Twig variable that you want to enhance, use the filter instead:

    <h2>{{ "About... Me" | typography }}</h2>
    <p>{{ twig_variable | typography }}</p>

## What the TypographyBundle does

The TypographyBundle enhances the typography of the text in your Twig templates. The following table shows *some* examples of HTML texts before and after processing.

<table>
    <thead>
        <tr>
            <th>Before</th>
            <th>After</th>
            <th>Explanation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>explanation</td>
            <td>ex&amp;shy;pla&amp;shy;na&amp;shy;tion</td>
            <td>Robust hyphenation with soft hyphens <code>&amp;shy;</code>. The browser will hyphenate words automatically based on the current line width.</td>
        </tr>
        <tr>
            <td>I'm waiting for "Peter"</td>
            <td>I’m waiting for “Peter”</td>
            <td>Use correct quotes and apostrophes</td>
        </tr>
        <tr>
            <td>...</td>
            <td>…</td>
            <td>Use the ellipses symbol</td>
        </tr>
        <tr>
            <td>A flock of sparrows - some of them juveniles - alighted and sang.</td>
            <td>A flock of sparrows — some of them juveniles — alighted and sang.</td>
            <td>Use an em-dash instead of a hypen</td>
        </tr>
        <tr>
            <td>14-20 men</td>
            <td>14–20 men</td>
            <td>Use an en-dash instead of a hypen in ranges</td>
        </tr>
    </tbody>
</table>

For more examples, I used to refer to the former [project homepage](http://kingdesk.com/projects/php-typography/), but that doesn’t seem to exist any longer. There are a couple of examples over at [the new repository.](https://github.com/mundschenk-at/php-typography)

## Configuration

You can configure which instance of `PHP_Typography\Settings` is used by `PHP_Typography\PHP_Typography` in this bundle. Just overwrite the service definition of `debach_typography.php_typography_settings` and use the `calls` list to configure it:

    # Acme/DemoBundle/Resources/config/service.yml
    debach_typography.php_typography_settings:
        class: PHP_Typography\Settings
        calls:
            - [set_smart_diacritics, [false]]
            - [set_style_initial_quotes, [false]]
            - [set_hyphenation, [true]]
            - [set_hyphenation_language, ["%locale%"]]

The configuration given above is the default configuration for the `PhpTypography` instance used by the bundle. See the [KINGdesk site](http://kingdesk.com/projects/php-typography-documentation/) for a documentation of the available configuration setters.
