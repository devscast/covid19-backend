<?php

namespace App\Tests\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserTest
 * @package App\Tests\Entity
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class UserTest extends KernelTestCase
{
    use EntityTestCaseTrait;

    private ?UserPasswordEncoder $encoder;

    public function setUp(): void
    {
        self::bootKernel();
        $this->encoder = self::$container->get(UserPasswordEncoderInterface::class);
        parent::setUp();
    }

    public function getEntity(): User
    {
        $user = new User();
        $user
            ->setEmail('test@test.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->encoder->encodePassword($user, 'test'));
        return $user;
    }

    public function testPasswordEncodedEntity()
    {
        $password = 'pA$$w07)';
        $user = $this->getEntity();
        $user->setPassword($this->encoder->encodePassword($user, $password));
        $this->assertNotEquals($user->getPassword(), $password);
    }

    public function testInvalidEmailEntity()
    {
        $this->assertHasError($this->getEntity()->setEmail(''), 1);
        $this->assertHasError($this->getEntity()->setEmail('invalid'), 1);
    }

    public function testValidEmailEntity()
    {
        $this->assertHasError($this->getEntity()->setEmail('valid@test.com'), 0);
    }

    public function testEmailEqualsUsernameEntity()
    {
        $this->assertEquals(
            $this->getEntity()->getEmail(),
            $this->getEntity()->getUsername()
        );
    }

    public function testHasDefaultUserRoleEntity()
    {
        $user = $this->getEntity()->setRoles([]);
        $this->assertIsArray($user->getRoles());
        $this->assertContains('ROLE_USER', $user->getRoles());
    }
}
