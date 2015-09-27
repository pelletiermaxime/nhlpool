<?php

namespace Nhlpool\PoolTypes;

class TeamsScoreType
{
    public $properties = [
        'nbTeams'            => 5,
        'victoryPoints'      => 5,
        'lossPoints'         => 0,
        'goalsForPoints'     => 1,
        'goalsAgainstPoints' => 0,
        'shutoutsPoints'     => 5,
    ];

    public static function settings()
    {
        return [
            'nb_teams'             => ['type' => 'range', 'attr' => ['min' => 1, 'max' => 30]],
            'victory_points'       => ['type' => 'number'],
            'loss_points'          => ['type' => 'number'],
            'goals_for_points'     => ['type' => 'number'],
            'goals_against_points' => ['type' => 'number'],
            'shutouts_points'      => ['type' => 'number'],
        ];
    }

    public function setProperties($property, $value)
    {
        $this->properties[$property] = $value;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}
