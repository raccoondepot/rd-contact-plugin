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
     * Returns the httpReferer
     * 
     * @return string $httpReferer
     */
    public function getHttpReferer()
    {
        return $this->httpReferer;
    }

    /**
     * Sets the httpReferer
     * 
     * @param string $httpReferer
     * @return void
     */
    public function setHttpReferer($httpReferer)
    {
        $this->httpReferer = $httpReferer;
    }

    /**
     * Returns the pagesRespect
     * 
     * @return string $pagesRespect
     */
    public function getPagesRespect()
    {
        return $this->pagesRespect;
    }

    /**
     * Sets the pagesRespect
     * 
     * @param string $pagesRespect
     * @return void
     */
    public function setPagesRespect($pagesRespect)
    {
        $this->pagesRespect = $pagesRespect;
    }

    /**
     * Returns the link
     * 
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     * 
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Returns the customLink
     * 
     * @return string $customLink
     */
    public function getCustomLink()
    {
        return $this->customLink;
    }

    /**
     * Sets the customLink
     * 
     * @param string $customLink
     * @return void
     */
    public function setCustomLink($customLink)
    {
        $this->customLink = $customLink;
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

    /**
     * Returns the embed
     * 
     * @return string $embed
     */
    public function getEmbed()
    {
        return $this->embed;
    }

    /**
     * Sets the embed
     * 
     * @param string $embed
     * @return void
     */
    public function setEmbed($embed)
    {
        $this->embed = $embed;
    }
}
