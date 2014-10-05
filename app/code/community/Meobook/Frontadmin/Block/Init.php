<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_Block_Init extends Mage_Core_Block_Abstract
{
    public function getJsUrl()
    {
        return Mage::getBaseUrl('js'). 'frontadmin';
    }

    protected function _toHtml()
    {
        if(Mage::getSingleton('meobookfrontadmin/session')->isAdminLoggedIn())
        {
            $jsUrl = $this->getJsUrl();
            $html = "<link type='text/css' href='$jsUrl/frontadmin.css' rel='stylesheet' />";
            $html .= "<script type='text/javascript' src='$jsUrl/init.js'></script>";
            return $html;
        }
    }

}
