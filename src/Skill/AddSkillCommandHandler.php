<?php

namespace Skill;

use GraphAware\Neo4j\Client\ClientBuilder;
use Ramsey\Uuid\Uuid;

class AddSkillCommandHandler
{

    public function addSkill(AddSkillCommand $command)
    {
        $uuid = Uuid::uuid1();
        $client = ClientBuilder::create()
            ->addConnection('default', 'http://192.168.99.100:7474')
            ->build();

        $client->run("CREATE (n:Skill {
            skillName: '{$command->getSkillName()}',
            id: '{$uuid->toString()}'}
        )");
    }
}