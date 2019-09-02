<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Plugin
 */
class Plugin extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RaccoonDepot\RdContactPlugin\Domain\Model\Option>
     * @lazy
     */
    protected $options;

    /**
     * Initialize relation
     *
     * @return Plugin
     */
    public function __construct()
    {
        $this->options = new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * Get options
     *
     * @return ObjectStorage
     */
    public function getOptions(): ObjectStorage
    {
        return $this->options;
    }

    /**
     * Set options list
     *
     * @param ObjectStorage $options options
     */
    public function setOptions($options): void
    {
        $this->options = $options;
    }

    /**
     * Adds a option to the record
     *
     * @param Option $option
     */
    public function addOption(Option $option): void
    {
        if ($this->getOptions() === null) {
            $this->options = new ObjectStorage();
        }
        $this->options->attach($option);
    }
}
