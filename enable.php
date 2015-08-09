<?php
if (!defined('IN_CMS')) {
    exit();
}

$PDO = Record::getConnection();

$PDO->exec("ALTER TABLE `" . TABLE_PREFIX . "user`
ADD `user_key` VARCHAR(128) NOT NULL AFTER `updated_by_id`");
