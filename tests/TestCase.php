<?php

namespace Meirtin\Crypton\Tests;

use Illuminate\Http\Request;
use Orchestra\Testbench\TestCase as Orchestra;
use Meirtin\Crypton\CryptonServiceProvider;
use Meirtin\Crypton\Middleware\EncryptRequestResponse;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CryptonServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['router']->any('tzsk/crypton', function (Request $request) {
            return $request->all();
        })->middleware(EncryptRequestResponse::class);
    }
}
