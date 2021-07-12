<?php


namespace Fong\ExpandedResponseHeader\XF\ControllerPlugin;

use XF;
use XF\Entity\User;

class Login extends XFCP_Login
{

    /**
     * Sets the staff cookie if enabled.
     * @param User $user
     * @param $remember
     */
    public function completeLogin(User $user, $remember)
    {
        parent::completeLogin($user, $remember);

        if ($user->is_staff) {
            /** @var bool[]|string[] $staffCookie */
            $staffCookie = XF::options()->expandedresponseheader_cookie;
            if ($staffCookie['enabled']) {
                $this->app->response->setCookie('staff', $staffCookie['content']);
            }
        }
    }

}