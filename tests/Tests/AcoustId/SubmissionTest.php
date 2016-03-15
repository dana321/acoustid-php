<?php namespace Tests\AcoustId;

use AcoustId\Exception;
use AcoustId\Submission;

/**
 * Class TestSubmission
 *
 * @package Tests\AcoustId
 */
class SubmissionTest extends AcoustIdTestCase
{

    /**
     * @var Submission
     */
    protected $submission;

    /**
     *
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
    }

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->submission = new Submission(API_USERID_TOKEN, $this->duration, $this->fingerPrint);
    }

    /**
     * @covers AcoustId\Submission::getFormatAllowedValues
     * @covers AcoustId\Submission::setFormat
     * @covers AcoustId\Submission::getFormat
     * @throws Exception
     */
    public function testSetFormat()
    {
        foreach ($this->submission->getFormatAllowedValues() as $format) {
            $this->submission->setFormat($format);
            $this->assertEquals($format, $this->submission->getFormat());
            $this->assertSame($format, $this->submission->getFormat());
        }

        $this->expectException(Exception::class);
        $this->submission->setFormat('badFormat');
    }

    /**
     * @covers AcoustId\Submission::setClientId
     * @covers AcoustId\Submission::getClientId
     */
    public function testSetClientId()
    {
        $this->submission->setClientId(API_CLIENT_TOKEN);
        $this->assertEquals(API_CLIENT_TOKEN, $this->submission->getClientId());
        $this->assertSame(API_CLIENT_TOKEN, $this->submission->getClientId());
    }

    /**
     * @covers AcoustId\Submission::setClientVersion
     * @covers AcoustId\Submission::getClientVersion
     */
    public function testSetClientVersion()
    {
        $this->submission->setClientVersion('1.0');
        $this->assertEquals('1.0', $this->submission->getClientVersion());
        $this->assertSame('1.0', $this->submission->getClientVersion());
    }

    /**
     * @covers AcoustId\Submission::setWait
     * @covers AcoustId\Submission::getWait
     */
    public function testSetWait()
    {
        $this->submission->setWait('1.0');
        $this->assertEquals('1.0', $this->submission->getWait());
        $this->assertSame((int) '1.0', $this->submission->getWait());
    }

    /**
     * @covers AcoustId\Submission::setUser
     * @covers AcoustId\Submission::getUser
     */
    public function testSetUser()
    {
        $this->submission->setUser(API_USERID_TOKEN);
        $this->assertEquals(API_USERID_TOKEN, $this->submission->getUser());
        $this->assertSame(API_USERID_TOKEN, $this->submission->getUser());
    }

    /**
     * @covers AcoustId\Submission::setDuration
     * @covers AcoustId\Submission::getDuration
     */
    public function testSetDuration()
    {
        $this->submission->setDuration(1);
        $this->assertEquals(1, $this->submission->getDuration());
        $this->assertSame(1, $this->submission->getDuration());

        $this->submission->setDuration('test');
        $this->assertEquals((int) 'test', $this->submission->getDuration());
        $this->assertSame((int) 'test', $this->submission->getDuration());
    }

    /**
     * @covers AcoustId\Submission::setFingerPrint
     * @covers AcoustId\Submission::getFingerPrint
     */
    public function testSetFingerPrint()
    {
        $this->submission->setFingerPrint($this->fingerPrint);
        $this->assertEquals($this->fingerPrint, $this->submission->getFingerPrint());
        $this->assertSame($this->fingerPrint, $this->submission->getFingerPrint());
    }

    /**
     * @covers AcoustId\Submission::setBitRate
     * @covers AcoustId\Submission::getBitRate
     */
    public function testSetBitRate()
    {
        $this->submission->setBitRate(320);
        $this->assertEquals(320, $this->submission->getBitRate());
        $this->assertSame(320, $this->submission->getBitRate());
    }

    /**
     * @covers AcoustId\Submission::setFileFormat
     * @covers AcoustId\Submission::getFileFormat
     */
    public function testSetFileFormat()
    {
        $this->submission->setFileFormat('mp3');
        $this->assertEquals('mp3', $this->submission->getFileFormat());
        $this->assertSame('mp3', $this->submission->getFileFormat());
    }

    /**
     * @covers AcoustId\Submission::setMBID
     * @covers AcoustId\Submission::getMBID
     */
    public function testSetMBID()
    {
        $this->submission->setMBID('c97a7693-af5d-4d73-8334-e4588aec169a');
        $this->assertEquals('c97a7693-af5d-4d73-8334-e4588aec169a', $this->submission->getMBID());
        $this->assertSame('c97a7693-af5d-4d73-8334-e4588aec169a', $this->submission->getMBID());
    }

    /**
     * @covers AcoustId\Submission::setTrack
     * @covers AcoustId\Submission::getTrack
     */
    public function testSetTrack()
    {
        $this->submission->setTrack('track data');
        $this->assertEquals('track data', $this->submission->getTrack());
        $this->assertSame('track data', $this->submission->getTrack());
    }

    /**
     * @covers AcoustId\Submission::setArtist
     * @covers AcoustId\Submission::getArtist
     */
    public function testSetArtist()
    {
        $this->submission->setArtist('track artist');
        $this->assertEquals('track artist', $this->submission->getArtist());
        $this->assertSame('track artist', $this->submission->getArtist());
    }

    /**
     * @covers AcoustId\Submission::setAlbum
     * @covers AcoustId\Submission::getAlbum
     */
    public function testSetAlbum()
    {
        $this->submission->setAlbum('track album');
        $this->assertEquals('track album', $this->submission->getAlbum());
        $this->assertSame('track album', $this->submission->getAlbum());
    }

    /**
     * @covers AcoustId\Submission::setAlbumArtist
     * @covers AcoustId\Submission::getAlbumArtist
     */
    public function testSetAlbumArtist()
    {
        $this->submission->setAlbumArtist('album artist');
        $this->assertEquals('album artist', $this->submission->getAlbumArtist());
        $this->assertSame('album artist', $this->submission->getAlbumArtist());
    }

    /**
     * @covers AcoustId\Submission::setYear
     * @covers AcoustId\Submission::getYear
     */
    public function testSetYear()
    {
        $this->submission->setYear(date('Y'));
        $this->assertEquals((int) date('Y'), $this->submission->getYear());
        $this->assertSame((int) date('Y'), $this->submission->getYear());
        $this->submission->setYear('str');
        $this->assertInternalType('int', $this->submission->getYear());
    }

    /**
     * @covers AcoustId\Submission::setTrackNo
     * @covers AcoustId\Submission::getTrackNo
     */
    public function testSetTrackNo()
    {
        $this->submission->setTrackNo(10);
        $this->assertEquals(10, $this->submission->getTrackNo());
        $this->assertSame(10, $this->submission->getTrackNo());
        $this->submission->setTrackNo('str');
        $this->assertInternalType('int', $this->submission->getTrackNo());
    }

    /**
     * @covers AcoustId\Submission::setDiscNo
     * @covers AcoustId\Submission::getDiscNo
     */
    public function testSetDiscNo()
    {
        $this->submission->setDiscNo(3);
        $this->assertEquals(3, $this->submission->getDiscNo());
        $this->assertSame(3, $this->submission->getDiscNo());
        $this->submission->setDiscNo('str');
        $this->assertInternalType('int', $this->submission->getDiscNo());
    }

}