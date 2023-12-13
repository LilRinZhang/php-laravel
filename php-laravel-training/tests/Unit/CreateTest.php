<?php

namespace Tests\Unit;

use Tests\TestCase;

# 顧客登録機能テスト
class CreateTest extends TestCase
{
    public function test_create(): void
    {

        // 事前検証
        $responseGetBefore = $this->get('/api/retrieve');
        $dataBefore = $responseGetBefore->getData();

        // 登録実施
        $responsePost = $this->post('/api/create', ['name' => 'Test', 'phone' => '000', 'email' => 'Test@xon.jp']);

        // 正常系
        $this->assertEquals(200, $responsePost->getStatusCode());

        // 事後検証
        $responseGetAfter = $this->get('/api/retrieve');
        $dataAfter = $responseGetAfter->getData();
        $this->assertCount(sizeof($dataBefore) + 1, $dataAfter);
    }
}
