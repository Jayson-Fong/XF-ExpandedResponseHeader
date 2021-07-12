<?php


namespace Fong\ExpandedResponseHeader;


use XF;
use XF\Http\Response;
use XF\Mvc\Dispatcher;
use XF\Mvc\Renderer\AbstractRenderer;
use XF\Mvc\Reply\AbstractReply;

class Listener
{

    /**
     * @param Dispatcher $dispatcher
     * @param $content
     * @param AbstractReply $reply
     * @param AbstractRenderer $renderer
     * @param Response $response
     */
    public static function addData(Dispatcher $dispatcher, &$content, AbstractReply $reply, AbstractRenderer $renderer, Response $response)
    {
        $visitor = XF::visitor();

        // Set Response Headers
        if (XF::options()->expandedresponseheader_headers) {
            $response->header('Xf-User-Id', (int) $visitor->user_id);
            $response->header('Xf-Is-Staff', (int) $visitor->is_staff);
            $response->header('Xf-Is-Banned', (int) $visitor->is_banned);
        }
    }

}