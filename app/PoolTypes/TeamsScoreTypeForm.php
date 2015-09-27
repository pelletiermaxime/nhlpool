<?php

namespace Nhlpool\PoolTypes;

use Auth;
use Gate;
use Kris\LaravelFormBuilder\Form;
use Nhlpool\PoolUser;
use Nhlpool\Remote\Teams;

class TeamsScoreTypeForm extends Form
{
    private $teams;

    public function __construct(Teams $teams)
    {
        $this->teams = $teams->all();
    }

    public function buildForm()
    {
        $pool = $this->getData('pool');
        $rules = $pool->pool_type->rules;
        $pooluser = PoolUser::pool($pool->id)->first();

        foreach($this->teams as $team) {
            $teamChoices[$team['id']] = [
                'label'     => "{$team['city']} {$team['name']}",
                'image-src' => "https://nhlstats.org/images/SVG/{$team['short_name']}.svg",
            ];
        }

        $this->add('teams', 'select', [
            'template'  => 'vendor.laravel-form-builder.selectImage',
            'attr'      => [
                'class'      => 'image-picker show-html',
                'data-limit' => $rules->nbTeams,
                'multiple'   => 'multiple',
                'height'     => '35px',
            ],
            'choices'   => $teamChoices,
            'id'        => 'teamsPicker',
            'selected'  => $pooluser['choices'],
        ]);
        if (Auth::check() && Gate::denies('join-pool', $pool)) {
            $this->add('save', 'submit', ['label' => 'Save choices']);
        }
    }
}
