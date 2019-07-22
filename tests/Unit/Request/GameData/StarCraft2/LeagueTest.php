<?php

namespace Gerfey\Tests\Unit\Request\GameData\StarCraft2;

use Gerfey\BattleNet\Http\BattleNetClient;
use Gerfey\BattleNet\Regions\Europe;
use Gerfey\BattleNet\Regions\US;
use Gerfey\BattleNet\Request\GameData\StarCraft2\League;
use PHPUnit\Framework\TestCase;

class LeagueTest extends TestCase
{
    private $access_token = "";

    public function testCardSearch()
    {
        $client = new BattleNetClient(new US(), $this->access_token);
        $response = new League($client);
        $getLeagueData = $response->getLeagueData('37', '201', '0', '6');
        $this->assertSame(200, $getLeagueData->getStatusCode());
    }
}
