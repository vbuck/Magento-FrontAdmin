<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_IndexController extends Mage_Core_Controller_Front_Action 
{
	public function gotohomepageAction()
	{
		$this->_response->clearHeaders()->setRedirect(Mage::getBaseUrl())->sendHeadersAndExit();
	}

	/**
    * Flush cache storage
    */
    public function flushAllAction()
    {
    	if(Mage::getSingleton('meobookfrontadmin/session')->isAdminLoggedIn()) 
    	{
	        Mage::dispatchEvent('adminhtml_cache_flush_all');
	        Mage::app()->getCacheInstance()->flush();
	        echo 'Cache has been cleared, if you see this page, maybe your site has a javascript error <br/>';
	        echo '<a href="'. Mage::getBaseUrl() .'" > Click here </a> to go to homepage.';
	        exit;
    	}

    }
}