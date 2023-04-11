<?php

namespace App\Entity;

use App\Repository\UserRegistrationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRegistrationRepository::class)]
class UserRegistration
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id;

  #[ORM\Column(length: 255)]
  private ?string $first_name = null;

  #[ORM\Column(length: 255)]
  private ?string $last_name = null;

  #[ORM\Column(length: 255)]
  private ?string $gender = null;

  #[ORM\Column(length: 255)]
  private ?string $email = null;

  #[ORM\Column(length: 255)]
  private ?string $profile_photo = null;

  #[ORM\Column(length: 255)]
  private ?string $bio = null;

  #[ORM\Column(length: 255)]
  private ?string $password = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getFirstName(): ?string
  {
    return $this->first_name;
  }

  public function setFirstName(string $first_name): self
  {
    $this->first_name = $first_name;

    return $this;
  }

  public function getLastName(): ?string
  {
    return $this->last_name;
  }

  public function setLastName(string $last_name): self
  {
    $this->last_name = $last_name;

    return $this;
  }

  public function getGender(): ?string
  {
    return $this->gender;
  }

  public function setGender(string $gender): self
  {
    $this->gender = $gender;

    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  public function getProfilePhoto(): ?string
  {
    return $this->profile_photo;
  }

  public function setProfilePhoto(string $profile_photo): self
  {
    $this->profile_photo = $profile_photo;

    return $this;
  }

  public function getBio(): ?string
  {
    return $this->bio;
  }

  public function setBio(string $bio): self
  {
    $this->bio = $bio;

    return $this;
  }

  public function getPassword(): ?string
  {
    return $this->password;
  }

  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }
}
