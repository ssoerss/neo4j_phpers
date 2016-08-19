<?php

namespace Skill;

class AddSkillCommand
{
    private $skillName;

    public function __construct($skillName)
    {

        $this->skillName = $skillName;
    }

    /**
     * @return mixed
     */
    public function getSkillName()
    {
        return $this->skillName;
    }
}