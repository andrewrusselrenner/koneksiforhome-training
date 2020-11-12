<?php

if (!function_exists('komponen_view')) {
    function komponen_view(?string $mainView, ?array $data = null)
    {
        if (is_null($mainView)) {
            return;
        }

        echo view('komponen/kepala');
        echo (is_null($data)) ? view($mainView) : view($mainView, $data);
        echo view('komponen/kaki');
        return;
    }
}