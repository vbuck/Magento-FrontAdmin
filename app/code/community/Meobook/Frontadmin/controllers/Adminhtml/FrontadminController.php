<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_Adminhtml_FrontadminController extends Mage_Adminhtml_Controller_Action 
{
	public function testAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}