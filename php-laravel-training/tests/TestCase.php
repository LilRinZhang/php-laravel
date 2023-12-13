<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        DB::beginTransaction();
        DB::table('customer')->delete();
        $now = date("Y/m/d H:i:s");
        DB::table('customer')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'testNameA',
                    'phone' => 'testPhoneA',
                    'email' => 'testEmailA',
                    'create_at' => $now,
                    'update_at' => $now
                ],
                [
                    'id' => 2,
                    'name' => 'testNameB',
                    'phone' => 'testPhoneB',
                    'email' => 'testEmailB',
                    'create_at' => $now,
                    'update_at' => $now
                ],
                [
                    'id' => 3,
                    'name' => 'testNameC',
                    'phone' => 'testPhoneC',
                    'email' => 'testEmailC',
                    'create_at' => $now,
                    'update_at' => $now
                ]
            ]
        );
    }

    public function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }
}
