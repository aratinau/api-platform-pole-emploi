<?php

declare(strict_types=1);

namespace App\Repository\PoleEmploi;

use App\Entity\PoleEmploi;
use App\Service\PoleEmploiService;

final class PoleEmploiRepository implements PoleEmploiDataInterface
{
    private $poleEmploiService;

    public function __construct(PoleEmploiService $poleEmploiService)
    {
        $this->poleEmploiService = $poleEmploiService;
    }

    /**
     * @return array<int, PoleEmploi>
     */
    public function getJobs($query = ''): array
    {
        $a = $this->poleEmploiService->get($query);

        return json_decode($a);
    }
}
