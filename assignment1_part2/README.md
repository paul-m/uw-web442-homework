Assignment 1, Part 2
====================

How to build something like this:

- Make a new directory.
- cd to this directory.
- Grab composer: http://getcomposer.org/download/
- `php ./composer.phar init` This will ask you questions and create a composer.json file.
- Edit composer.json and add a requirement of `"phpunit/phpunit": "3.7.*"` or similar. Clues here: http://www.phpunit.de/manual/current/en/installation.html#installation.composer
- `php ./composer.phar update` This will generate all the stuff in the vendor/ directory.
- You are done.
