TypographyBundle
=================

The TypographyBundle provides easy access to the [KINGdesk PHP Typography](http://kingdesk.com/projects/php-typography/) library for Symfony applications.

## What the TypographyBundle does

The TypographyBundle enhances the typography of the text in your Twig templates. The following table shows some examples of HTML texts before and after processing.

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
            <td>Robust hyphenation with soft hyphens <code>&amp;shy;</code>. The browser will hyphenate words automatically based on the current line width. This is especially useful where the line width is rather small, for example in multi-column texts (CSS property <code>column-count</code>).</td>
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

For more examples, see the [project homepage](http://kingdesk.com/projects/php-typography/).

## How to use the TypographyBundle

To enhance the typography of your HTML inside a Twig template, you can use the the filter `{{ someText | typography }}` and the tag `{% typography %}`, i.e.

    {% typography %}
    <h1>Peter's Blog</h1>
    <p>Hi, my name is Peter "Pan" Paulus and this is my awesome blog! Make sure to bookmark it - and visit it every day.</p>
    {% endtypography %}
    
    <h2>{{ "About... Me" | typography }}</h2>

The library won’t touch HTML and will process only plain text between tags. The output of the above Twig snippet would be

    <h1>Peter’s Blog</h1>
    <p>Hi, my name is Peter “Pan” Paulus and this is my awesome blog! Make sure to bookmark it – and visit it every day.</p>

    <h2>About… Me</h2>

## Configuration

You can configure which instance of `Debach\PhpTypography\PhpTypography` is used by this bundle. Declare a service

    # Acme/DemoBundle/Resources/config/service.yml
    acme_demo.php_typography:
        class: Debach\PhpTypography\PhpTypography
        calls:
            - [set_smart_diacritics, [false]]
            - [set_style_initial_quotes, [false]]
            - [set_hyphenation_language, ["%locale%"]]
            - [set_smart_quotes_language, ["%locale%"]]

Then tell the typography bundle to use this service:

    # app/config.yml
    debach_typography:
        typography_service: acme_demo.php_typography

The configuration given above is the default configuration for the `PhpTypography` instance used by the bundle. See the [KINGdesk site](http://kingdesk.com/projects/php-typography-documentation/) for a documentation of the available configuration setters.
