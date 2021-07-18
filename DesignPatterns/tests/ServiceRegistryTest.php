<?php declare(strict_types=1);

namespace DesignPatterns\Structural\Registry\Tests;

use InvalidArgumentException;
use DesignPatterns\Structural\Registry\MyServiceRegistry;
use DesignPatterns\Structural\Registry\Service;
use PHPUnit\Framework\TestCase;

class ServiceRegistryTest extends TestCase
{
    private Service $service;

    protected function setUp(): void
    {
        $this->service = $this->getMockBuilder(Service::class)->getMock();
    }

    public function testSetAndGetLogger()
    {
        MyServiceRegistry::set(MyServiceRegistry::LOGGER, $this->service);

        $this->assertSame($this->service, MyServiceRegistry::get(MyServiceRegistry::LOGGER));
    }

    public function testThrowsExceptionWhenTryingToSetInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);

        MyServiceRegistry::set('foobar', $this->service);
    }

    /**
     * notice @runInSeparateProcess here: without it, a previous test might have set it already and
     * testing would not be possible. That's why you should implement Dependency Injection where an
     * injected class may easily be replaced by a mockup
     *
     * @runInSeparateProcess
     */
    public function testThrowsExceptionWhenTryingToGetNotSetKey()
    {
        $this->expectException(InvalidArgumentException::class);

        MyServiceRegistry::get(MyServiceRegistry::LOGGER);
    }
}