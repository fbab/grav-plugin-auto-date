<?php
namespace Grav\Plugin;


use Grav\Common\Page\Page;
use Grav\Common\Page\Header;
use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class AutoDatePlugin
 * @package Grav\Plugin
 */
class AutoDatePlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onAdminCreatePageFrontmatter' => ['onAdminCreatePageFrontmatter', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onAdminCreatePageFrontmatter(Event $event)
    {
        $header = $event['header'];
        
        if (!isset($header['creation-date'])) {
            $header['creation-date'] = date($this->grav['config']->get('system.pages.dateformat.default', 'H:i d-m-Y'));
            // we suppose that the author-pseudo and author-email is null if creation-date is null
            $header['author-pseudo'] = $this->grav['user']->username;
            $header['author-email'] = $this->grav['user']->email;
    }
        
    public function onAdminSave (Event $event)
    {
        $obj = $event['object'] ;
        if ($obj instanceof Page )
        {
                $page = $obj ;
                $header = (array) $page->header() ;
                $header['last-change-date'] = date($this->grav['config']->get('system.pages.dateformat.default', 'H:i d-m-Y'));
                $header['last-change-author'] = $this->grav['user']->username ;
                $event['object']->header ( $header )  ;
        }
    }
}
