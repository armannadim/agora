<?php
/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Zikula
 * @subpackage Zikula_Doctrine
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * HookProvider model class.
 */
class Zikula_Doctrine_Model_HookProvider extends Doctrine_Record
{
    /**
     * Set table definitions.
     *
     * @return void
     */
    public function setTableDefinition()
    {
        $this->setTableName('hook_provider');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));

        $this->hasColumn('owner', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));

        $this->hasColumn('subowner', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));

        $this->hasColumn('pareaid', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));

        $this->hasColumn('hooktype', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));

        $this->hasColumn('category', 'string', 20, array(
             'type' => 'string',
             'length' => 10,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));

        $this->hasColumn('classname', 'string', 60, array(
             'type' => 'string',
             'length' => 60,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));

        $this->hasColumn('method', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));

        $this->hasColumn('serviceid', 'string', 60, array(
             'type' => 'string',
             'length' => 60,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));

        $this->index('nameidx', array(
                'fields' => array(
                    'pareaid', 'hooktype',
                    ),
                'type' => 'unique'));
    }

    /**
     * Setup hook.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }
}
