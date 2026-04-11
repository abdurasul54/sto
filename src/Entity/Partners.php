<?php

namespace App\Entity;

use App\Repository\PartnersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnersRepository::class)]
class Partners
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    public function getId(): ?int
    {
        return $this->id;
    }


     /**
     *@vich\UploadableField(mapping="blog", fileNameProperty="img") 
    */

    private $imgFile; 

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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
}
