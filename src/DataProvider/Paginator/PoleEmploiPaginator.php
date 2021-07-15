<?php

namespace App\DataProvider\Paginator;

use ApiPlatform\Core\DataProvider\PaginatorInterface;
use App\Entity\PoleEmploi;

/**
 * Class PoleEmploiPaginator
 * @package App\DataProvider\Paginator
 */
class PoleEmploiPaginator implements PaginatorInterface, \IteratorAggregate
{
    private $jobsIterator;
    private $currentPage;
    private $maxResults;
    private $data;

    public function __construct(int $currentPage, int $maxResults, $data)
    {
        $this->currentPage = $currentPage;
        $this->maxResults = $maxResults;
        $this->data = $data;
    }

    public function getLastPage(): float
    {
        return ceil($this->getTotalItems() / $this->getItemsPerPage()) ?: 1.;
    }

    public function getTotalItems(): float
    {
        return count($this->data);
    }

    public function getCurrentPage(): float
    {
        return $this->currentPage;
    }

    public function getItemsPerPage(): float
    {
        return $this->maxResults;
    }

    public function count()
    {
        return iterator_count($this->getIterator());
    }

    public function getIterator()
    {
        if ($this->jobsIterator === null) {
            $offset = (($this->getCurrentPage() - 1) * $this->getItemsPerPage());

            $slicePerPage = array_slice(
                $this->data,
                $offset,
                $this->getItemsPerPage()
            );

            $resulst = [];
            foreach ($slicePerPage as $item) {

                $job = new PoleEmploi(
                    $item->code,
                    $item->libelle,
                    $item->libelleCourt,
                    $item->particulier
                );

                $resulst[] = $job;
            }

            $this->jobsIterator = new \ArrayIterator(
                $resulst
            );
        }

        return $this->jobsIterator;
    }
}
