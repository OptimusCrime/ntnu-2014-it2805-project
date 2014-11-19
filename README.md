IKT - Frisør
============

NTNU group project in IT2805 fall 2014 for Ingeborg, Kristian and Thomas.

Technologies
------------

We wrote a simple PHP Loader class to load a given file based on the request from the user. In addition to this class we also
use a PHP template engine called Smarty to ease frontside development.
The frontside is simple HTML5, CSS3 and Javascript. Javascript is enhanced using jQuery to
utilize plugins simpler syntax. With jQuery we also use the library jQuery UI which gives
easy access to a calendar- and selection-plugin.

We decided to use PHP to be able to use custom routing in our website. This means that instead
of having a colletion of html files matching the request, like om-oss.html, we have templates
that are automatically fetched. This also makes it simple to build subdirectories without
actually having to place files relative to each other. Another feature is the possibility to
have custom 404 (not found) pages.

The power of the template engine is the possibility to include portions of a template in other
templates. This means that a template can be split into footer and header and have these included
in all the other templates. Making a change to the footer is then a simple job because there is
only one file to edit. This system also makes it possible to have dynamic titles and content,
although we have not used this very much.

Installation
------------

Our project uses (Composer)[http://getcomposer.org]. You can install Composer by running the following
command:

    curl -sS https://getcomposer.org/installer | php

After installed Composer you must install the dependencies we use in our application. You do this with the
command:

    php composer.phar update

Running the website
-------------------

You can run the website using PHPs built in server by running the following command:

    php -S 0.0.0.0:8080 -t web web/route.php

You can now access the website on your browser on:

    http://localhost:8080