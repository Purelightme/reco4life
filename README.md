# 现代物联网智能插座方案reco4life,支持HttpAPI和局域网API

# steps
```
composer require purelightme/reco4life -vvv
```
```
<?php
use Purelightme\Reco4life;

$reco = new Reco4life(YOUR_RECO_USER_NAME,YOUR_RECO_API_KEY);
$token = $reco->getToken();
$itemLists = $reco->itemList(['user_name' => YOUR_RECO_USER_NAME],$token['token']);
var_dump($itemLists);
```
# todos
- 局域网API(基于swoole)
