<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

// 加载容器并初始化
$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

// 从容器中取出 http kernel 处理 http 请求
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Illuminate\Http\Request 是对 Symphony Request 的封装
// $request = Illuminate\Http\Request::capture() 得到一个 Request 实例
// 调用 handle 方法处理 request 请求，得到 response 对象
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// 将 response 发送到客户端
$response->send();

// 执行收尾操作，如 session 保存，容器的 terminate 方法
$kernel->terminate($request, $response);
