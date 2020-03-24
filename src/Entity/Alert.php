<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(collectionOperations={"get", "post"})
 * @ORM\Entity(repositoryClass="App\Repository\AlertRepository")
 */
class Alert
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
     * @Assert\Length(min="10", max="13")
     */
    private ?string $number = null;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private ?string $symptoms = null;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $infos = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $created_at = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex("#^((\-?|\+?)?\d+(\.\d+)?)$#")
     */
    private ?string $lat = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex("#^((\-?|\+?)?\d+(\.\d+)?)$#")
     */
    private ?string $lng = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Choice({"Suspect", "Confirmé", "Mort", "Rétabli"})
     */
    private ?string $status = null;


    /**
     * Alert constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->created_at = new \DateTime('now');
        $this->status = "Suspect";
    }

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
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getSymptoms(): ?string
    {
        return $this->symptoms;
    }

    /**
     * @param string $symptoms
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setSymptoms(string $symptoms): self
    {
        $this->symptoms = $symptoms;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getInfos(): ?string
    {
        return $this->infos;
    }

    /**
     * @param string|null $infos
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setInfos(?string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * @param DateTimeInterface $created_at
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setCreatedAt(DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getLat(): ?string
    {
        return $this->lat;
    }

    /**
     * @param string|null $lat
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setLat(?string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getLng(): ?string
    {
        return $this->lng;
    }

    /**
     * @param string|null $lng
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setLng(?string $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
