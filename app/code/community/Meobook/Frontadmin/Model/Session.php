<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_Model_Session extends Mage_Core_Model_Session_Abstract
{
	/**
    * backup session instance
    *
    * @var Array
    */
	protected $_frontendSession;

	/**
    * admin session instance
    *
    * @var Mage_Admin_Model_Session
    */
	protected $_adminSession;

	/**
    * admin form key
    *
    * @var string
    */
	protected $_form_key;

	public function __construct()
	{
		parent::__construct();
		if(!$this->_adminSession) {
			$this->_frontendSession = $_SESSION;
			$this->initAdminSession();
		}
	}

	/**
     * get admin session
     *
     * @return Mage_Admin_Model_Session
     */
	public function getAdminSession()
	{
		return $this->_adminSession;
	}

	/**
     * get admin session id from cookie
     *
     * @return string
     */
	protected function getAdminSessionId()
	{
		return $this->getCookie()->get('adminhtml');
	}

    /**
     * Load session data from file or database
     * support save session in file or db only
     *
     * @return string|false
     */
	private function loadAdminSession()
	{
		$saveMethod = $this->getSessionSaveMethod();
		$data = false;
		switch ($saveMethod) {
			case 'files':
				$filePath = Mage::getBaseDir('session'). DS . 'sess_' . $this->getAdminSessionId();
				if(!file_exists($filePath)) return false;
				$data = file_get_contents($filePath);
				break;
			case 'db':
				$reader = Mage::getSingleton('core/resource_session');
        		$data = $reader->read($session_id);
				break;
			default:
				break;
		}

		return $data;
	}

    /**
     * init admin session and assign to a variable
     *
     * @return boolean
     */
	private function initAdminSession()
	{
		$data = $this->loadAdminSession();
		if($data)
		{
			session_decode($data);
			$this->_adminSession = Mage::getSingleton('admin/session');
			$this->_form_key = $_SESSION['core']['_form_key'];
			$this->restoreFrontendSession();
			return true;
		}
		return false;
	}

    /**
     * restore current sesion to frontend session
     *
     * @return boolean
     */
	public function restoreFrontendSession()
	{
		$_SESSION = $this->_frontendSession;
	}

	/**
     * check admin access
     *
     * @return boolean
     */
	public function checkAdminAcl($resource)
	{
		if($this->getAdminSession())
		{
			$result = $this->getAdminSession()->isAllowed($resource);
	        return $result;
		}
		return false;
	}

	/**
     * Check if admin is logged in
     *
     * @return boolean
     */
	public function isAdminLoggedIn()
	{
		return $this->getAdminSession() && $this->getAdminSession()->isLoggedIn();
	}

	/**
     * retrive admin form key
     *
     * @return string
     */
	public function getFormKey()
	{
		return $this->_form_key;
	}

}