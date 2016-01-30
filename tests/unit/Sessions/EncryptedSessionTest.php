<?php

namespace Rhubarb\Crown\Tests\unit\Sessions;

use Rhubarb\Crown\Encryption\Aes256ComputedKeyEncryptionProvider;
use Rhubarb\Crown\Encryption\EncryptionProvider;
use Rhubarb\Crown\Sessions\EncryptedSession;
use Rhubarb\Crown\Tests\Fixtures\TestCases\RhubarbTestCase;

class EncryptedSessionTest extends RhubarbTestCase
{
    public function setUp()
    {
        parent::setUp();

        EncryptionProvider::setEncryptionProviderClassName(Aes256ComputedKeyEncryptionProvider::class);
    }

    public function testSessionEncrypts()
    {
        $session = new UnitTestEncryptedSession();
        $session->TestValue = "123456";
        $raw = $session->exportRawData();

        $this->assertEquals("lu3RCzBb/lz4HIqFnlHc7A==", $raw["TestValue"]);
        $this->assertEquals("123456", $session->TestValue);
    }
}

class UnitTestEncryptedSession extends EncryptedSession
{
    /**
     * Override to return the encryption key to use.
     *
     * @return mixed
     */
    protected function getEncryptionKeySalt()
    {
        return "simplekey";
    }
}