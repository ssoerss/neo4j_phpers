<?php

namespace User;

use GraphAware\Neo4j\Client\ClientBuilder;

class ConnectUsersCommandHandler
{

    /**
     * ConnectUsersCommandHandler constructor.
     */
    public function connectUsers(ConnectUsersCommand $command)
    {
        $client = ClientBuilder::create()
            ->addConnection('default', 'http://192.168.99.100:7474')
            ->build();

        $client->run("
            MATCH (connecting:Person {id: '{$command->getConnectingId()}'})
            MATCH (target:Person {id: '{$command->getTargetId()}'})
            CREATE (connecting)-[:ARE_CONNECTED]->(target)
            CREATE (target)-[:ARE_CONNECTED]->(connecting)
        ");
    }
}