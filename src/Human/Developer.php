<?php
namespace JobOpp\Human;

use JobOpp\Attributes\HungerForKnowledge;

class Developer implements HungerForKnowledge, DrivenInterface
{
    public function thinkYouCanMakeThisAdBetter() {
    }

    public function getSkills()
    {
        return [];
    }
}
