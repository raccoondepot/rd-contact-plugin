<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\Domain\Model;

use RaccoonDepot\RdContactPlugin\Domain\Model\Basic\AbstractOption;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Option
 */
class Option extends AbstractOption
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RaccoonDepot\RdContactPlugin\Domain\Model\Restriction>
     * @lazy
     */
    protected $restrictions;

    /**
     * Initialize relation
     *
     * @return Option
     */
    public function __construct()
    {
        $this->restrictions = new ObjectStorage();
    }

    /**
     * Get restrictions
     *
     * @return ObjectStorage
     */
    public function getRestrictions(): ObjectStorage
    {
        return $this->restrictions;
    }

    /**
     * Set restrictions list
     *
     * @param ObjectStorage $restrictions restrictions
     */
    public function setRestrictions($restrictions): void
    {
        $this->restrictions = $restrictions;
    }

    /**
     * Adds a restriction to the record
     *
     * @param Restriction $restriction
     */
    public function addRestriction(Restriction $restriction): void
    {
        if ($this->getRestrictions() === null) {
            $this->restrictions = new ObjectStorage();
        }
        $this->restrictions->attach($restriction);
    }
}
