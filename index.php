<?php
use Skill\AddSkillCommand;
use Skill\AddSkillCommandHandler;
use Skill\AddSkillParentCommand;
use Skill\AddSkillParentCommandHandler;
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

$app->put('/skill/', function(Request $request) use($app) {
    $content = json_decode($request->getContent(), true);
    $skillName = $content['skillName'];

    $commandHandler = new AddSkillCommandHandler();
    $commandHandler->addSkill(new AddSkillCommand($skillName));
    return new Response('The skill have been added.', 201);
});

$app->put('/parent_skill/', function(Request $request) use($app) {
    $content = json_decode($request->getContent(), true);
    $parentId = $content['parentId'];
    $childId = $content['childId'];

    $commandHandler = new AddSkillParentCommandHandler();
    $commandHandler->addSkillParent(new AddSkillParentCommand($childId, $parentId));
    return new Response('The parent of this skill have been set.!', 201);
});

$app->run();
