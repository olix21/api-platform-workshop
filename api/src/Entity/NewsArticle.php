<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A news displayed on our website
 *
 * @ApiResource(
 * )
 *
 * @ORM\Entity()
 */
class NewsArticle
{
    /**
     * @var int The public identifier of the news
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string The title of the article
     *
     * @ORM\Column
     * @Assert\NotBlank()
     * @Assert\Length(min="3")
     */
    public $title;

    /**
     * @var string The body of the news
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    public $body;

    /**
     * @var \DateTimeInterface The publication date
     *
     * @ORM\Column(type="datetime_immutable")
     * @Assert\NotBlank()
     */
    public $publicationDate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="newsArticle")
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setNewsArticle($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getNewsArticle() === $this) {
                $comment->setNewsArticle(null);
            }
        }

        return $this;
    }


}