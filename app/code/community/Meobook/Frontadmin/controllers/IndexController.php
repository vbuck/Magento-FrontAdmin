<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_IndexController extends Mage_Core_Controller_Front_Action 
{
	public function testAction()
	{
	}

	/**
    * Redirect to homepage
    */
	public function gotohomepageAction()
	{
		$this->_response->clearHeaders()->setRedirect(Mage::getBaseUrl());
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
    	else 
    	{
    		$this->gotohomepageAction();
    	}
    }

	/**
    * Ajax load menu
    */    
    public function initFrontAdminAction()
    {
    	if(Mage::getSingleton('meobookfrontadmin/session')->isAdminLoggedIn()) 
    	{
	      	$this->getResponse()->setBody(
	            $this->getLayout()
	                ->createBlock('meobookfrontadmin/menu')
	                ->toHtml()
	        );
	        return $this;
	    }
    }
}