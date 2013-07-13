<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Core SAAN Framework
 * @purpose: This is Core Validation Class for the Application.
 *
 * @author: Saurabh Sinha
 * @created on: 1/7/13 8:47 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class Validation
{
    
    /**
     * @purpose: This function validates the Email Address
     * @author: Saurabh Sinha
     * 
     * @param type $emailAddress
     * @return boolean
     */
    public function validateEmail($emailAddress)
    {
        if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
           return true;
        }
        return false;
    }

    /**
     * @purpose: This function validates the Phone Number
     * @author: Saurabh Sinha
     *
     * @param $phone
     *
     * @return bool
     */
    public function validatePhone($phone)
    {
        if (is_numeric($phone) === TRUE) {
            if (strlen($phone) >= 10 && strlen($phone) <= 11) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }

    /**
     * @purpose: This function matches the Two Parameters including the datatype and the value
     * @author: Saurabh Sinha
     *
     * @param $pass1
     * @param $pass2
     *
     * @return bool
     */
    public function isEqualValue($pass1, $pass2)
    {
        if (!empty($pass1) and !empty($pass2)) {
            if ($pass1 === $pass2) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * @purpose: This function checks the variable for null or empty value
     * @author: Saurabh Sinha
     *
     * @param $stringValue
     *
     * @return bool
     */
    public function isEmpty($stringValue)
    {
        if (empty($stringValue)) {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * @purpose: This function checks the date for validity
     * @author: Saurabh Sinha
     *
     * @param $dateValue
     *
     * @return bool
     */
    public function checkDateFormat($dateValue)
    {
        $date = date_parse($dateValue); 
        if (checkdate($date['month'], $date['day'], $date['year'])) {
            return true;
        }
        return false;
    }
    
    /**
     * @purpose: This function checks for the float value
     * @author: Saurabh Sinha
     * @param type $val
     * @return type
     */
    public function isTrueFloat($val)
    {
        $valueArray = explode('.', $val);
        if(is_numeric($valueArray[0]) && is_numeric($valueArray[1]))
        {
            return true;
        }
        return false;
    } 
}
