<?php

namespace App\Tests\Entity;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class ArticleTest
 * @package App\Tests\Entity
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class ArticleTest extends KernelTestCase
{

    use EntityTestCaseTrait;

    public function getEntity(): Article
    {
        return (new Article())
            ->setName('Article de test')
            ->setLink('https://link.com/article')
            ->setImage('https://link.com/image.jpg')
            ->setType('post')
            ->setPublishedAt(new \DateTime('now'));
    }

    public function testValidEntity()
    {
        $this->assertHasError($this->getEntity(), 0);
    }

    public function testInvalidNameEntity()
    {
        $this->assertHasError($this->getEntity()->setName(''), 2);
        $this->assertHasError($this->getEntity()->setName('os'), 1);
    }

    public function testInvalidLinkEntity()
    {
        $this->assertHasError($this->getEntity()->setLink(''), 1);
        $this->assertHasError($this->getEntity()->setLink('lien'), 1);
    }

    public function testOptionalImageEntity()
    {
        $this->assertHasError($this->getEntity()->setImage(''), 0);
        $this->assertHasError($this->getEntity()->setImage('https://link.com/image.jpg'), 0);
    }

    public function testInvalidImageEntity()
    {
        $this->assertHasError($this->getEntity()->setImage('lien'), 1);
    }

    public function testValidTypeEntity()
    {
        $this->assertHasError($this->getEntity()->setType('post'), 0);
        $this->assertHasError($this->getEntity()->setType('video'), 0);
    }

    public function testInvalidTypeEntity()
    {
        $this->assertHasError($this->getEntity()->setType('posts'), 1);
    }
}
