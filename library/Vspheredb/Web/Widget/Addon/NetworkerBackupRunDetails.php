<?php

namespace Icinga\Module\Vspheredb\Web\Widget\Addon;

use gipfl\Translation\TranslationHelper;
use gipfl\IcingaWeb2\Widget\NameValueTable;
use Icinga\Date\DateFormatter;
use Icinga\Module\Vspheredb\Addon\NetworkerBackup;

class NetworkerBackupRunDetails extends NameValueTable
{
    use TranslationHelper;

    /**
     * NetworkerBackupRunDetails constructor.
     * @param NetworkerBackup $details
     */
    public function __construct(NetworkerBackup $details)
    {
        $attributes = $details->requireParsedAttributes();

        $this->addNameValuePairs([
            $this->translate('Backup Server') => $attributes['Backup Server'],
            $this->translate('Policy')        => $attributes['Policy'],
            $this->translate('Workflow')      => $attributes['Workflow'],
            $this->translate('Action')        => $attributes['Action'],
            $this->translate('Job ID')        => $attributes['JobId'],
            $this->translate('Start Time')    => DateFormatter::formatDateTime($attributes['StartTime']),
            $this->translate('End Time')      => DateFormatter::formatDateTime($attributes['EndTime']),
        ]);
    }
}
