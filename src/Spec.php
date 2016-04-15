<?php
namespace JobOpp;

use JobOpp\ActionPoints\Interview;
use JobOpp\Attributes\HungerForKnowledge;
use JobOpp\Exceptions\IncompatibleCandidate;
use JobOpp\Human\Developer;
use JobOpp\Human\DrivenInterface;
use JobOpp\Industry\ISP as ISP;

class Spec extends ISP\Afrihost
{
    /** @var $candidate Developer */
    private $candidate = null;

    private $skills = [
        'PHP 5.5+',
        'Framework Knowledge (Symfony, Laraval, Composer based?)',
        'Frontend knowledge: JavaScript, AJAX, jQuery, AngularJS',
        'Knows Linux/OSX (or similar)'
    ];

    public function __construct(Developer $you)
    {
        $this->candidate = $you;

        $this->evaluate();
    }

    public function evaluate()
    {
        try {
            if (!($this->candidate instanceof DrivenInterface)) {
                throw new IncompatibleCandidate('We look for driven Developers ;)');
            }

            if (false === $this->hasSkillsRequired($this->candidate->getSkills(), $this->skills)) {
                throw new IncompatibleCandidate('If you got close, talk to me - maybe we can work something out ;)');
            };

            if (false === $this->hasHungerForKnowledge($this->candidate)) {
                throw new IncompatibleCandidate(
                    'Knowledge leads to wisdom. ' .
                    'Wisdom leads to success. ' .
                    'Success leads to secrets of the force!' .
                    'Acquire knowledge, you must!'
                );
            }

            $trueStory = $this->weAreCoolPeopleToWorkWithWhoDontKnowHowToNameThings();

            return new Interview('Well this is crazy. Call me! Maybe!?');
        } catch (\Exception $e) {

        } finally {
            if ($this->candidate->thinkYouCanMakeThisAdBetter()) {
                // Join us and make it better
            }
        }
    }

    /**
     * Check if at least 70% of the skills required is met
     * @return bool
     */
    protected function hasSkillsRequired($candidateSkills, $neededSkills)
    {
        return count(array_intersect($candidateSkills, $this->skills)) >= (count($neededSkills) * 0.7);
    }

    /**
     * Check if the candidate wants to learn all the things...
     * @param Developer $developer
     * @return bool
     */
    protected function hasHungerForKnowledge(Developer $developer)
    {
        return ($developer instanceof HungerForKnowledge);
    }

    /**
     * Srsly though, it's true!
     * @return bool
     */
    protected function weAreCoolPeopleToWorkWithWhoDontKnowHowToNameThings()
    {
        return true;
    }
}
