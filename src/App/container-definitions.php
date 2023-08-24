<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database, Container};
use App\Config\Paths;
use App\Services\{
  ValidatorService,
  UserService,
  TransactionService,
  ReceiptService
};

return [
  TemplateEngine::class => fn () => new TemplateEngine(__DIR__ . "/../views"),
  ValidatorService::class => fn () => new ValidatorService(),
  Database::class => fn () => new Database(  'mysql', [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'good_mood2'
], 'root', ''),
  UserService::class => function (Container $container) {
    $db = $container->get(Database::class);

    return new UserService($db);
  },
  TransactionService::class => function (Container $container) {
    $db = $container->get(Database::class);

    return new TransactionService($db);
  },
  ReceiptService::class => function (Container $container) {
    $db = $container->get(Database::class);

    return new ReceiptService($db);
  }
];
