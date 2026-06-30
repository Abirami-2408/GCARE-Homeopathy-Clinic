
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL  ← CHANGE THIS TO MATCH YOUR XAMPP SETUP
|--------------------------------------------------------------------------
| If XAMPP uses port 80  (default): http://localhost/MyProject/
| If XAMPP uses port 8080:          http://localhost:8080/MyProject/
|
| ✅ IMPORTANT: The trailing slash is REQUIRED.
| ✅ The folder name (MyProject) must exactly match the folder you put
|    in htdocs/ — it is case-sensitive on Linux/Mac.
|
| This value is used by base_url() in your views to build image URLs like:
|   base_url('assets/uploads/sliders/abc123.jpg')
|   → http://localhost:8080/MyProject/assets/uploads/sliders/abc123.jpg
|
| If this is wrong, all uploaded images will show as broken.
*/
$config['base_url'] = 'http://localhost:8080/MyProject/';

/*
|--------------------------------------------------------------------------
| Index File  ← SET TO EMPTY STRING IF YOU HAVE .htaccess URL rewriting
|--------------------------------------------------------------------------
| '' = URLs look like: http://localhost:8080/MyProject/admin/manage_slider
| 'index.php' = URLs look like: http://localhost:8080/MyProject/index.php/admin/manage_slider
|
| Use '' only if you have the .htaccess file in your project root.
*/
$config['index_page'] = '';

$config['uri_protocol']  = 'AUTO';
$config['url_suffix']    = '';
$config['language']      = 'english';
$config['charset']       = 'UTF-8';
$config['enable_hooks']  = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array']  = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger']   = 'm';
$config['directory_trigger']  = 'd';
$config['log_threshold'] = 1;   // ← Set to 1 during development to log errors
$config['log_path']      = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format']   = 'Y-m-d H:i:s';
$config['error_views_path']  = '';
$config['cache_path']        = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = 'MyProjectSecretKey2024';
$config['sess_driver']          = 'files';
$config['sess_cookie_name']     = 'ci_session';
$config['sess_expiration']      = 7200;
$config['sess_save_path']       = NULL;
$config['sess_match_ip']        = FALSE;
$config['sess_time_to_update']  = 300;
$config['sess_regenerate_destroy'] = FALSE;
$config['cookie_prefix']   = '';
$config['cookie_domain']   = '';
$config['cookie_path']     = '/';
$config['cookie_secure']   = FALSE;
$config['cookie_httponly']  = FALSE;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection']  = FALSE;
$config['csrf_token_name']  = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire']      = 7200;
$config['csrf_regenerate']  = TRUE;
$config['csrf_exclude_uris'] = array();
$config['compress_output']  = FALSE;
$config['time_reference']   = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';
