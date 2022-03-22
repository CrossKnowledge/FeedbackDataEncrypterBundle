<?php

namespace AppBundle\Tests\Services;

use CrossKnowledge\FeedbackDataEncrypterBundle\Services\DataEncrypter;
use PHPUnit\Framework\TestCase;

class DataEncrypterTest extends TestCase
{
    /** @var string */
    const TEST_KEY_16 = '7sLGx1aCk9Hx3l9w';

    /** @var string */
    const TEST_KEY_32 = 'xe7w5dKMy8yTpKENL6THonWBLFlTNMwa';

    /** @var DataEncrypter */
    private static $dataEncrypter;

    /**
     * @inheritDoc
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        self::$dataEncrypter = new DataEncrypter();
    }

    /**
     * Data with different scenarios to test encrypt and decrypt.
     *
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            ['Test data', self::TEST_KEY_16],
            ['Test data', self::TEST_KEY_32],
            [['title' => 'Test', 'description' => 'Data'], self::TEST_KEY_16],
            ['', self::TEST_KEY_16],
            [null, self::TEST_KEY_16],
        ];
    }

    /**
     * Test to encrypt and decrypt data successfully.
     *
     * @dataProvider successDataProvider
     */
    public function testDecryptSuccess($data, $key): void
    {
        $encrypted = self::$dataEncrypter->encrypt($data, $key);
        $decrypted = self::$dataEncrypter->decrypt($encrypted, $key);

        $this->assertEquals($data, $decrypted);
    }

    /**
     * Test to encrypt and decrypt using different keys.
     */
    public function testDecryptFail(): void
    {
        $data = "Test data";
        $encrypted = self::$dataEncrypter->encrypt($data, self::TEST_KEY_16);
        $decrypted = self::$dataEncrypter->decrypt($encrypted, self::TEST_KEY_32);

        $this->assertNotEquals($data, $decrypted);
    }
}
