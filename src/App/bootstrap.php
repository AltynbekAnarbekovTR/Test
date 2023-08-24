<?php

declare(strict_types=1);

// if (!defined('AUTOLOADER_INITIALIZED')) {
    require __DIR__ . '/../../autoload.php';
// }

use Framework\App;
use App\Config\Paths;
use App\Middleware\{TemplateDataMiddleware,
    ValidationExceptionMiddleware,
    SessionMiddleware,
    FlashMiddleware,
    AuthRequiredMiddleware,
    GuestOnlyMiddleware,
    CsrfTokenMiddleware,
    CsrfGuardMiddleware,
};
use App\Controllers\{
    HomeController,
    AboutController,
    AuthController,
    TransactionController,
    ReceiptController
  };
dd(__DIR__ . "/../../");

$app = new App(Paths::SOURCE . "App/container-definitions.php");

$app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
  $app->get('/about', [AboutController::class, 'about']);
  $app->get('/register', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
  $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
  $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
  $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
  $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);
  $app->get('/transaction', [TransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class);
  $app->post('/transaction', [TransactionController::class, 'create'])->add(AuthRequiredMiddleware::class);
  $app->get('/transaction/{transaction}', [TransactionController::class, 'editView'])->add(AuthRequiredMiddleware::class);
  $app->post('/transaction/{transaction}', [TransactionController::class, 'edit'])->add(AuthRequiredMiddleware::class);
  $app->delete('/transaction/{transaction}', [TransactionController::class, 'delete'])->add(AuthRequiredMiddleware::class);
  $app->get('/transaction/{transaction}/receipt', [ReceiptController::class, 'uploadView'])->add(AuthRequiredMiddleware::class);
  $app->post('/transaction/{transaction}/receipt', [ReceiptController::class, 'upload'])->add(AuthRequiredMiddleware::class);
  $app->get('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'download'])->add(AuthRequiredMiddleware::class);
  $app->delete('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'delete'])->add(AuthRequiredMiddleware::class);

$app->addMiddleware(CsrfGuardMiddleware::class);
$app->addMiddleware(CsrfTokenMiddleware::class);
$app->addMiddleware(TemplateDataMiddleware::class);
$app->addMiddleware(ValidationExceptionMiddleware::class);
$app->addMiddleware(FlashMiddleware::class);
$app->addMiddleware(SessionMiddleware::class);

return $app;
