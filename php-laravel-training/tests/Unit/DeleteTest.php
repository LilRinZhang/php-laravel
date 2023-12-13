<?php

namespace Tests\Unit;

use Tests\TestCase;

use function PHPUnit\Framework\isEmpty;

# 顧客一件削除機能テスト
class DeleteTest extends TestCase
{
    public function test_delete(): void
    {
        // 事前検証
        $responseGetBefore = $this->get('/api/retrieve/1');
        $objBefore = $responseGetBefore->getData();
        $this->assertEquals($objBefore->id, '1');
        $responseGetAllBefore = $this->get('/api/retrieve');
        $numberBefore = $responseGetAllBefore->getData();

        // 削除実施
        $responsePost = $this->post('/api/delete/1');

        // 正常系
        $this->assertEquals(200, $responsePost->getStatusCode());

        // 事後検証
        $responseGetAfter = $this->get('/api/retrieve/1');
        $objAfter = $responseGetAfter->getData();
        $this->assertObjectNotHasProperty('id', $objAfter);

        $responseGetAllAfter = $this->get('/api/retrieve');
        $numberAfter = $responseGetAllAfter->getData();
        $this->assertEquals(sizeof($numberAfter) + 1, sizeof($numberBefore));
    }
}
