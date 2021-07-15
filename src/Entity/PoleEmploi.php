<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get"
 *     }
 * )
 */
class PoleEmploi
{
    private $code;

    private $libelle;

    private $libelleCourt;

    private $particulier;

    public function __construct(
        string $code,
        string $libelle,
        string $libelleCourt,
        bool $particulier
    ) {
        $this->code = $code;
        $this->libelle = $libelle;
        $this->libelleCourt = $libelleCourt;
        $this->particulier = $particulier;
    }

    /**
     * @ApiProperty(
     *     identifier=true
     * )
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @return mixed
     */
    public function getLibelleCourt()
    {
        return $this->libelleCourt;
    }

    /**
     * @return boolean
     */
    public function getParticulier(): bool
    {
        return $this->particulier;
    }

}
