<?php

namespace Tests\Unit;

use Tests\TestCase;

# 顧客一件取得機能テスト
class SearchTest extends TestCase
{
    public function test_search(): void
    {
        // 取得実施
        $responseGet = $this->get('/api/retrieve/1');

        // 事後検証
        $this->assertEquals(200, $responseGet->getStatusCode());
        $obj = $responseGet->getData();
        $this->assertEquals($obj->id, '1');
    }
}
