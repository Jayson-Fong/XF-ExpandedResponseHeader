<?php


namespace Fong\ExpandedResponseHeader;


class Listener
{

    /**
     * @param \XF\Mvc\Dispatcher $dispatcher
     * @param $content
     * @param \XF\Mvc\Reply\AbstractReply $reply
     * @param \XF\Mvc\Renderer\AbstractRenderer $renderer
     * @param \XF\Http\Response $response
     */
    public static function addData(
        \XF\Mvc\Dispatcher $dispatcher,
        &$content,
        \XF\Mvc\Reply\AbstractReply $reply,
        \XF\Mvc\Renderer\AbstractRenderer $renderer,
        \XF\Http\Response $response
    )
    {
        $visitor = \XF::visitor();

        // Set Headers
        if (\XF::options()->expandedresponseheader_headers) {
            $response->header('Xf-User-Id', (int) $visitor->user_id);
            $response->header('Xf-Is-Staff', (int) $visitor->is_staff);
            $response->header('Xf-Is-Banned', (int) $visitor->is_banned);
        }
    }

}