<?php

declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\Pagination;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\DataProvider\Paginator\PoleEmploiPaginator;
use App\Entity\PoleEmploi;
use App\Repository\PoleEmploi\PoleEmploiDataInterface;

final class PoleEmploiCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $repository;
    private $pagination;

    public function __construct(
        PoleEmploiDataInterface $repository,
        Pagination $pagination
    ) {
        $this->repository = $repository;
        $this->pagination = $pagination;
    }

    /**
     * @param array<string, mixed> $context
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return PoleEmploi::class === $resourceClass;
    }

    /**
     * @param array<string, mixed> $context
     *
     * @throws \RuntimeException
     *
     * @return iterable<PoleEmploi>
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        $q = isset($context["filters"]["q"]) ? $context["filters"]["q"] : '';

        [$page, $offset, $itemPerPage] = $this->pagination->getPagination($resourceClass, $operationName, $context);

        try {
            $data = $this->repository->getJobs($q);

            $paginator = new PoleEmploiPaginator(
                $page,
                $itemPerPage,
                $data
            );

            return $paginator;


        } catch (\Exception $e) {
            throw new \RuntimeException(sprintf('Unable to retrieve jobs from external source: %s', $e->getMessage()));
        }
    }
}
