Assignment 2
============

By Paul Mitchum for WebLAMP 442, paul@mile23.com

Assignment 2: https://github.com/jayzeng/UW-PHP-course/blob/master/lecture/lecture4/assignment2.md

Design
------

We're adapting a PDO object to make it even more neutral than it already is. We want to be the testable layer between an entity model and the database. We'll completely obscure the DB layer through abstraction, except for the table and column names.

We define a schema, but only so we can use PDO to sanitize against SQL injection.


What To Do?
-----------

This project uses composer, so get it: `curl -s https://getcomposer.org/installer | php`

Make sure the dependencies and class autoloading are up to date: `php ./composer.phar -v -o install`

Run the tests without coverage reporting: `php vendor/bin/phpunit -c Test/conf/phpunit.xml`

Run the tests with coverage reporting: `php vendor/bin/phpunit -c Test/conf/phpunit.xml --coverage-html coverage`

You can then open ./coverage/index.html in a web browser to see a nifty report. It should be 100% coverage.

This is another line so travis will do something.

