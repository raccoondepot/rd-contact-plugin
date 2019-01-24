<?php
namespace RaccoonDepot\RdContactPlugin\Controller;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Form\Domain\Finishers\AbstractFinisher;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Extbase\Mvc\Web\Request;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;

class EmailController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    
    /**
     * action callmeformHandler
     *
     * @return void
     */
    public function callmeformHandlerAction()
    {

        // typo3 bugfixing.. :(
        if ( $_GET['tx_rd_contact_plugin_emailactions']['action'] != 'callmeformHandler' ) {
            $func = $_GET['tx_rd_contact_plugin_emailactions']['action'].'Action';
            $this->$func();
        }
        else {

            /// callmeformHandler

            // get args
            $name = $_POST['tx_rd_contact_plugin_emailactions']['name'];
            $currentURL = $_POST['tx_rd_contact_plugin_emailactions']['currentURL'];
            $phone = $_POST['tx_rd_contact_plugin_emailactions']['phone'];
            $email = $_POST['tx_rd_contact_plugin_emailactions']['email'];
            $date = $_POST['tx_rd_contact_plugin_emailactions']['date'];
            
            // send email
            if ( !empty($name) && !empty($phone) ) {

                $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
                $configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
                $configuration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
                $configurationManager->setConfiguration($configuration);
                $settings = $configuration['page.']['footerData.']['103.']['settings.']['rd_contact_plugin.'];

                if ( !empty( $settings['callMeForm_email_body_tmpl_path'] ) && 
                        !empty( $settings['callMeForm_email_recieverEmail'] ) && 
                            !empty( $settings['callMeForm_email_subject'] ) ) {

                    // run email
                    $emailTemplatePath = $settings['callMeForm_email_body_tmpl_path'];
                    $emailTemplatePath = PATH_site."typo3conf/ext/" . $emailTemplatePath;

                    $mailView = $objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
                    $mailView->setTemplatePathAndFilename($emailTemplatePath);
                    $mailView->assign('name', $name);
                    $mailView->assign('currentURL', $currentURL);
                    $mailView->assign('phone', $phone);
                    $mailView->assign('email', $email);
                    $mailView->assign('date', $date);
                    $mailView->assign('settings', $settings);
                    $message = $mailView->render();
                    $mail = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');

                    $mail->setFrom([$settings['emailSenderMail'] => $settings['emailSenderName']]);

                    if ( !empty($email) ) {
                        $mail->setReplyTo([$email => $name]);
                    }


                    $mail->setTo([$settings['callMeForm_email_recieverEmail'] => ''.$settings['callMeForm_email_recieverName']])
                         ->setSubject( $settings['callMeForm_email_subject'] )
                         ->setBody($message, 'text/html')
                         ->send();

                    // success
                    // ...
                }
                else {
                    $this->view->assign('error', 'Check callMeForm_email_* settings in TS' );
                }
            }
            else {
                $this->view->assign('error', 'Check form input data' );
            }
            // end

        }
        
    }


    /**
     * action answermebyemailformHandler
     *
     * @return void
     */
    public function answermebyemailformHandlerAction()
    {
        // get args
        $name = $_POST['tx_rd_contact_plugin_emailactions']['name'];
        $currentURL = $_POST['tx_rd_contact_plugin_emailactions']['currentURL'];
        $email = $_POST['tx_rd_contact_plugin_emailactions']['email'];
        $question = $_POST['tx_rd_contact_plugin_emailactions']['question'];
        
        // send email
        if ( !empty($name) && !empty($email) && !empty($question) ) {

            $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
            $configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
            $configuration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
            $configurationManager->setConfiguration($configuration);
            $settings = $configuration['page.']['footerData.']['103.']['settings.']['rd_contact_plugin.'];

            if ( !empty( $settings['answerMeByEmailForm_email_body_tmpl_path'] ) && 
                    !empty( $settings['answerMeByEmailForm_email_recieverEmail'] ) && 
                        !empty( $settings['answerMeByEmailForm_email_subject'] ) ) {

                // run email
                $emailTemplatePath = $settings['answerMeByEmailForm_email_body_tmpl_path'];
                $emailTemplatePath = PATH_site."typo3conf/ext/" . $emailTemplatePath;

                $mailView = $objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
                $mailView->setTemplatePathAndFilename($emailTemplatePath);
                $mailView->assign('name', $name);
                $mailView->assign('currentURL', $currentURL);
                $mailView->assign('question', $question);
                $mailView->assign('email', $email);
                $mailView->assign('settings', $settings);
                $message = $mailView->render();
                $mail = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');

                $mail->setFrom([$email => $name])
                    ->setTo([$settings['answerMeByEmailForm_email_recieverEmail'] => ''.$settings['answerMeByEmailForm_email_recieverName']])
                    ->setSubject( $settings['answerMeByEmailForm_email_subject'] )
                    ->setBody($message, 'text/html')
                    ->send();

                // success
                // ...
            }
            else {
                $this->view->assign('error', 'Check answerMeByEmailForm_email_* settings in TS' );
            }
        }
        else {
            $this->view->assign('error', 'Check form input data' );
        }
        // end
        
    }

    /**
     * action getAppointmentformHandler
     *
     * @return void
     */
    public function getAppointmentformHandlerAction()
    {
        // get args
        $name = $_POST['tx_rd_contact_plugin_emailactions']['name'];
        $currentURL = $_POST['tx_rd_contact_plugin_emailactions']['currentURL'];
        $phone = $_POST['tx_rd_contact_plugin_emailactions']['phone'];
        $email = $_POST['tx_rd_contact_plugin_emailactions']['email'];
        $date = $_POST['tx_rd_contact_plugin_emailactions']['date'];
        
        // send email
        if ( !empty($name) && !empty($phone) && !empty($date) ) {

            $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
            $configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
            $configuration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
            $configurationManager->setConfiguration($configuration);
            $settings = $configuration['page.']['footerData.']['103.']['settings.']['rd_contact_plugin.'];

            if ( !empty( $settings['getAppointmentForm_email_body_tmpl_path'] ) && 
                    !empty( $settings['getAppointmentForm_email_recieverEmail'] ) && 
                        !empty( $settings['getAppointmentForm_email_subject'] ) ) {

                // run email
                $emailTemplatePath = $settings['getAppointmentForm_email_body_tmpl_path'];
                $emailTemplatePath = PATH_site."typo3conf/ext/" . $emailTemplatePath;

                $mailView = $objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
                $mailView->setTemplatePathAndFilename($emailTemplatePath);
                $mailView->assign('name', $name);
                $mailView->assign('currentURL', $currentURL);
                $mailView->assign('phone', $phone);
                $mailView->assign('email', $email);
                $mailView->assign('date', $date);
                $mailView->assign('settings', $settings);
                $message = $mailView->render();
                $mail = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');

                if ( !empty($email) ) {
                    $mail->setFrom([$email => $name]);
                }
                else {
                    $mail->setFrom([$settings['getAppointmentForm_email_recieverEmail'] => $name]);
                }

                $mail->setTo([$settings['getAppointmentForm_email_recieverEmail'] => ''.$settings['getAppointmentForm_email_recieverName']])
                        ->setSubject( $settings['getAppointmentForm_email_subject'] )
                        ->setBody($message, 'text/html')
                        ->send();

                // success
                // ...
            }
            else {
                $this->view->assign('error', 'Check getAppointmentForm_email_* settings in TS' );
            }
        }
            
        // end
    }
}
