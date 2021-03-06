<?php
/**
 * Copyright (C) MIKO LLC - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nikolay Beketov, 5 2018
 *
 */

namespace Models;

class CallEventsLogs extends ModelsBase
{

    /**
     * @Primary
     * @Identity
     * @Column(type="integer", nullable=false)
     */
    public $id;

    /**
     * @Column(type="string", nullable=true)
     */
    public $eventtime;

    /**
     * @Column(type="string", nullable=true)
     */
    public $app;

    /**
     * @Primary
     * @Column(type="string", nullable=true)
     */
    public $linkedid;

    /**
     * @Column(type="string", nullable=true)
     */
    public $datajson;

    public function getSource(): string
    {
        return 'call_events';
    }

    public function initialize(): void
    {
        parent::initialize();
        $this->useDynamicUpdate(true);
        $this->setConnectionService('dbLog');
    }

}