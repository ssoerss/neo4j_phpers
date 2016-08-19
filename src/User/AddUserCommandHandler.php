<?php


namespace User;

use GraphAware\Neo4j\Client\ClientBuilder;
use Ramsey\Uuid\Uuid;

class AddUserCommandHandler
{
    public function addUser(AddUserCommand $command)
    {
        $uuid = Uuid::uuid1();
        $client = ClientBuilder::create()
            ->addConnection('default', 'http://192.168.99.100:7474')
            ->build();

        $client->run("CREATE (n:Person {
            firstName: '{$command->getFirstName()}',
            lastName: '{$command->getLastName()}',
            id: '{$uuid->toString()}'}
        )");
    }
}