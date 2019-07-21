# Battle.net API Client

[![Source Code][badge-source]][source]
[![Software License][badge-license]][license]
[![Total Downloads][badge-downloads]][downloads]

gerfey/battlenet is a PHP 7.1+ library for working with the Battle.net APIs.

## Installation

The preferred method of installation is via [Packagist][] and [Composer][]. Run
the following command to install the package and add it as a requirement to your
project's `composer.json`:

```bash
composer require gerfey/battlenet @dev
```

## Usage

### Regions selection

```php
US: new US() | US('en_US') | US('es_MX') | US('pt_BR');
Europe: new Europe() | Europe('en_GB') | Europe('es_ES') | Europe('fr_FR') | Europe('ru_RU') | Europe('de_DE') | Europe('pt_PT') | Europe('it_IT');
Korea: new Korea() | Korea('ko_KR');
Taiwan: new Taiwan() | Taiwan('zh_TW');
China: new China() | China('zh_CN');
```

### API

Currently implemented work with endpoints World of Warcraft game data. All Battle.net API endpoints will be ready soon.

```php
use Gerfey\BattleNet\Http\BattleNetClient;
use Gerfey\BattleNet\Regions\Europe;
use Gerfey\BattleNet\Request\Profile\Warcraft\Character;

$access_token = "************";

$client = new BattleNetClient(new Europe(), $this->access_token);

$character = new Character($client);
$response = $character->characterProfile('Howling Fjord', 'Пуфка');
var_dump($response->getJson());

{#270 ▼
  +"_links": {#277 ▶}
  +"id": 109196258
  +"name": "Пуфка"
  +"gender": {#266 ▶}
  +"faction": {#265 ▶}
  +"race": {#261 ▶}
  +"character_class": {#272 ▶}
  +"active_spec": {#279 ▼
    +"key": {#278 ▶}
    +"name": "Хмелевар"
    +"id": 268
  }
  +"realm": {#281 ▼
    +"key": {#280 ▶}
    +"name": "Ревущий фьорд"
    +"id": 1615
    +"slug": "howling-fjord"
  }
  +"guild": {#283 ▶}
  +"level": 120
  +"experience": 0
  +"achievement_points": 2750
  +"achievements": {#286 ▶}
  +"titles": {#287 ▶}
  +"pvp_summary": {#288 ▶}
  +"raid_progression": {#289 ▶}
  +"media": {#290 ▶}
  +"last_login_timestamp": 1563463764000.0
  +"average_item_level": 420
  +"equipped_item_level": 419
  +"specializations": {#291 ▶}
  +"statistics": {#292 ▶}
  +"mythic_keystone_profile": {#293 ▶}
  +"equipment": {#294 ▶}
  +"appearance": {#295 ▶}
  +"collections": {#296 ▶}
  +"active_title": {#298 ▶}
}
```

### Blizzard API Links
At times, there will be links in the response from the Blizzard API for a quick request.
To process this reference, call the Client method:
```php
use Gerfey\BattleNet\Http\BattleNetClient;
use Gerfey\BattleNet\Regions\Europe;

$access_token = "************";
$url = "https://eu.api.blizzard.com/data/wow/mount/?namespace=static-eu";

$client = new BattleNetClient(new Europe(), $access_token);
$response = $client->createRequestToBlizzardApiReference($url);
var_dump($response->getJson());

{#261 ▼
  +"_links": {#275 ▼
    +"self": {#277 ▼
      +"href": "https://eu.api.blizzard.com/data/wow/mount/?namespace=static-8.2.0_30827-eu"
    }
  }
  +"mounts": array:767 [▼
    0 => {#265 ▼
      +"key": {#271 …1}
      +"name": "Гнедой конь"
      +"id": 6
    }
    1 => {#262 ▶}
    2 => {#269 ▶}
    ...
  ]
}
```
 
## Copyright and License

The gerfey/battlenet library is copyright © [Alexander Levchenkov](https://vk.com/gerfey) and
licensed for use under the MIT License (MIT). Please see [LICENSE][] for more
information.

[packagist]: https://packagist.org/packages/gerfey/battlenet
[composer]: http://getcomposer.org/
[http-interop/http-factory-guzzle]: https://packagist.org/packages/http-interop/http-factory-guzzle
[guzzlehttp/guzzle]: https://packagist.org/packages/guzzlehttp/guzzle

[badge-source]: https://img.shields.io/badge/source-gerfey/battlenet-blue.svg?style=flat-square
[badge-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/gerfey/battlenet/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/gerfey/battlenet.svg?style=flat-square

[source]: https://github.com/gerfey/battlenet
[release]: https://packagist.org/packages/gerfey/battlenet
[license]: https://github.com/gerfey/battlenet/blob/master/LICENSE
[build]: https://travis-ci.org/gerfey/battlenet
[downloads]: https://packagist.org/packages/gerfey/battlenet
