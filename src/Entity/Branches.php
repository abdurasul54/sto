<?php

namespace App\Entity;

use App\Repository\BranchesRepository;
use Doctrine\DBAL\Types\Types;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File;
use Symfony\Component\HttpFoundation\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BranchesRepository::class)]
class Branches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

  

    #[ORM\Column(length: 255)]
    private ?string $img = null;

   
    /**
     *@vich\UploadableField(mapping="blog", fileNameProperty="img") 
    */
    private $imgFile;
   

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 15)]
    private ?string $phone_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\Column]
    private ?float $longitude = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

  

  


     /**
     * @return string |null
     */
    public function getImg(): ?string
    {
        return $this->img;
    }
    /**
     * @param string|null $img
     * @return $this
     */
    

     public function setImg(string $img): self
    {
        $this->img = $img;  
    
        return $this;
    }
    /**
     * @return File|null
     */
    public function getImgFile(): ?getImgFile
    {
        return $this->ImgFile;
    }
 
    /**
     *@param File|null $imgFile
     */
    public function setImgFile(?File $imgFile= null)
    {
        $this->ImgFile= $imgFile;
    }     


   
    public function __toString(): string 
    {
        return $this->getTitle(); 
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }



    
}
