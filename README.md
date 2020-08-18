# composer uninstall

This plugin, once installed, adds a `composer uninstall` command that will uninstall (not remove from `composer.*`) all packages on your filesystem. It basically does the _opposite_ of `composer install` which takes the required packages and installs them into directories, this will delete those directories.

## Installation

```
composer global config repositories.composer-uninstall git git@github.com:aubreypwd/composer-uninstall.git
composer global require aubreypwd/composer-uninstall:dev-master@dev
```
