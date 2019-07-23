<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Restriction
 */
class Restriction extends AbstractEntity
{
    /**
     * restriction_type
     *
     * @var string
     */
    protected $restrictionType = '';

    /**
     * http_referer
     *
     * @var string
     */
    protected $httpReferer = '';

    /**
     * pages_respect
     *
     * @var string
     */
    protected $pagesRespect = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RaccoonDepot\RdContactPlugin\Domain\Model\AlternativeOption>
     * @lazy
     */
    protected $alternativeOptions;

    /**
     * Initialize relation
     *
     * @return Restriction
     */
    public function __construct()
    {
        $this->alternativeOptions = new ObjectStorage();
    }

    /**
     * Returns the restrictionType
     *
     * @return string $restrictionType
     */
    public function getRestrictionType(): string
    {
        return $this->restrictionType;
    }

    /**
     * Sets the restrictionType
     *
     * @param string $restrictionType
     *
     * @return void
     */
    public function setRestrictionType($restrictionType): void
    {
        $this->restrictionType = $restrictionType;
    }

    /**
     * Returns the httpReferer
     *
     * @return string $httpReferer
     */
    public function getHttpReferer(): string
    {
        return $this->httpReferer;
    }

    /**
     * Sets the httpReferer
     *
     * @param string $httpReferer
     *
     * @return void
     */
    public function setHttpReferer($httpReferer): void
    {
        $this->httpReferer = $httpReferer;
    }

    /**
     * Returns the pagesRespect
     *
     * @return string $pagesRespect
     */
    public function getPagesRespect(): string
    {
        return $this->pagesRespect;
    }

    /**
     * Sets the pagesRespect
     *
     * @param string $pagesRespect
     *
     * @return void
     */
    public function setPagesRespect($pagesRespect): void
    {
        $this->pagesRespect = $pagesRespect;
    }

    /**
     * Get alternative options
     *
     * @return ObjectStorage
     */
    public function getAlternativeOptions(): ObjectStorage
    {
        return $this->alternativeOptions;
    }

    /**
     * Set alternative options list
     *
     * @param ObjectStorage $alternativeOptions Alternative Options
     */
    public function setAlternativeOptions($alternativeOptions): void
    {
        $this->alternativeOptions = $alternativeOptions;
    }

    /**
     * Adds a alternative option to the record
     *
     * @param AlternativeOption $alternativeOption
     */
    public function addAlternativeOption(AlternativeOption $alternativeOption): void
    {
        if ($this->getAlternativeOptions() === null) {
            $this->alternativeOptions = new ObjectStorage();
        }
        $this->alternativeOptions->attach($alternativeOption);
    }
}
