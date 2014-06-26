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
            <td>He is looking at the - not so beatiful - picture of himself.</td>
            <td>He is looking at the — not so beatiful — picture of himself.</td>
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
    <p>Hi, my name is Peter "Pan" Paulus and this is my awesome blog! Make sure to bookmark it and visit it every day.</p>
    {% endtypography %}
    
    <h2>{{ "About Me" | typography }}</h2>

