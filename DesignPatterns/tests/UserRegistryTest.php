<?php declare(strict_types=1);

namespace DesignPatterns\Structural\Registry\Tests;

use InvalidArgumentException;
use DesignPatterns\Structural\Registry\UserRegistry;
use DesignPatterns\Structural\Registry\User;
use PHPUnit\Framework\TestCase;

class UserRegistryTest extends TestCase
{
    public function testSetAndGetLogger()
    {
        $user1 = new User();
        $user1->name = 'John';

        $user2 = new User();
        $user2->name = 'Brian';

        $registry = new UserRegistry();
        $registry->set('employee', $user1);
        $registry->set('director', $user2);
        
        $this->assertSame($user1, $registry->get('employee'));
        $this->assertSame($user2, $registry->get('director'));
        $this->assertNotSame($user1, $registry->get('director'));
    }

}
