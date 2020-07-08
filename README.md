# composer uninstall

This plugin, once installed, adds a `composer uninstall` command that will uninstall (not remove) all packages. It basically does the _opposite_ of `composer install` which takes the required packages and installs them into directories, this will delete those directories.

## Installation

```
composer config repositories.composer-uninstall git@github.com:aubreypwd/composer-uninstall.git
composer require aubreypwd/composer-uninstall
```
