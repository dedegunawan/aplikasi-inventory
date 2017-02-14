<?php
function admin_page($page='', $action = '', $other_data = array())
{
    $url = INDEX_ADMIN_URL.'?page='.$page;
    if (trim($action) != '') {
        $url .= '&action='.$action;
    }
    if (is_array($other_data) && !empty($other_data)) {
        foreach ($other_data as $key => $value) {
            $url .= "&$key=$value";
        }
    }
    return $url;
}
function get_page()
{
    $page = @$_GET['page'];
    return $page;
}
function get_action()
{
    $action = @$_GET['action'];
    return $action;
}
function page($page_name, $in_what) {
    include $in_what.'/page/'.$page_name.'.php';
}
function sub_page($page_name, $in_what) {
    $page = get_page();
    if (trim($page) == '') {
        throw new Exception("Error Calling sub_page, need page", 1);

    }
    include $in_what.'/page/'.$page.'/'.$page_name.'.php';
}
function form_gbc() {
    $_SESSION['forms'] = array();
}
function old($column_name) {
    $ss = @$_SESSION['forms'][$column_name];
    unset($_SESSION['forms'][$column_name]);
    return $ss;

}
function push_script($name, $data) {
    if (!isset($_SESSION['script'][$name])) {
        $GLOBALS['script'][$name] = array();
    }
    if (is_callable($data)) {
        ob_start();
        $data();

        $GLOBALS['script'][$name][] = ob_get_clean();
    } else {
        $GLOBALS['script'][$name][] = $data;
    }

}
function pop_script($name) {
    return @$GLOBALS['script'][$name];
}
function pop_script_and_parse($name, $imploder = '') {
    $array_script = pop_script($name);
    if (is_array($array_script)) {
        return implode($imploder, $array_script);
    } else {
        return implode($imploder, array());
    }

}
