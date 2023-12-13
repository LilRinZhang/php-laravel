<?php

namespace Tests\Unit;

use Tests\TestCase;

# 顧客情報更新機能テスト
class UpdateTest extends TestCase
{
    public function test_update(): void
    {

        // 事前検証
        $responseGetBefore = $this->get('/api/retrieve/1');
        $dataBefore = $responseGetBefore->getData();
        $this->assertEquals($dataBefore->id, '1');
        $this->assertNotEquals($dataBefore->name, 'Test');
        $this->assertNotEquals($dataBefore->phone, '000');
        $this->assertNotEquals($dataBefore->email, 'Test@xon.jp');

        // 更新実施
        $responsePost = $this->post('/api/update/1', ['name' => 'Test', 'phone' => '000', 'email' => 'Test@xon.jp']);

        // 正常系
        $this->assertEquals(200, $responsePost->getStatusCode());
        $responseGetAfter = $this->get('/api/retrieve/1');
        $dataAfter = $responseGetAfter->getData();
        $this->assertEquals($dataAfter->id, '1');
        $this->assertEquals($dataAfter->name, 'Test');
        $this->assertEquals($dataAfter->phone, '000');
        $this->assertEquals($dataAfter->email, 'Test@xon.jp');
    }
}
