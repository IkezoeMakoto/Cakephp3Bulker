# Cakephp3Bulker plugin for CakePHP

[![CircleCI](https://circleci.com/gh/IkezoeMakoto/Cakephp3Bulker/tree/master.svg?style=svg)](https://circleci.com/gh/IkezoeMakoto/Cakephp3Bulker/tree/master)

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require ikezoe-makoto/cakephp3bulker
```

## Configuration

### Load the plugin:
```
// In /config/bootstrap.php
Plugin::load('Cakephp3Bulker');
```
### Make a model Bulker

Use the Bulker Behavior on your model Table class:

```
// in src/Model/Table/UsersTable.php
...
use SoftDelete\Model\Table\SoftDeleteTrait;

class UsersTable extends Table
{
    public function example()
    {
        $this->addBehavior('Cakephp3Bulker.Bulker');
        ...
    }
```

## Use
### Bulk Insert && Bulk Update
```php
// in src/Model/Table/UsersTable.php
$this->saveBulk($manySaveData);
```
