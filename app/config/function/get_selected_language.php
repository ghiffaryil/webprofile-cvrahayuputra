<?php
function get_selected_language($string_id, $string_en) {
    if (isset($_SESSION['lang'])) {
        if ($_SESSION['lang'] == 'id') {
            return $string_id;
        } elseif ($_SESSION['lang'] == 'en') {
            return $string_en;
        }
    }
    return $string_id;
}
?>
