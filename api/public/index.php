<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

date_default_timezone_set('Europe/Madrid');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/add/{numero1}/{numero2}', function (Request $request, Response $response, $args) {
  $response->getBody()->write(json_encode(['result' => $args['numero1'] + $args['numero2']]));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/subtract/{numero1}/{numero2}', function (Request $request, Response $response, $args) {
  $response->getBody()->write(json_encode(['result' => $args['numero1'] - $args['numero2']]));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/multiply/{numero1}/{numero2}', function (Request $request, Response $response, $args) {
  $response->getBody()->write(json_encode(['result' => $args['numero1'] * $args['numero2']]));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/divide/{numero1}/{numero2}', function (Request $request, Response $response, $args) {
  $response->getBody()->write(json_encode(['result' => $args['numero1'] / $args['numero2']]));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/pow/{numero1}/{numero2}', function (Request $request, Response $response, $args) {
  $response->getBody()->write(json_encode(['result' => pow($args['numero1'], $args['numero2'])]));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
