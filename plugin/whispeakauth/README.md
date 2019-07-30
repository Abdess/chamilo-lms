Speech authentication with Whispeak
===================================

**Notice:**

This plugin requires the user to grant permission to use the microphone connected in the web browser. Currently,
browsers are limiting this permission to be used only in a secure environment with HTTPS. 
**If your portal does not work with HTTP, then Whispeak authentication may not work.**

Instructions:
-------------

> Make sure the directory `src/Chamilo\PluginBundle` is writable by the web server in order for the plugin is installed
> properly. This might imply a manual change on your server (outside of the Chamilo interface).

1. Install plugin in Chamilo.
2. Set your JSON Web Token provided by Whispeak in the `/path/to/chamilo/plugin/whispeak/tokenTest`:
```shell
echo "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c" > /path/to/chamilo/plugin/whispeak/tokenTest
``` 
3. Set the plugin configuration enabling the plugin and (optionally) set the max attempts. 
4. Set the `login_bottom` region to the plugin. 
5. Add `$_configuration['whispeak_auth_enabled'] = true;` to `configuration.php` file.
