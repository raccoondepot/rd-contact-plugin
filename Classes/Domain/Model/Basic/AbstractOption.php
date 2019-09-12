<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\Domain\Model\Basic;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use RaccoonDepot\RdContactPlugin\Domain\Model\TtContent;

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
     * custom_class
     *
     * @var string
     */
    protected $customClass = '';

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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RaccoonDepot\RdContactPlugin\Domain\Model\TtContent>
     * @lazy
     */
    protected $contentElements;

    /**
     * @var string
     */
    protected $contentElementIdList = '';

    /**
     * @var string
     */
    protected $l10nState = '';

    /**
     * @var int
     */
    protected $sysLanguageUid;

    /**
     * Initialize relation
     *
     * @return \RaccoonDepot\RdContactPlugin\Domain\Model\Basic\AbstractOption
     */
    public function __construct()
    {
        $this->contentElements = new ObjectStorage();
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
     * Returns the customClass
     *
     * @return string $customClass
     */
    public function getCustomClass(): string
    {
        return $this->customClass;
    }

    /**
     * Sets the customClass
     *
     * @param string $customClass
     *
     * @return void
     */
    public function setCustomClass($customClass): void
    {
        $this->customClass = $customClass;
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

    /**
     * Get content elements
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getContentElements(): ObjectStorage
    {
        return $this->contentElements;
    }

    /**
     * Set content element list
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $contentElements content elements
     */
    public function setContentElements($contentElements): void
    {
        $this->contentElements = $contentElements;
    }

    /**
     * Adds a content element to the record
     *
     * @param TtContent $contentElement
     */
    public function addContentElement(TtContent $contentElement): void
    {
        if ($this->getContentElements() === null) {
            $this->contentElements = new ObjectStorage();
        }
        $this->contentElements->attach($contentElement);
    }

    /**
     * Get id list of content elements
     *
     * @return string
     */
    public function getContentElementIdList(): string
    {
        if (! empty($this->contentElementIdList)) {
            return $this->contentElementIdList;
        }
        return $this->getIdOfContentElements();
    }

    /**
     * @param string $contentElementIdList
     */
    public function setContentElementIdList(string $contentElementIdList): void
    {
        $this->contentElementIdList = $contentElementIdList;
    }

    /**
     * Get translated id list of content elements
     *
     * @return string
     */
    public function getTranslatedContentElementIdList(): string
    {
        return $this->getIdOfContentElements(false);
    }

    /**
     * Collect id list
     *
     * @param bool $original
     *
     * @return string
     */
    protected function getIdOfContentElements($original = true): string
    {
        $idList = [];
        $contentElements = $this->getContentElements();
        if ($contentElements) {
            foreach ($contentElements as $contentElement) {
                $idList[] = $original ? $contentElement->getUid() : $contentElement->_getProperty('_localizedUid');
            }
        }
        return implode(',', $idList);
    }

    /**
     * @return string
     */
    public function getL10nState(): string
    {
        return $this->l10nState;
    }

    /**
     * @param string $l10nState
     */
    public function setL10nState(string $l10nState): void
    {
        $this->l10nState = $l10nState;
    }

    /**
     * Set sys language
     *
     * @param int $sysLanguageUid
     */
    public function setSysLanguageUid($sysLanguageUid): void
    {
        $this->_languageUid = $sysLanguageUid;
    }

    /**
     * Get sys language
     *
     * @return int
     */
    public function getSysLanguageUid(): int
    {
        return $this->_languageUid;
    }
}
