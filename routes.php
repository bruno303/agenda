<?php

use \Source\Page;
use \Source\User;
use \Source\Encryption;
use \Source\Event;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->get('/', function()
{
    User::verifyLogin();
    $events = Event::listAll((int)$_SESSION['user']['id_student']);
    $pg = new Page("index", ['events' => $events, 'showSearch' => true]);
});

$app->get('/login[/]', function()
{
    $pg = new Page("login", [], false, false);
});

$app->get('/login/{mensagem}[/]', function(Request $request, Response $response, array $args)
{
    $mensagem = strip_tags($args['mensagem']);
    $mensagem = str_replace("|", " ", $mensagem);
    $pg = new Page("login", ['erro' => $mensagem], false, false);
});

$app->post('/login[/]', function()
{
    if(isset($_POST))
    {
        $login = User::logar($_POST);
        if($login !== "")
        {
            $login = str_replace(" ", "|", $login);
            redirect("/login/$login");
        }
        else
        {
            redirect("/");
        }
    }
});

$app->get('/logout[/]', function()
{
    User::verifyLogin();
    User::logout();
});

$app->get('/events[/]', function()
{
    User::verifyLogin();
    $pg = new Page("eventsAdd");
});

$app->post('/events/{id_event}[/]', function(Request $request, Response $response, array $args)
{
    User::verifyLogin();
    $event = new Event();
    $ev = $event->load((int)$args['id_event']);
    if(isset($ev[0]))
    {
        $event->update($_POST);
    }
    redirect('/');
});

$app->post('/events[/]', function()
{
    User::verifyLogin();
    
    $event = new Event();
    $event->add($_POST);

    redirect('/');
});

$app->get('/teste[/]', function()
{
    echo "Teste!";
});

$app->get('/diseve/{id_event}[/]', function(Request $request, Response $response, array $args)
{
    User::verifyLogin();
    $event = new Event();
    $ev = $event->load((int)$args['id_event']);
    if(isset($ev[0]))
    {
        $event->alterActive((int)$args['id_event'], false);
    }
    redirect('/');
});

$app->get('/eneve/{id_event}[/]', function(Request $request, Response $response, array $args)
{
    User::verifyLogin();
    $event = new Event();
    $ev = $event->load((int)$args['id_event']);
    if(isset($ev[0]))
    {
        $event->alterActive((int)$args['id_event'], true);
    }
    redirect('/');
});

$app->get('/edeve/{id_event}[/]', function(Request $request, Response $response, array $args)
{
    User::verifyLogin();
    $ev = new Event();
    $event = $ev->load((int)$args['id_event']);
    if(isset($event[0]))
    {
        $pg = new Page("eventsEdit", $event[0]);
    }
    else
    {
        redirect('/');
    }
});

$app->get('/admin[/]', function()
{
    User::verifyLoginAdmin();
    $pg = new Page("admin");
});

$app->get('/admin/students[/]', function()
{
    User::verifyLoginAdmin();
    $user = User::listAll();
    $pg = new Page("adminStudents", ['user' => $user], true, true);
});

$app->get('/disuse/{id_student}[/]', function(Request $request, Response $response, array $args)
{
    User::verifyLoginAdmin();
    $student = new User();
    $user = $student->load((int)$args['id_student']);
    if(isset($user[0]))
    {
        $student->alterActive((int)$args['id_student'], false);
    }
    redirect('/admin/students');
});

$app->get('/enuse/{id_student}[/]', function(Request $request, Response $response, array $args)
{
    User::verifyLoginAdmin();
    $student = new User();
    $user = $student->load((int)$args['id_student']);
    if(isset($user[0]))
    {
        $student->alterActive((int)$args['id_student'], true);
    }
    redirect('/admin/students');
});

$app->get('/eduse/{id_student}[/]', function(Request $request, Response $response, array $args)
{
    User::verifyLoginAdmin();
    $student = new User();
    $user = $student->load((int)$args['id_student']);
    if(isset($user[0]))
    {
        $pg = new Page("usersEdit", $user[0]);
    }
    else
    {
        redirect('/admin/students');
    }
});

$app->get('/students[/]', function()
{
    User::verifyLoginAdmin();
    
    $pg = new Page("students");
});

$app->post('/students[/]', function()
{
    User::verifyLoginAdmin();
    
    $user = new User();
    $user->add($_POST);

    redirect('/admin/students');
});

$app->post('/students/{id_student}', function(Request $request, Response $response, array $args)
{
    User::verifyLoginAdmin();
    
    $user = new User();
    $ex = $user->load($args['id_student']);
    if (isset($ex[0]))
    {
        $user->update($_POST);
    }

    redirect('/admin/students');
});

$app->post('/search[/]', function()
{
    User::verifyLogin();
    if(isset($_POST))
    {
        $ev = new Event();
        $events = $ev->search($_POST);
        $pg = new Page("index", ['events' => $events, 'showclear' => true, 'showSearch' => true]);
    }
    else
    {
        redirect('/');
    }
});

$app->run();

?>