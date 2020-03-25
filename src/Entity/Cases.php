<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CasesRepository")
 */
class Cases
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Regex("#^\d+$#")
     */
    private ?string $confirmed = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Regex("#^\d+$#")
     */
    private ?string $recovered = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Regex("#^\d+$#")
     */
    private ?string $deaths = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $updatedAt = null;

    /**
     * @return int|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getConfirmed(): ?string
    {
        return $this->confirmed;
    }

    /**
     * @param string $confirmed
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setConfirmed(string $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getRecovered(): ?string
    {
        return $this->recovered;
    }

    /**
     * @param string $recovered
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setRecovered(string $recovered): self
    {
        $this->recovered = $recovered;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getDeaths(): ?string
    {
        return $this->deaths;
    }

    /**
     * @param string $deaths
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setDeaths(string $deaths): self
    {
        $this->deaths = $deaths;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface $updatedAt
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
