<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_Block_Ajax extends Mage_Core_Block_Abstract
{

    protected function _toHtml()
    {
        if(Mage::getSingleton('meobookfrontadmin/session')->isAdminLoggedIn())
        {
            $jsUrl = Mage::helper('meobookfrontadmin')->getJsUrl();
            $html = "<link type='text/css' href='$jsUrl/frontadmin.css' rel='stylesheet' />";
            $html .= "<link type='text/css' href='$jsUrl/jquery.fancybox.css' rel='stylesheet' />";
            $html .= "<script type='text/javascript' src='$jsUrl/jquery-1.11.1.min.js'></script>";
            $html .= "<script type='text/javascript' src='$jsUrl/jquery.fancybox.pack.js'></script>";
            $html .= "<script type='text/javascript' src='$jsUrl/ajax.js'></script>";
            return $html;
        }
    }

}
