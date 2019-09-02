<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\Condition;

use TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class HttpReferer extends AbstractCondition
{
    /**
     * Evaluate condition
     *
     * @param array $conditionParameters
     *
     * @return bool
     */
    public function matchCondition(array $conditionParameters): bool
    {
        if ( 'FE' == TYPO3_MODE ) {
            if ( empty( $conditionParameters ) ) {
                return false;
            } else {
                foreach ($conditionParameters as $key => $value) {

                    if( isset($_SERVER['HTTP_REFERER']) ) {
                        $value = trim( $value );
                        
                        switch ($value[0]) {
                            case '=':
                                // exactly
                                $value[0] = ' ';
                                $value = trim( $value );

                                if ( $value == $_SERVER['HTTP_REFERER'] ) {
                                    return true;
                                }

                                break;

                            case '%':
                                // like
                                $value[0] = ' ';
                                $value = trim( $value );

                                if (strpos( $_SERVER['HTTP_REFERER'], $value) !== FALSE) {
                                    return true;
                                }

                                break;
                            
                            default:
                                return false;
                                break;
                        }
                        // end
                    } 
                    else {
                        return false;
                    }
                }
            }
        }
        elseif ( empty($conditionParameters) ) {
            DebuggerUtility::var_dump('RaccoonDepot\RdContactPlugin\Condition\HttpReferer - should contain arguments, check the README.md file of rd_contact_plugin.');
            return false;
        }

        return false;
    }
}
