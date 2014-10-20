IKT - Frisør
===========

Gruppeprosjekt i IT2805 for Ingeborg, Kristian og Thomas.


Installasjon
============

Prosjektet bruker Composer. Installer Composer ved å kjøre følgende kommando:

    curl -sS https://getcomposer.org/installer | php

Etter å ha installert Composer må du installere avhengighetene til applikasjonen. Gjør dette med:

    php composer.phar update

Kjør nettsiden
==============

For å kjøre nettsiden gjennom PHPs innebygde server må du skrive følgende kommando:

    php -S 0.0.0.0:8080 -t web web/route.php