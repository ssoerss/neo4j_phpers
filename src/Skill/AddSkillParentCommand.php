<?php


namespace Skill;


class AddSkillParentCommand
{
    private $skillId;
    private $parentSkillId;

    public function __construct($skillId, $parentSkillId)
    {

        $this->skillId = $skillId;
        $this->parentSkillId = $parentSkillId;
    }

    /**
     * @return mixed
     */
    public function getParentSkillId()
    {
        return $this->parentSkillId;
    }

    /**
     * @return mixed
     */
    public function getSkillId()
    {
        return $this->skillId;
    }

}