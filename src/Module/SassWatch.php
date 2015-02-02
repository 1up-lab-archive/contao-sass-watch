<?php

namespace Oneup\SassWatch\Module;

class SassWatch
{
    protected $host;
    protected $file;
    protected $tag;
    protected $useSassWatch;
    protected $outputFolder;

    public function __construct()
    {
        $this->tag  = '<link rel="stylesheet" type="text/css" href="%s/%s.css" />';
        $this->host = \Environment::get('host');

        $this->useSassWatch = $GLOBALS['TL_CONFIG']['useSassWatch'];
        $this->outputFolder = $GLOBALS['TL_CONFIG']['outputFolder'];

        if ($this->useSassWatch) {
            $this->file = new \File($GLOBALS['TL_CONFIG']['inputFile'], true);
        }
    }

    public function checkForReplace($strBuffer)
    {
        if (true !== $this->useSassWatch) {
            return $strBuffer;
        }

        if ('localhost' !== $this->host) {
            return $strBuffer;
        }

        if (!$this->file->exists()) {
            \System::log('Source file (' . $this->file->path . ') not found.', __METHOD__, TL_ERROR);

            return ($strBuffer);
        }

        $this->tag = sprintf($this->tag, $this->outputFolder, $this->file->filename);

        return $this->replaceTag($strBuffer);
    }

    protected function replaceTag($strBuffer)
    {
        return str_replace('[[TL_CSS]]', $this->tag . "\n", $strBuffer);
    }
}
