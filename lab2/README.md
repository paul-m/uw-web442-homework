Lab 2
=====

Setup
-----

This project uses composer. Install composer: `curl -s https://getcomposer.org/installer | php`

Install/update the dependencies: `php ./composer.phar update -v -o`

`-o` optimizes the PSR-0 autoloader to classmap, and is optional.

Run Tests
---------

Run tests from this directory by issuing this command: `php vendor/bin/phpunit -c Test/conf/phpunit.xml`

Composer generates the vendor/bin directory. If phpunit isn't there, try `php ./vendor/phpunit/phpunit/composer/bin/phpunit -c Test/conf/phpunit.xml`
