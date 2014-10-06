Magento-FrontAdmin
==================

The idea is to help store administrator save time when managing the Magento store, switch between the Magento backend and frontend quickly with the 'Front admin menu' and other accessories.


Features:
--------------------------------------------------
- Display the Admin menu on frontend (like drupal, wordpress, joomla, moodle, ...)
 - Quick access to Magento management system
- 'Homepage' link item
 - Quick link go to homepage
- 'Flush Cache Storage' link item
 - One-click to refresh all caches
- 'Edit' link item on 
 - One-click to edit the product (or cms page) that you are viewing. This menu item is available only on Product Page View and Cms Page View.


Technical Detail:
--------------------------------------------------
- Validate admin ACL on frontend
- Generate URL with admin secure key


Update
--------------------------------------------------
- Version 0.0.2
 - Fix issue with Full page cache
 - Compress module files
 - Included jQuery
 - Included Fancybox2


Todo:
--------------------------------------------------
- Haven't test with multistore yet
- Currently support only two session save methods: 'files' and 'db'.
- Bug report email: minhtc256@gmail.com


Screenshot:
--------------------------------------------------
![magento frontadmin](https://github.com/minhtc/Magento-FrontAdmin/raw/master/screenshot/screenshot.png)