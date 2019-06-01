<?php
namespace RaccoonDepot\RdContactPlugin\Domain\Model;

/**
 * Option
 */
class Option extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     * 
     * @var string
     */
    protected $title = '';

    /**
     * option_type
     * 
     * @var string
     */
    protected $optionType = '';

    /**
     * icon_library
     * 
     * @var string
     */
    protected $iconLibrary = '';

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
     * Returns the optionType
     * 
     * @return string $optionType
     */
    public function getOptionType()
    {
        return $this->optionType;
    }

    /**
     * Sets the optionType
     * 
     * @param string $optionType
     * @return void
     */
    public function setOptionType($optionType)
    {
        $this->optionType = $optionType;
    }

    /**
     * Returns the iconLibrary
     * 
     * @return string $iconLibrary
     */
    public function getIconLibrary()
    {
        return $this->iconLibrary;
    }

    /**
     * Sets the iconLibrary
     * 
     * @param string $iconLibrary
     * @return void
     */
    public function setIconLibrary($iconLibrary)
    {
        $this->iconLibrary = $iconLibrary;
    }
}
