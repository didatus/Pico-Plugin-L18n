Pico-Plugin-L18n
================

Small Localization Plugin for Pico CMS

**Note: This Plugin was written quick and dirty. There is no fallback solution if a translation doesn't exist. Maybe i find some time to clean the plugin code by creating fallbacks and more configuration options.**

Put the l18n.php in the plugin directory and create a file named l18n.php in your root folder (where the config.php is). This file will contain the translations and looks like this example:

```
/*
<?php

$l18n = array(
    'de' => array(
        'welcome' => 'Willkommen',
        'contact' => 'Kontakt',
    ),
    'en' => array(
        'welcome' => 'Welcome',
        'contact' => 'Contact',
    ),
    'cn' => array(
        'welcome' => '欢迎参观我的网页',
        'contact' => '联络方式',
    )
);*/
```

In your template or page content (or wherever you store you page data) you can use l18n markers like in this example:
```
<ul>
  <li><a href="/welcome.html"><!-- l18n:welcome --></a></li>
  <li><a href="/contact.html"><!-- l18n:contact --></a></li>
</ul>
```

One setting left to let Pico know which language to use in which site.
In your page content headers, you have to set an additional language parameter like this example:
```
/*
Title: Welcome
Language: de
*/
```

The language parameter must match the array keys from the l18n array.

The plugin stiores the language information also in the meta array to use it in the templates for example for a language switcher.

