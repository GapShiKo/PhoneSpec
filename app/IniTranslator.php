<?php

namespace App;

class IniTranslator
{
    protected $lang, $path;

    public function __construct($lang, $path)
    {
        $this->lang = $lang;
        $this->path = $path;
    }

    public function trans($key)
    {
        $filepath = $this->path . DIRECTORY_SEPARATOR . session('locale') . DIRECTORY_SEPARATOR . 'translate' . '.ini';
        if (!file_exists($filepath)) {
            return $key;
        }

        $translations = parse_ini_file($filepath);

        return $translations[$key] ?? $key;
    }
}
