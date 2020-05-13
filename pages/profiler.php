<?php

if (!defined('AOWOW_REVISION'))
    die('illegal access');


class ProfilerPage extends GenericPage
{
    protected $path     = [1, 5];
    protected $tabId    = 1;
    protected $tpl      = 'profiler';
    protected $gDataKey = true;
    protected $js       = ['profile_all.js', 'profile.js'];
    protected $css      = [['path' => 'Profiler.css']];

    public function __construct($pageCall, $pageParam)
    {
        if (!CFG_PROFILER_ENABLE)
            $this->error();

        parent::__construct($pageCall, $pageParam);
    }

    protected function generateContent()
    {
        $this->addJS('?data=realms&locale='.User::$localeId.'&t='.$_SESSION['dataKey']);
    }

    protected function generatePath() { }

    protected function generateTitle()
    {
        array_unshift($this->title, Util::ucFirst(Lang::profiler('profiler')));
    }
}

?>
