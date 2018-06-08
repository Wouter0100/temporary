Security 2
==========

De applicatie is geschreven in plain PHP, omdat dat het snelst te maken is.
Ik gebruik de openssl library welke standaard in PHP zit. Verder gebruik ik AES-256-ECB ipv bijv AES-256-CBC omdat ik geen zin heb om mcrypt in te laden voor 'n goede IV.

Verder geen verdere technieken, frameworks of libraries toegepast: lekker fast 'n dirty, but it works. Met een zelf ontworpen database ;).

Webserver is even `php -S localhost:8080` in de `src` folder en je kan hem aanschouwen. 