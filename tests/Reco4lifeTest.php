<?php

declare(strict_types=1);

final class Reco4lifeTest extends \PHPUnit\Framework\TestCase
{
    public function testGetToken()
    {
        $reco = new \Purelightme\Reco4life('','');
        $res = $reco->getToken();
        $this->assertEquals(\Purelightme\ErrorCode::RESULT_AUTH_ERROR,$res['result']);
    }
}
