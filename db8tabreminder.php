<?php
/**
 * @package     plg_system_db8tabreminder
 * @author      Peter Martin, www.db8.nl
 * @copyright   Copyright (C) 2015 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class PlgSystemDb8tabreminder extends JPlugin
{
    protected $app;

    public function onBeforeRender()
    {
        if ($this->app->isSite()) {
            $body = $this->app->getBody();

            $document = JFactory::getDocument();
            $script = 'var title = document.title, newTitle = "'.$this->params->get('pretitle').'"';
            if ($this->params->get('showtitle') == 1){
                $script .= '+ title';
            }
            $script .= '+ "'.$this->params->get('posttitle').'";';
            $script .= 'document.addEventListener("visibilitychange", function() {document.title = ((document.hidden) ? newTitle : title);});';

            $document->addScriptDeclaration($script);
        }
    }

}
