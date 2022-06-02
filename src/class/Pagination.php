<?php

namespace App\class;


class Pagination
{
    public static function paginate(int $currentPage, int $lastPage)
    {
        $range = 8; // nombre de boutons totaux
        $sideLinks = floor($range / 2);
        $breakLink_start = $sideLinks + 1;
        $linksBeforeBreak_start = $range + 1;
        $breakLink_end = $lastPage - $sideLinks;
        $linksBefore_active = $currentPage - $sideLinks;
        $linksAfter_active = $currentPage + $sideLinks;
        $linksAfterBreak_end = $lastPage - $range;

        $html = '<nav aria-label="Aquarium Validation">
        <ul class="pagination justify-content-end">';

        $html .= self::previous($currentPage);

        switch ($currentPage) {
            case $currentPage < $breakLink_start:
                for ($i = 1; $i <= $linksBeforeBreak_start; $i++) {
                    $active = ($currentPage == $i) ? ' active' : ' ';
                    $link = self::buildLink($i);
                    $html .= "<li class='page-item $active'><a class='page-link' href='$link'>$i</a></li>";
                }
                break;
            case $currentPage > $breakLink_start && $currentPage < $breakLink_end:
                for ($i = $linksBefore_active; $i <= $linksAfter_active; $i++) {
                    $active = ($currentPage == $i) ? ' active' : ' ';
                    $link = self::buildLink($i);
                    $html .= "<li class='page-item $active'><a class='page-link' href='$link'>$i</a></li>";
                }
                break;
            default:
                for ($i = $linksAfterBreak_end; $i <= $lastPage; $i++) {
                    $active = ($currentPage == $i) ? ' active' : ' ';
                    $link = self::buildLink($i);
                    $html .= "<li class='page-item $active'><a class='page-link' href='$link'>$i</a></li>";
                }
                break;
        }

        $html .= self::next($currentPage, $lastPage);

        $html .= '</ul>
        </nav>';

        return $html;
    }

    private static function buildLink(int $page)
    {
        $_GET['page'] = $page;
        $query_result = http_build_query($_GET);

        return $_SERVER['PHP_SELF'] . '?' . $query_result;
    }

    private static function previous(int $currentPage)
    {
        $disabled = ($currentPage == 1) ? 'disabled' : '';
        $link = self::buildLink(1);

        return "<li class='page-item $disabled'><a class='page-link' href='$link'>First</a></li>";
    }

    private static function next(int $currentPage, int $lastPage)
    {
        $disabled = ($currentPage == $lastPage) ? 'disabled' : '';
        $link = self::buildLink($lastPage);

        return "<li class='page-item $disabled'><a class='page-link' href='$link'>Last</a></li>";
    }
}
