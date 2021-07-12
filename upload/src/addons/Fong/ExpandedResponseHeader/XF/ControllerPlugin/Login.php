<?php


namespace Fong\ExpandedResponseHeader\XF\ControllerPlugin;

class Login extends XFCP_Login
{

    /**
     * @param \XF\Entity\User $user
     * @param $remember
     */
    public function completeLogin(\XF\Entity\User $user, $remember)
    {
        parent::completeLogin($user, $remember);
        if ($user->is_staff) {
            /**
             * $staffCookie['enabled'] : bool
             * $staffCookie['content'] : string
             */
            $staffCookie = \XF::options()->expandedresponseheader_cookie;
            if ($staffCookie['enabled']) {
                $this->app->response->setCookie('staff', $staffCookie['content']);
            }
        }
    }

}