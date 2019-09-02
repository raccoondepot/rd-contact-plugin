## RD Contact form plugin ##
<b>RD Contact Plugin</b> is an extension developed by <a href="http://www.raccoondepot.com/">Raccoon Depot</a> team to be used in TYPO3 CMS 9+ or higher. This plugin includes simple contact button on each website page, and provides different ways for communication between website visitors and website owner. <br/>
An extension is flexible, so you could configure it as you wish. Part of configurations and labels available via TypoScript constants, especially for contact forms. <br />
Also we developed custom TS condition which can be used to run different configurations depends on HTTP_REFERER header. How HTTP_REFERER could help you in business, you can read here: <a href="https://www.lifewire.com/how-to-use-http-referer-3471200#mntl-sc-block_1-0-33">https://www.lifewire.com/how-to-use-http-referer-3471200#mntl-sc-block_1-0-33</a>. To see all available options/configurations and how to start read further..

## Contact Options ##
First you need to create plugin configuration in any storage folder, then attach needed contact options. There is 3 static contact forms:
<ol>
    <li><b>Call-Me-form</b> - with this option you will get an e-mail letter with the request from website visitor that he would like to have a call with you at preferred-by-visitor date or as soon as possible</li>
    <li><b>Answer-Me-By-E-mail-form</b> - with this option you will get an e-mail letter with the request from website visitor that he would like to get some answer on his question from you</li>
    <li><b>Get-Appointment-form</b> - with this option you will get an e-mail letter with the request from website visitor that he would like to have a meeting with you at preferred-by-visitor date</li>
</ol>
Other ones can be flexible to configure. (Will be listed here further)

## How to install ##
1. add git@gitlab.com:raccoondepot/rd_contact_plugin.git to repositories in your composer.json file
2. add "raccoondepot/rd-contact-plugin": "dev-master" in require section in your composer.json file
3. composer update
4. make sure rd_contact_plugin enabled in Extension Manager
5. add TS static includes
6. create new plugin configuration under any storage folder and add needed contact options
7. clear cache

## How to configure ##

### Contact options ###

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

## Known issues ##
In case of any issue please inform us by depot@raccoondepot.com

## Future improvements ##
In future we plan to bring more contact options.

<div style="text-align: center;">
<h1>Authors</h1>
<a href="http://www.raccoondepot.com/" target="_blank">
    <img src="https://www.raccoondepot.com/themes/fe_layout_rd/assets/images/logo/raccoon-depot-logo.svg" width="200" style="width: 200px; height: auto;">
</a><br />
<a href="http://www.raccoondepot.com/" target="_blank">
    Raccoon Depot
</a><br />
<a href="mailto:depot@raccoondepot.com">
    depot@raccoondepot.com
</a><br />
<a href="https://www.facebook.com/profile.php?id=100004945534421" target="_blank">
    Rostyslav Matviyiv</a>, Yaroslav Trach, Andrii Pozdieiev<br />
</div>
