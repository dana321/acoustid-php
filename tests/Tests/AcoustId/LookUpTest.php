<?php namespace Tests\AcoustId;

use AcoustId\Exception;
use AcoustId\LookUp;

class LookUpTest extends AcoustIdTestCase
{
    /**
     * @var LookUp
     */
    protected $abstractLookUp;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
    }

    public function setUp()
    {
        parent::setUp();

        /** @var LookUp $stub */
        $this->abstractLookUp = $this->getMockForAbstractClass(LookUp::class);
        $this->abstractLookUp->setClientId(API_CLIENT_TOKEN);
    }

    public function testSetJsonCallBack()
    {
        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setJsonCallBack('jsonAcoustidApi'));
        $this->assertEquals('jsonAcoustidApi', $this->abstractLookUp->getJsonCallBack());
    }

    public function testSetClientId()
    {
        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setClientId('clientId'));
        $this->assertEquals('clientId', $this->abstractLookUp->getClientId());
    }

    /**
     * @throws Exception
     */
    public function testSetFormat()
    {
        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setFormat('xml'));
        $this->assertEquals('xml', $this->abstractLookUp->getFormat());

        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setFormat('json'));
        $this->assertEquals('json', $this->abstractLookUp->getFormat());

        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setFormat('jsonp'));
        $this->assertEquals('jsonp', $this->abstractLookUp->getFormat());
        $this->assertEquals('jsonAcoustidApi', $this->abstractLookUp->getJsonCallBack());
    }

    /**
     * @throws Exception
     */
    public function testSetMeta()
    {
        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setMeta(['recordings']));
        $this->assertEquals(['recordings'], $this->abstractLookUp->getMeta());

        $this->expectException(Exception::class);
        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setMeta(['malformed_meta']));
        $this->assertEquals(['recordings'], $this->abstractLookUp->getMeta());
    }

    public function testSetUrl()
    {
        $this->assertInstanceOf(LookUp::class, $this->abstractLookUp->setUrl('http://some.domain'));
        $this->assertEquals('http://some.domain', $this->abstractLookUp->getUrl());
    }

    /**
     * @throws Exception
     */
    public function testCheckRequiredParameters()
    {
        $this->abstractLookUp->checkRequiredParameters();
    }
}