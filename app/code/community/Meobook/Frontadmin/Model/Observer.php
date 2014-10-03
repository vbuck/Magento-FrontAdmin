<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_Model_Observer
{
	/** 
	* Check if current page is editable and set the edit url into core session
	* support product and cms page
	*
	* @param Varien_Event_Observer $observer
	*
	* @return void
	*/
	public function setEditUrl(Varien_Event_Observer $event)
	{
		$request = $event->getControllerAction()->getRequest();
		$routePath = $request->getRouteName() . '_' . $request->getControllerName();
		$editUrl = null;

		switch ($routePath) {
			case 'catalog_product':
			case 'cms_page':
				$editUrl = Mage::getModel('meobookfrontadmin/url')->getUrl('adminhtml/' . $routePath . '/edit', $request->getParams());
				break;
		}

		Mage::getSingleton('core/session')->setEditUrl($editUrl);
	}
}