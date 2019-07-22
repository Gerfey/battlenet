<?php

namespace Gerfey\BattleNet\Request\GameData\StarCraft2;

use Gerfey\BattleNet\Http\BattleNetResponseInterface;
use Gerfey\BattleNet\Request\Request;

/**
 * Class League
 * @package Gerfey\BattleNet\Request\GameData\StarCraft2
 */
class League extends Request
{
    /**
     * Returns data for the specified season, queue, team, and league.
     * queueId: the standard available queueIds are: 1=WoL 1v1, 2=WoL 2v2, 3=WoL 3v3, 4=WoL 4v4, 101=HotS 1v1, 102=HotS 2v2, 103=HotS 3v3, 104=HotS 4v4, 201=LotV 1v1, 202=LotV 2v2, 203=LotV 3v3, 204=LotV 4v4, 206=LotV Archon. Note that other available queues may not be listed here.
     * teamType: there are two available teamTypes: 0=arranged, 1=random.
     * leagueId: available leagueIds are: 0=Bronze, 1=Silver, 2=Gold, 3=Platinum, 4=Diamond, 5=Master, 6=Grandmaster.
     *
     * @param int $seasonId
     * @param int $queueId
     * @param int $teamType
     * @param int $leagueId
     * @return BattleNetResponseInterface
     */
    public function getLeagueData(string $seasonId, string $queueId, string $teamType, string $leagueId): BattleNetResponseInterface
    {
        $this->setNamespace('prod');
        return $this->createRequest('GET', '/data/sc2/league/' . $seasonId . '/' . $queueId . '/' . $teamType . '/' . $leagueId);
    }
}