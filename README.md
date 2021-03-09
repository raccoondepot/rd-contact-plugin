<b>raccoondepot/rd-contact-plugin</b> - is an extension built for TYPO3 CMS 9+ which displays on your website simple 
contact button (you can choose the position), and by click on it user see different contact options. 
Plugin is very flexible thus you can configure contact options exactly for your needs! 
Also you can create particular contact option which by choosing it will open modal window and there you can 
insert any content element you would like, e.g contact form :)

Also, it is possible to set restrictions in specific contact options so they would appear on the frontend 
only when such restrictions matches

Next restrictions are implemented:
- PID (display contact option only if current page match the selected ones in restriction)
- HTTP_REFERER (display contact option only if HTTP_REFERER contains specific value set in restriction). How such options could help you in business? here is an article: https://www.lifewire.com/how-to-use-http-referer-3471200#mntl-sc-block_1-0-33


## How to install? ##
- composer require raccoondepot/rd-contact-plugin
- include TypoScript of an extension
- flush the cache


## How to get started? ##
- first create plugin configuration record in any storage folder
- create any combination of contact options in it 
- use any restriction to setup some dynamic behavior
- save and flush the cache
- check the frontend


### TypoScript settings ###
Beside settings in database configuration record you have few more options in TypoScript. 
They can be found under <b>plugin.tx_rdcontactplugin.settings</b> Here is the list of all available options:

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
            <td>Is the whole plugin enabled? (Global enable/disable)</td>
            <td>1</td>
            <td>1/0</td>
        </tr>
        <tr>
            <td>position</td>
            <td>How to place contact button on the page?</td>
            <td>bottom_right</td>
            <td>bottom_left / top_left / top_right / bottom_right</td>
        </tr>
        <tr>
            <td>pluginToUseUid</td>
            <td>Do you wanna use specific plugin configurations?</td>
            <td>-</td>
            <td>UID of the configuration record</td>
        </tr>
    </tbody>
</table>


### [DEPRECATED] TypoScript HTTP_REFERER condition ###

We've developed TypoScript condition which you can use to have different behaviour of your website depending on where website visitor came from (HTTP_REFERER). 

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

## Do you have any questions? ##

Please contact us by <a href="mailto:depot@raccoondepot.com">depot@raccoondepot.com</a>, 
or use *Discussions* section on <a href="https://github.com/raccoondepot/rd-contact-plugin">GitHub</a> page  

## Report an issue ##

Please contact us by <a href="mailto:depot@raccoondepot.com">depot@raccoondepot.com</a>, 
or use *Discussions* section on <a href="https://github.com/raccoondepot/rd-contact-plugin">GitHub</a> page                   

## AUTHORS ##

<a href="https://www.linkedin.com/in/rostyslav-matviyiv/" target="_blank">Rostyslav Matviyiv</a> (BE)<br />
Yaroslav Trach (FE)<br />
<br />
<a href="mailto:depot@raccoondepot.com">
    depot@raccoondepot.com
</a><br />
<a href="https://www.raccoondepot.com/" target="_blank">
    <img src="https://www.raccoondepot.com/themes/fe_layout_rd/assets/images/logo/raccoon-depot-logo.svg" width="200" style="width: 200px; height: auto;">
</a><br />
