<?php
/**
* 
*/
class Meobook_Frontadmin_Model_Container_Menu extends Enterprise_PageCache_Model_Container_Abstract
{
    /**
     * Get container individual cache id
     *
     * @return string|false
     */
	protected function _getCacheId()
    {
        return $this->_placeholder->getAttribute('placeholder') . md5($this->_placeholder->getAttribute('cache_id')).'_'.$this->_getIdentifier();
    }

    /**
     * Render block content from placeholder
     *
     * @return string|false
     */
    protected function _renderBlock()
    {
        $blockClass = $this->_placeholder->getAttribute('block');;
        $template = $this->_placeholder->getAttribute('template');
        $block = new $blockClass;
        $block->setTemplate($template);
        return $block->toHtml();
    }
    
    /**
     * Get identifier from cookies
     *
     * @return string
     */
    protected function _getIdentifier()
    {
        return $this->_getCookieValue(Enterprise_PageCache_Model_Cookie::COOKIE_CUSTOMER, '');
    }
    
    /**
     * Save data to cache storage
     *
     * @param string $data
     * @param string $id
     * @param array $tags
     * @param null|int $lifetime
     * @return Enterprise_PageCache_Model_Container_Abstract
     */
    protected function _saveCache($data, $id, $tags = array(), $lifetime = null)
    {
        parent::_saveCache($data, $id, $tags, 0);
    }
}