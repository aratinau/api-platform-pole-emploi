<?php

declare(strict_types=1);

namespace App\Repository\PoleEmploi;

use App\Entity\PoleEmploi;

interface PoleEmploiDataInterface
{
    /**
     * @return array<int, PoleEmploi>
     */
    public function getJobs(): array;
}
