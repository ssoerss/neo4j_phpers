<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use User\AddUserCommand;
use User\AddUserCommandHandler;
use User\ConnectUsersCommand;
use User\ConnectUsersCommandHandler;

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application(["debug"=>true]);

$app->put('/user/', function(Request $request) use($app) {
    $content = json_decode($request->getContent(), true);
    $firstName = $content['firstName'];
    $lastName = $content['lastName'];

    $commandHandler = new AddUserCommandHandler();
    $commandHandler->addUser(new AddUserCommand($firstName, $lastName));
    return new Response('The user has been added!', 201);
});

$app->put('/connection/', function(Request $request) use($app) {
    $content = json_decode($request->getContent(), true);
    $connectingId = $content['connectingId'];
    $targetId = $content['targetId'];

    $commandHandler = new ConnectUsersCommandHandler();
    $commandHandler->connectUsers(new ConnectUsersCommand($connectingId, $targetId));
    return new Response('The users have been connected!', 201);
});

$app->run();
