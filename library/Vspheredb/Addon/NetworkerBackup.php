<?php

namespace Icinga\Module\Vspheredb\Addon;

use Icinga\Module\Vspheredb\DbObject\VirtualMachine;
use Icinga\Module\Vspheredb\Web\Widget\Addon\NetworkerBackupRunDetails;
use RuntimeException;

class NetworkerBackup extends SimpleBackupTool
{
    const PREFIX = 'Last EMC vProxy Backup';

    public function getName()
    {
        return 'Dell Networker';
    }

    /**
     * @param VirtualMachine $vm
     * @return bool
     */
    public function wants(VirtualMachine $vm)
    {
        return $this->wantsAnnotation($vm->get('annotation'));
    }

    /**
     * @param VirtualMachine $vm
     */
    public function handle(VirtualMachine $vm)
    {
        $this->parseAnnotation($vm->get('annotation'));
    }

    /**
     * @return NetworkerBackupRunDetails
     */
    public function getInfoRenderer()
    {
        return new NetworkerBackupRunDetails($this);
    }

    /**
     * @return array
     */
    public function requireParsedAttributes()
    {
        $attributes = $this->getAttributes();
        if ($attributes === null) {
            throw new RuntimeException('Got no Networker Backup annotation info');
        }

        return $attributes;
    }
}
