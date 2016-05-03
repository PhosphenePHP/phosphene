<?php

namespace Rhubarb\Crown\Tests\unit\Sessions\SessionProviders;

use Rhubarb\Crown\DependencyInjection\Container;
use Rhubarb\Crown\Settings;
use Rhubarb\Crown\Tests\Fixtures\TestCases\RhubarbTestCase;
use Rhubarb\Crown\Tests\unit\Sessions\UnitTestingSession;

class PhpSessionProviderTest extends RhubarbTestCase
{
    public function testSessionStorage()
    {
        $session = UnitTestingSession::singleton();
        $session->TestValue = "abc123";
        $session->storeSession();

        $this->assertEquals("abc123", $_SESSION['Rhubarb\Crown\Tests\unit\Sessions\UnitTestingSession']["TestValue"]);
    }

    public function testSessionRestore()
    {
        $session = UnitTestingSession::singleton();
        $session->TestValue = "abc123";
        $session->storeSession();

        Container::current()->clearSingleton(UnitTestingSession::class);

        $session = UnitTestingSession::singleton();

        $this->assertEquals("abc123", $session->TestValue);
    }
}