<?php
namespace RaccoonDepot\RdContactPlugin\Controller;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class EmailController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    
    /**
     * action callmeform
     *
     * @return void
     */
    public function callmeformAction()
    {
        $ajaxUrl = $this->uriBuilder->setTargetPageType('453299')->uriFor('callmeform', array(), NULL, NULL, NULL);
        $this->view->assign('ajaxUrl', $ajaxUrl );
    }

}
