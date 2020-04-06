<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={"get"}
 * )
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
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private ?int $age = null;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Choice({"M", "F"})
     */
    private ?string $sex;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotNull()
     */
    private ?string $wellKnownCenter = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotNull()
     */
    private ?string $infectedRelatives = null;

    /**
     * @todo make choice dynamic with custom constraint
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Choice({1, 2, 3, 4, 5})
     */
    private ?int $gesturesBarriersLevel = null;

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

    /**
     * @return int|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int|null $age
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }

    /**
     * @param string|null $sex
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @return bool|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getWellKnownCenter(): ?bool
    {
        return $this->wellKnownCenter;
    }

    /**
     * @param bool|null $wellKnownCenter
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setWellKnownCenter(?bool $wellKnownCenter): self
    {
        $this->wellKnownCenter = $wellKnownCenter;

        return $this;
    }

    /**
     * @return bool|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getInfectedRelatives(): ?bool
    {
        return $this->infectedRelatives;
    }

    /**
     * @param bool|null $infectedRelatives
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setInfectedRelatives(?bool $infectedRelatives): self
    {
        $this->infectedRelatives = $infectedRelatives;

        return $this;
    }

    /**
     * @return int|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function getGesturesBarriersLevel(): ?int
    {
        return $this->gesturesBarriersLevel;
    }

    /**
     * @param int|null $gesturesBarriersLevel
     * @return $this
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function setGesturesBarriersLevel(?int $gesturesBarriersLevel): self
    {
        $this->gesturesBarriersLevel = $gesturesBarriersLevel;

        return $this;
    }
}
