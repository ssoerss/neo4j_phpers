<?php


namespace Skill;

use GraphAware\Neo4j\Client\ClientBuilder;

class AddSkillParentCommandHandler
{
    public function addSkillParent(AddSkillParentCommand $command)
    {
        $client = ClientBuilder::create()
            ->addConnection('default', 'http://192.168.99.100:7474')
            ->build();

        $client->run("
            MATCH (skill:Skill {id: '{$command->getSkillId()}'})
            MATCH (parent:Skill {id: '{$command->getParentSkillId()}'})
            CREATE (parent)-[:IS_PARENT]->(skill)
        )");
    }
}