# Expanded Response Header for XenForo 2

Options for this add-on are included in the `Expanded Response Header` group. You must enable advanced mode to view it.

Optionally adds the following response headers:
* `Xf-User-Id` – User Id or 0 (Integer)
* `Xf-Is-Staff` - Staff (Boolean: 1 or 0)
* `Xf-Is-Banned` - Banned (Boolean: 1 or 0)

Adding response headers can help you filter down who is targeted by rate limiting with services such as Cloudflare, reducing the amount of billed requests. A condition to check if `Xf-User-Id` is `0` or not can be used to determine if a member is a guest. These headers are added to all responses interacting with your XenForo installation; however, note that it does not include static content like images or javascript your website uses.

Additionally, a `xf_staff` header can be optionally added. The content is a constant as defined in your forum's options, useful for services like Cloudflare firewall rules. The cookie is added upon login only unlike response headers. It is not set for logins to the admin control panel and is not removed on logout.

Other options for cookies are not provided because they can be easily manipulated by end-users, leading to ineffective bot protection. If attempting to block "generic" bot clients, it is advisable to instead check for the existance of XenForo's native cookies like `xf_user` or `xf_session`.
