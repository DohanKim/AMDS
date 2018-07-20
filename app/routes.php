<?php
// Routes

$app->get('/', 'App\Controller\HomeController:dispatch')
    ->setName('homepage');

$app->get('/post/{id}', 'App\Controller\HomeController:viewPost')
    ->setName('view_post');

$app->get('/user/sign_up', 'App\Controller\UserController:getSignUp')
    ->setName('user.getSignUp');

$app->post('/user/sign_up', 'App\Controller\UserController:postSignUp')
    ->setName('user.postSignUp');

$app->get('/user/sign_in', 'App\Controller\UserController:getSignIn')
    ->setName('user.getSignIn');

$app->post('/user/sign_in', 'App\Controller\UserController:postSignIn')
    ->setName('user.postSignIn');
