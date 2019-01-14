## RD Contact form plugin ##
<b>RD Contact Plugin</b> is an extension developed by <a href="http://www.raccoondepot.com/">Raccoon Depot</a> team to be used in TYPO3 CMS 9+ or higher. This plugin includes simple contact button on each website page, and provides different ways for communication between website visitors and website owner. An extension is flexible, so you could configure it as you wish. All configurations and labels available via TypoScript constants. Also we developed custom TS condition which can be used to run different configurations depends on HTTP_REFERER header. How HTTP_REFERER could help you in business, you can read here: <a href="https://www.lifewire.com/how-to-use-http-referer-3471200#mntl-sc-block_1-0-33">https://www.lifewire.com/how-to-use-http-referer-3471200#mntl-sc-block_1-0-33</a>. To see all available options/configurations and how to start read further..

[Here will be some screenshots on FE & BE]

## Contact Options ##
Any contact option can be disabled and configured precisely
<ol>
    <li><b>Mobile-Phone-Number</b> - with this option you will get a direct call from website visitor on your mobile phone number when visitor clicks on it.</li>
    <li><b>Call-Me-form</b> - with this option you will get an e-mail letter with the request from website visitor that he would like to have a call with you at preferred-by-visitor date or as soon as possible</li>
    <li><b>Answer-Me-By-E-mail-form</b> - with this option you will get an e-mail letter with the request from website visitor that he would like to get some answer on his question from you</li>
    <li><b>Contact-using-Viber</b> - with this option website visitor will be redirected to the chat with you on Viber</li>
    <li><b>Contact-using-FB-Messenger</b> - with this option website visitor will be redirected to the chat with you on Facebook Messenger</li>
    <li><b>Get-Appointment-form</b> - with this option you will get an e-mail letter with the request from website visitor that he would like to have a meeting with you at preferred-by-visitor date</li>
</ol>

## How to install ##
1. add git@gitlab.com:raccoondepot/rd_contact_plugin.git to repositories in your composer.json file
2. add "raccoondepot/rd-contact-plugin": "dev-master" in require section in your composer.json file
3. composer update
4. make sure rd_contact_plugin enabled in Extension Manager
5. add TS static includes
6. to make [Call-Me-form], [Answer-Me-By-E-mail-form], [Get-Appointment-form] contact options visible on your website, set next constants in your TS: callMeForm_email_recieverEmail, answerMeByEmailForm_email_recieverEmail, getAppointmentForm_email_recieverEmail (you can find them further in the configuration section)

## How to configure ##
### Typoscript variables ###
Plugin can be configured by TypoScript constants. They can be found under <b>plugin.tx_rdcontactplugin.settings</b> Here is the list of all available options:

#### Main ####
<!-- Main -->
<table style="width: 100%;">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Description</th>
            <th>Default</th>
            <th>Possible values</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>enabled</td>
            <td>Is the whole plugin enabled?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>position</td>
            <td>How to place contact button on the page?</td>
            <td>bottom_right</td>
            <td>bottom_left / top_left / top_right / bottom_right</td>
        </tr>
    </tbody>
</table>

#### Mobile-Phone-Number ####
<!-- Mobile Phone -->
<table style="width: 100%;">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Description</th>
            <th>Default</th>
            <th>Possible values</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>useMobilePhone</td>
            <td>Is Mobile-Phone-Number option enabled?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>mobilePhone</td>
            <td>Your mobile phone number for getting calls from visitors (tel:38XXXXXXXXXX)</td>
            <td>38XXXXXXXXXX</td>
            <td>only digits</td>
        </tr>
        <tr>
            <td>mobilePhoneLabel</td>
            <td>Link label of Mobile-Phone-Number option</td>
            <td>+38 (XXX) XXX-XX-XX</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>mobilePhoneIcon</td>
            <td>Link icon of Mobile-Phone-Number option</td>
            <td>EXT:rd_contact_plugin/Resources/Public/icons/phone-receiver.svg</td>
            <td>any text (path to icon)</td>
        </tr>
    </tbody>
</table>

