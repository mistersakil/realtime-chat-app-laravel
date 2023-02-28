<?php

/**
 * _dateFormat function format date as user needs
 * @param string $date date('Y-m-d')
 * @param string $format "Y-m-d"
 * @return string $date
 * @author Sakil Jomaddar <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_dateFormat')) {
    function _dateFormat($date = "date('Y-m-d')", $format = "Y-m-d")
    {
        $date = date_create($date);
        $date = date_format($date, $format);
        return $date;
    }
}


/**
 * _icons function returns necessary icons 
 * @return array <mixed>
 * @author Sakil Jomaddar <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_icons')) {
    function _icons($iconName = 'user')
    {
        $iconList = [
            'users'                 => 'lni lni-users',
            'user'                  => 'lni lni-user',
            'link'                  => 'bx bx-link',
            'link_ln'               => 'lni lni-link',
            'conversations'         => 'bx bx-conversation',
            'messages'              => 'lni lni-snapchat',
            'logout'                => 'bx bx-log-out-circle'

        ];
        return $iconList["$iconName"];
    }
}


/**
 * Created _ucFirst function to replace (_,-) and capitalize the first character 
 * @param string $_string null
 * @return string
 * @author Sakil Jomaddar <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_ucFirst')) {
    function _ucFirst($_string = null)
    {
        $_string = trim($_string);
        $_string = strtolower($_string);
        $_string = str_replace('_', ' ', $_string);
        $_string = str_replace('-', ' ', $_string);
        $_string = ucfirst($_string);
        return $_string;
    }
}

/**
 * _os_relevant_file_upload_path this function will format upload absolute path on any type of operating system
 * @param string $path
 * @return string $path
 * @author Sakil Jomaddar <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_os_relevant_file_upload_path')) {
    function _os_relevant_file_upload_path($path)
    {
        $path = str_replace('\\', '/',  $path);
        $path = str_replace('///', '/', $path);
        $path = str_replace('//', '/', $path);
        $path = str_replace('\/', '/', $path);
        return $path;
    }
}
