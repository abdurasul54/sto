<?php    

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $username;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $test = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $a = null;

    // Метод для получения идентификатора пользователя (вместо getUsername в новых версиях Symfony)
    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    // Метод для получения ролей пользователя (добавляет роль 'ROLE_USER' по умолчанию)
    public function getRoles(): array
    {
        $roles = $this->roles;
     
        // Добавляем роль пользователя, если она не указана
        $roles[] = 'ROLE_USER';

        return array_unique($roles);  // Убедитесь, что роли уникальны
    }

    // Возвращает хешированный пароль
    public function getPassword(): string
    {
        return $this->password;
    }

    // Этот метод вызывается для удаления временных данных, если они есть
    public function eraseCredentials()
    {
        // Здесь обычно очищаются временные или чувствительные данные (например, временный пароль)
    }

    public function getTest(): ?string
    {
        return $this->test;
    }

    public function setTest(?string $test): static
    {
        $this->test = $test;

        return $this;
    }

    public function getA(): ?string
    {
        return $this->a;
    }

    public function setA(?string $a): static
    {
        $this->a = $a;

        return $this;
    }
}
