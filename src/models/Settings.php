<?php

namespace born05\sentry\models;

use craft\base\Model;

class Settings extends Model
{
    public $enabled = true;
    public $anonymous = false; // Determines to log user info or not
    public $clientDsn;
    public $clientKey;
    public $excludedCodes = ['404'];
    public $release; // Release number/name used by sentry.
    public $reportJsErrors = false; // Client only option
    public $sampleRate = 1.0; // Client only option
    public $ignoreErrors = [];

    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        return [
            [['enabled', 'anonymous', 'reportJsErrors'], 'boolean'],
            [['clientDsn', 'clientKey', 'excludedCodes', 'release'], 'string'],
            [['ignoreErrors'], 'array'],
            [['clientDsn'], 'required'],
            [['sampleRate'], 'number', 'min' => 0, 'max' => 1],
        ];
    }
}
