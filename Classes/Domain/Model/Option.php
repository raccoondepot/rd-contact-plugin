<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\Domain\Model;

use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Option
 */
class Option extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * pages_mode
     *
     * @var string
     */
    protected $pagesMode = '';

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
     * Returns the pagesMode
     *
     * @return string $pagesMode
     */
    public function getPagesMode(): string
    {
        return $this->pagesMode;
    }

    /**
     * Sets the pagesMode
     *
     * @param string $pagesMode
     *
     * @return void
     */
    public function setPagesMode($pagesMode): void
    {
        $this->pagesMode = $pagesMode;
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
