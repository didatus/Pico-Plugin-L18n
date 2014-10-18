<?php

define('L18N_FILE', ROOT_DIR .'l18n.php');

class L18n {

    private $language = 'de';

    private $l18n = array();

    public function config_loaded(&$settings) {
        $l18n = array();
        include(L18N_FILE);
        $settings['l18n'] = $l18n;
        $this->l18n = $l18n;
        unset($l18n);
    }

    public function before_read_file_meta(&$headers) {
        $headers['language'] = 'Language';
    }

    public function file_meta(&$meta) {
        if (isset($meta['language']) && in_array($meta['language'], array_keys($this->l18n))) {
            $this->language = $meta['language'];
        }
    }

    public function after_render(&$output) {
        if(preg_match_all("/<!-- *l18n:(.*?) *-->/", $output, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                if (isset($this->l18n[$this->language][$match[1]])) {
                    $output = str_replace($match[0], $this->l18n[$this->language][$match[1]], $output);
                }
            }
        }
    }
}
