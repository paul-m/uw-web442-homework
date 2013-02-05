Assignment 2
============

By Paul Mitchum for WebLAMP 442, paul@mile23.com

Assignment 2: https://github.com/jayzeng/UW-PHP-course/blob/master/lecture/lecture4/assignment2.md

What To Do?
-----------

This project uses composer, so get it: `curl -s https://getcomposer.org/installer | php`

Make sure the dependencies and class autoloading are up to date: `php ./composer.phar -v -o install`

Run the tests without coverage reporting: `php vendor/bin/phpunit -c Test/conf/phpunit.xml`

Run the tests with coverage reporting: `php vendor/bin/phpunit -c Test/conf/phpunit.xml --coverage-html coverage`

You can then open ./coverage/index.html in a web browser to see a nifty report. It should be 100% coverage.

