Reco4life SDK
========
![Build Status](https://travis-ci.org/Purelightme/reco4life.svg?branch=master)


现代物联网智能插座方案reco4life,支持HttpAPI和局域网API.

Sdk client for Reco4life service.

Installation
------------
It's recommended that you use [Composer](https://getcomposer.org/) to install this project.

```bash
composer require purelightme/reco4life
```

This will install the library and all required dependencies.

Usage
-----

```php
use Purelightme\Reco4life;

$reco = new Reco4life(YOUR_RECO_USER_NAME,YOUR_RECO_API_KEY);
$token = $reco->getToken();
$itemLists = $reco->itemList(['user_name' => YOUR_RECO_USER_NAME],$token['token']);
var_dump($itemLists);
```

Test
------
```bash 
vendor/bin/phpunit tests
```

Todo
------
- 局域网API(基于swoole)