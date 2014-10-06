<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_Helper_Data extends Mage_Core_Helper_Abstract
{
	/**
     * get frontadmin resource url
     *
     * @param string $path
     * @return string
     */
    public function getJsUrl($path)
    {
    	if ($path) {
    		return Mage::getBaseUrl('js'). 'frontadmin/' . $path;
    	}
        return Mage::getBaseUrl('js'). 'frontadmin';
    }

}