#### Call-Me-form ####
<!-- Call-Me form -->
<table style="width: 100%;">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Description</th>
            <th>Default</th>
            <th>Possible values</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>useCallMe</td>
            <td>Is Call-Me-form option enabled?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>callMeLabel</td>
            <td>Link label of Call-Me-form option</td>
            <td>Call me</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeFormIcon</td>
            <td>Link icon of Call-Me-form option</td>
            <td>EXT:rd_contact_plugin/Resources/Public/icons/earphones.svg</td>
            <td>any text (path to icon)</td>
        </tr>
        <tr>
            <td>callMeFormDescription</td>
            <td>Modal form description text of Call-Me-form option</td>
            <td>Enter your contact information</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_name_label</td>
            <td>Name field label in Modal form</td>
            <td>Enter your name*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_name_placeholder</td>
            <td>Name field placeholder in Modal form</td>
            <td>Name</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_phone_label</td>
            <td>Phone field label in Modal form</td>
            <td>Enter your phone number*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_phone_placeholder</td>
            <td>Phone field placeholder in Modal form</td>
            <td>+38 (___) ___-__-__</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_phone_mask_template</td>
            <td>Phone field input mask template in Modal form</td>
            <td>+{38 }(000) 000-00-00</td>
            <td>text (for right pattern check - https://unmanner.github.io/imaskjs/guide.html)</td>
        </tr>
        <tr>
            <td>useCallMeForm_field_email</td>
            <td>Enable E-mail field in Modal form?</td>
            <td>0</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>callMeForm_field_email_label</td>
            <td>E-mail field label in Modal form</td>
            <td>Enter your e-mail address*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_email_placeholder</td>
            <td>E-mail field placeholder in Modal form</td>
            <td>info@example.com</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_date_label</td>
            <td>Preferred Date field label in Modal form</td>
            <td>Specific date for a call?</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_date_pl</td>
            <td>Preferred Date field placeholder in Modal form</td>
            <td>Call me now! or (dd/mm/yyyy)</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_field_date_mask_template</td>
            <td>Preferred Date field input mask template in Modal form</td>
            <td>00{/}00{/}0000</td>
            <td>text (for right pattern check - https://unmanner.github.io/imaskjs/guide.html)</td>
        </tr>
        <tr>
            <td>callMeForm_field_submit</td>
            <td>Submit button label in Modal form</td>
            <td>Call me!</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_email_body_tmpl_path</td>
            <td>Template path of Admin E-mail letter of Modal form</td>
            <td>rd_contact_plugin/Resources/Private/Templates/EmailBodies/callMeForm.html</td>
            <td>text (path to fluid template)</td>
        </tr>
        <tr>
            <td>callMeForm_email_recieverEmail</td>
            <td>Admin E-mail address which will get Admin e-mail letter of Modal form (required)</td>
            <td>-</td>
            <td>any E-mail address</td>
        </tr>
        <tr>
            <td>callMeForm_email_recieverName</td>
            <td>Admin E-mail name which will get Admin e-mail letter of Modal form</td>
            <td>-</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>callMeForm_email_subject</td>
            <td>Admin Email letter Subject of Modal form</td>
            <td>You got new call-me request from your website!</td>
            <td>any text</td>
        </tr>
    </tbody>
</table>

#### Answer-Me-By-E-mail-form ####
<!-- Answer-Me-By-Email form -->
<table style="width: 100%;">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Description</th>
            <th>Default</th>
            <th>Possible values</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>useAnswerMeByEmail</td>
            <td>Is Answer-Me-By-E-mail-form option enabled?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>answerMeByEmailLabel</td>
            <td>Link label of Answer-Me-By-E-mail-form option</td>
            <td>Answer me by E-mail</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailFormIcon</td>
            <td>Link icon of Answer-Me-By-E-mail-form option</td>
            <td>EXT:rd_contact_plugin/Resources/Public/icons/sms-bubble-speech.svg</td>
            <td>text (path to icon)</td>
        </tr>
        <tr>
            <td>answerMeByEmailFormDescription</td>
            <td>Modal form description of Answer-Me-By-E-mail-form option</td>
            <td>Enter your contact information</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_field_name_label</td>
            <td>Name field label in Modal form</td>
            <td>Enter your name*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_field_name_placeholder</td>
            <td>Name field placeholder in Modal form</td>
            <td>Name</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_field_email_label</td>
            <td>E-mail field label in Modal form</td>
            <td>Enter your e-mail address*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_field_email_placeholder</td>
            <td>E-mail field placeholder in Modal form</td>
            <td>info@example.com</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_field_question_label</td>
            <td>Question field label in Modal form</td>
            <td>Question:*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_field_question_placeholder</td>
            <td>Question field placeholder in Modal form</td>
            <td>enter your question here..</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_field_submit</td>
            <td>Submit button label in Modal form</td>
            <td>Send!</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_email_body_tmpl_path</td>
            <td>Template path of Admin E-mail letter of Modal form</td>
            <td>rd_contact_plugin/Resources/Private/Templates/EmailBodies/answerMeByEmailForm.html</td>
            <td>text (path to fluid template)</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_email_recieverEmail</td>
            <td>Admin E-mail address which will get Admin e-mail letter of Modal form (required)</td>
            <td>-</td>
            <td>any E-mail address</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_email_recieverName</td>
            <td>Admin E-mail name which will get Admin e-mail letter of Modal form</td>
            <td>-</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>answerMeByEmailForm_email_subject</td>
            <td>Admin Email letter Subject of Modal form</td>
            <td>You got new Answer-Me-By-Email request from your website!</td>
            <td>any text</td>
        </tr>
    </tbody>
</table>

#### Contact-using-Viber ####
<!-- Viber -->
<table style="width: 100%;">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Description</th>
            <th>Default</th>
            <th>Possible values</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>useViber</td>
            <td>Is Contact-using-Viber option enabled?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>viber</td>
            <td>Your viber phone number (example: +380XXXXXXXXX)</td>
            <td>+380XXXXXXXXX</td>
            <td>+(only digits)</td>
        </tr>
        <tr>
            <td>viberLabel</td>
            <td>Link label of Contact-using-Viber option</td>
            <td>Contact using Viber</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>viberIcon</td>
            <td>Link icon of Contact-using-Viber option</td>
            <td>EXT:rd_contact_plugin/Resources/Public/icons/viber2.svg</td>
            <td>text (path to icon)</td>
        </tr>
    </tbody>
</table>

#### Contact-using-FB-Messenger ####
<!-- FB Messenger -->
<table style="width: 100%;">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Description</th>
            <th>Default</th>
            <th>Possible values</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>useFbMessenger</td>
            <td>Is Contact-using-FB-Messenger option enabled?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>fbMessengerUrl</td>
            <td>Facebook Messenger URL</td>
            <td>http://m.me/</td>
            <td>full URL</td>
        </tr>
        <tr>
            <td>fbMessengerLabel</td>
            <td>Link label of Contact-using-FB-Messenger option</td>
            <td>Contact using FB Messenger</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>fbMessengerIcon</td>
            <td>Link icon of Contact-using-FB-Messenger option</td>
            <td>EXT:rd_contact_plugin/Resources/Public/icons/facebook.svg</td>
            <td>text (path to icon)</td>
        </tr>
    </tbody>
</table>

#### Get-Appointment-form ####
<!-- Get An Appointment form -->
<table style="width: 100%;">
    <thead>
        <tr>
            <th>Variable</th>
            <th>Description</th>
            <th>Default</th>
            <th>Possible values</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>useGetAppointment</td>
            <td>Is Get-Appointment-form option enabled?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>getAppointmentLabel</td>
            <td>Link label of Get-Appointment-form option</td>
            <td>Get Appointment</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentFormIcon</td>
            <td>Link icon of Get-Appointment-form option</td>
            <td>EXT:rd_contact_plugin/Resources/Public/icons/icon.svg</td>
            <td>text (path to icon)</td>
        </tr>
        <tr>
            <td>getAppointmentFormDescription</td>
            <td>Modal form description of Get-Appointment-form option</td>
            <td>Enter your contact information</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_name_label</td>
            <td>Name field label in Modal form</td>
            <td>Enter your name*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_name_placeholder</td>
            <td>Name field placeholder in Modal form</td>
            <td>Name</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_phone_label</td>
            <td>Phone field label in Modal form</td>
            <td>Enter your phone number*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_phone_placeholder</td>
            <td>Phone field placeholder in Modal form</td>
            <td>+38 (___) ___-__-__</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_phone_mask_template</td>
            <td>Phone field input mask template in Modal form</td>
            <td>+{38 }(000) 000-00-00</td>
            <td>text (right pattern can be found here: https://unmanner.github.io/imaskjs/guide.html)</td>
        </tr>
        <tr>
            <td>useGetAppointmentForm_field_email</td>
            <td>Enable E-mail field in Get-Appointment form in Modal form?</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_email_label</td>
            <td>E-mail field label in Modal form</td>
            <td>Enter your e-mail address*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_email_placeholder</td>
            <td>E-mail field placeholder in Modal form</td>
            <td>info@example.com</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_date_label</td>
            <td>Preferred Date field label in Modal form</td>
            <td>Choose preferred appointment date*</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_date_pl</td>
            <td>Preferred Date field placeholder in Modal form</td>
            <td>dd/mm/yyyy</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_date_mask_template</td>
            <td>Preferred Date field input mask template in Modal form</td>
            <td>00{/}00{/}0000</td>
            <td>text (right pattern can be found here: https://unmanner.github.io/imaskjs/guide.html)</td>
        </tr>
        <tr>
            <td>getAppointmentForm_field_submit</td>
            <td>Submit button label in Modal form</td>
            <td>Get Appointment!</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_email_body_tmpl_path</td>
            <td>Template path of Admin E-mail letter of Modal form</td>
            <td>rd_contact_plugin/Resources/Private/Templates/EmailBodies/getAppointmentForm.html</td>
            <td>text (path to fluid template)</td>
        </tr>
        <tr>
            <td>getAppointmentForm_email_recieverEmail</td>
            <td>Admin E-mail address which will get Admin e-mail letter of Modal form (required)</td>
            <td>-</td>
            <td>any E-mail address</td>
        </tr>
        <tr>
            <td>getAppointmentForm_email_recieverName</td>
            <td>Admin E-mail name which will get Admin e-mail letter of Modal form</td>
            <td>-</td>
            <td>any text</td>
        </tr>
        <tr>
            <td>getAppointmentForm_email_subject</td>
            <td>Admin Email letter Subject of Modal form</td>
            <td>You got new Get-Appointment request from your website!</td>
            <td>any text</td>
        </tr>
    </tbody>
</table>

### Typoscript conditions ###
We have developed custom typoscript condition which you can use to have different contact plugin configuration depending on where website visitor came from. How such options could help you in business? here is an article: https://www.lifewire.com/how-to-use-http-referer-3471200#mntl-sc-block_1-0-33

<table style="width: 100%;">
    <thead>
        <tr>
            <th>Example</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                [RaccoonDepot\RdContactPlugin\Condition\HttpReferer = http://www.url.com/2/smth/]
                    # some new config here...
                [global]
            </td>
            <td>
                TRUE - if page URL where visitor came from == 'http://www.url.com/2/smth/'
            </td>
        </tr>
        <tr>
            <td>
                [RaccoonDepot\RdContactPlugin\Condition\HttpReferer % url.com/2]
                    # some new config here...
                [global]
            </td>
            <td>
                TRUE - if page URL where visitor came from contains substring 'url.com/2'
            </td>
        </tr>
        <tr>
            <td>
                [RaccoonDepot\RdContactPlugin\Condition\HttpReferer % url.com/2, % url.com/4]
                    # some new config here...
                [global]
            </td>
            <td>
                TRUE - if page URL where visitor came from contains substring 'url.com/2' OR contains substring 'url.com/4'
            </td>
        </tr>
    </tbody>
</table>

Also do not forget about another TYPO3 TS conditions: https://docs.typo3.org/typo3cms/TyposcriptReference/7.6/Conditions/Reference/Index.html


### Page TCA variables ###
There is also possibility to enable/disable contact plugin on specific page via TYPO3 BE interface

## Known issues ##
in case of 404 or other issues with sending any modal form -> please set 'pageNotFoundOnCHashError' => false

## Future features ##
In future we plan to give editors possibility to edit/create any number of contact options via BE interface of TYPO3.

<div style="text-align: center;">
<h1>Authors</h1>
<a href="http://www.raccoondepot.com/" target="_blank">
    <img src="http://www.raccoondepot.com/images/raccoon.svg" width="150" style="width: 150px; height: auto;">
</a><br /><br />
<a href="http://www.raccoondepot.com/" target="_blank">
    Raccoon Depot
</a><br />
<a href="mailto:depot@raccoondepot.com">
    depot@raccoondepot.com
</a><br />
<a href="https://www.facebook.com/profile.php?id=100004945534421" target="_blank">
    Rostyslav Matviyiv</a>, Yaroslav Trach, Andrii Pozdieiev<br />
</div>
