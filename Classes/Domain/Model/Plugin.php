<?php
namespace RaccoonDepot\RdContactPlugin\Domain\Model;

/**
 * Plugin
 */
class Plugin extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * @return \RaccoonDepot\RdContactPlugin\Domain\Model\Plugin
     */
    public function __construct()
    {
        $this->options = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get options
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set options list
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $options options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * Adds a option to the record
     *
     * @param \RaccoonDepot\RdContactPlugin\Domain\Model\Option $option
     */
    public function addOption(\RaccoonDepot\RdContactPlugin\Domain\Model\Option $option)
    {
        if ($this->getOptions() === null) {
            $this->options = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        }
        $this->options->attach($option);
    }
}
