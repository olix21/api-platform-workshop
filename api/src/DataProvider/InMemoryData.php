<?php


namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Entity\NewsArticle;

class InMemoryData implements ItemDataProviderInterface, RestrictedDataProviderInterface, CollectionDataProviderInterface
{
    private $articles;

    public function __construct()
    {
        return;
        $a1 = new NewsArticle();
        $a1->id = 1;
        $a1->title = 'First news!';
        $a1->body = 'My content';
        $a1->publicationDate = new \DateTimeImmutable('2017-01-21');

        $a2 = new NewsArticle();
        $a2->id = 2;
        $a2->title = 'Second news!';
        $a2->body = 'My content 2';
        $a2->publicationDate = new \DateTimeImmutable('2017-06-12');

        $this->articles = [
            1 => $a1,
            2 => $a2
        ];
    }

    /**
     * Retrieves an item.
     *
     * @param array|int|string $id
     *
     * @throws ResourceClassNotSupportedException
     *
     * @return object|null
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        return $this->articles[$id] ?? null;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return false;
        return $resourceClass === NewsArticle::class;
    }

    /**
     * Retrieves a collection.
     *
     * @throws ResourceClassNotSupportedException
     *
     * @return array|\Traversable
     */
    public function getCollection(string $resourceClass, string $operationName = null)
    {
        return $this->articles;
    }
}