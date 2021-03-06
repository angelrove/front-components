<?php
/**
 *
 */

namespace angelrove\front_components\GridContent;

use angelrove\utils\CssJsLoad;
use angelrove\utils\FileUploaded;

// use angelrove\front_components\CanvasImageCrop\CanvasImageCrop;

class GridContent
{
    private $id_galerya;
    private $id_grid;
    private $conf_max_cols;
    private $conf_style;

    //-------------------------------------------------------------
    public function __construct($id_grid, $conf_max_cols, $conf_style)
    {
        $this->id_grid       = $id_grid;
        $this->conf_max_cols = $conf_max_cols;
        $this->conf_style    = $conf_style;

        // Libs ----
        CssJsLoad::set(__DIR__ . '/style.css');
    }
    //-------------------------------------------------------------
    // $listFotos[]: file_foto, name, texto, url
    public function get(array $listFotos, $subdir_uploads = '')
    {
        if (!$listFotos) {
            return false;
        }

        // Config. ----
        $bootstrap_col_md = 6;
        $bootstrap_col_xs = 12;

        $bootstrap_col_lg = ($this->conf_max_cols) ? (12 / $this->conf_max_cols) : 12;
        if ($bootstrap_col_lg == 12) {
            $bootstrap_col_md = 12;
        }

        // List fotos ----
        $htmListFotos = '';
        $c            = 0;
        foreach ($listFotos as $foto) {
            // Image ------
            $datos_img    = FileUploaded::getInfo($foto->file_foto, $subdir_uploads);
            $htm_img      = FileUploaded::getHtmlImg($datos_img, '', $foto->name, '', false, $foto->url);
            $foto->name = ($foto->url) ? '<a href="' . $foto->url . '">' . $foto->name . '</a>' : $foto->name;

            // tmpl Ficha -----
            ob_start();
            include 'tmpl_ficha.inc';
            $htmListFotos .= ob_get_clean();
        }

        // tmpl main -----
        ob_start();
        require 'tmpl_main.inc';
        $outHtm = ob_get_clean();

        return $outHtm;
    }
    //-------------------------------------------------------------
}
