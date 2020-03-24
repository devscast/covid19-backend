<?php

namespace App\Tests\Entity;

use Symfony\Component\Validator\ConstraintViolation;

/**
 * Trait EntityTestCaseTrait
 * @package App\Tests\Entity
 * @author bernard-ng <ngandubernard@gmail.com>
 */
trait EntityTestCaseTrait
{
    /**
     * @param $entity
     * @param int $number
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function assertHasError($entity, int $number = 0): void
    {
        self::bootKernel();
        $errors = self::$container->get('validator')->validate($entity);
        $messages = [];

        /** @var ConstraintViolation $error */
        foreach ($errors as $error) {
            $messages[] = $error->getPropertyPath() . ' => ' . $error->getMessage();
        }

        $this->assertCount($number, $errors, implode(', ', $messages));
    }
}
