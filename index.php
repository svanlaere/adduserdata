<?php
if (!defined('IN_CMS')) {
    exit();
}

Plugin::setInfos(array(
    'id' => 'adduserdata',
    'title' => 'Add user data',
    'description' => 'Add data to the user table',
    'version' => '0.1.0',
    'license' => 'GPLv3',
    'author' => 'svanlaere',
    'website' => 'http://www.wolfcms.org/',
    'update_url' => 'http://www.wolfcms.org/plugin-versions.xml',
    'require_wolf_version' => '0.7.6'
));


AutoLoader::addFile('Kint', PLUGINS_ROOT . DS . 'adduserdata/kint/kint.class.php');
Plugin::addController('adduserdata', 'User data', 'admin_view', true);
Observer::observe('user_after_add', 'add_user_key');

function add_user_key($user_name, $user_id)
{
    // some random string
    $random = sha1(microtime() . rand());
    
    // insert random string into user_key colomn
    Record::update('User', array(
        'user_key' => $random
    ), 'id = :user_id', array(
        ':user_id' => $user_id
    ));
}
