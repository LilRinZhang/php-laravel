<?php

namespace Tests\Unit;

use Tests\TestCase;

# 顧客全件取得機能テスト
class RetrieveTest extends TestCase
{
    public function test_retrieve(): void
    {
        // 取得実施
        $responseGet = $this->get('/api/retrieve');

        // 事後検証
        $this->assertEquals(200, $responseGet->getStatusCode());
        $obj = $responseGet->getData();
        $this->assertEquals(sizeof($obj), 3);
    }
}
