<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\Domain\Model\Basic;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * AbstractOption
 */
class AbstractOption extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * link
     *
     * @var string
     */
    protected $link = '';

    /**
     * customLink
     *
     * @var string
     */
    protected $customLink = '';

    /**
     * embed
     *
     * @var string
     */
    protected $embed = '';

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
     * Returns the link
     *
     * @return string $link
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     *
     * @return void
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }

    /**
     * Returns the customLink
     *
     * @return string $customLink
     */
    public function getCustomLink(): string
    {
        return $this->customLink;
    }

    /**
     * Sets the customLink
     *
     * @param string $customLink
     *
     * @return void
     */
    public function setCustomLink($customLink): void
    {
        $this->customLink = $customLink;
    }

    /**
     * Returns the optionType
     *
     * @return string $optionType
     */
    public function getOptionType(): string
    {
        return $this->optionType;
    }

    /**
     * Sets the optionType
     *
     * @param string $optionType
     *
     * @return void
     */
    public function setOptionType($optionType): void
    {
        $this->optionType = $optionType;
    }

    /**
     * Returns the iconLibrary
     *
     * @return string $iconLibrary
     */
    public function getIconLibrary(): string
    {
        return $this->iconLibrary;
    }

    /**
     * Sets the iconLibrary
     *
     * @param string $iconLibrary
     *
     * @return void
     */
    public function setIconLibrary($iconLibrary): void
    {
        $this->iconLibrary = $iconLibrary;
    }

    /**
     * Returns the embed
     *
     * @return string $embed
     */
    public function getEmbed(): string
    {
        return $this->embed;
    }

    /**
     * Sets the embed
     *
     * @param string $embed
     *
     * @return void
     */
    public function setEmbed($embed): void
    {
        $this->embed = $embed;
    }
}
