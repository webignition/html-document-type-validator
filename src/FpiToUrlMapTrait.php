<?php

namespace webignition\HtmlDocumentType;

trait FpiToUrlMapTrait
{
    /**
     * @var array
     */
    private $fpiToUriMap = [
        FpiList::FPI_HTML_4_STRICT => [
            UriList::URI_HTML_4_STRICT,
            UriList::URI_HTML_4_01_STRICT,
        ],
        FpiList::FPI_HTML_4_TRANSITIONAL => [
            UriList::URI_HTML_4_TRANSITIONAL,
            UriList::URI_HTML_4_01_TRANSITIONAL,
        ],
        FpiList::FPI_HTML_4_FRAMESET => [
            UriList::URI_HTML_4_FRAMESET,
            UriList::URI_HTML_4_01_FRAMESET,
        ],
        FpiList::FPI_HTML_4_01_STRICT => [
            UriList::URI_HTML_4_01_STRICT,
        ],
        FpiList::FPI_HTML_4_01_TRANSITIONAL => [
            UriList::URI_HTML_4_01_TRANSITIONAL,
        ],
        FpiList::FPI_HTML_4_01_FRAMESET => [
            UriList::URI_HTML_4_01_FRAMESET,
        ],
        FpiList::FPI_HTML_4_01_ARIA => [
            UriList::URI_HTML_ARIA_4_01_1
        ],
        FpiList::FPI_HTML_4_01_RDFA_1 => [
            UriList::URI_HTML_RDFA_4_01_1
        ],
        FpiList::FPI_HTML_4_01_RDFA_1_1 => [
            UriList::URI_HTML_RDFA_4_01_1_1
        ],
        FpiList::FPI_HTML_4_01_RDFALITE_1_1 => [
            UriList::URI_HTML_RDFALITE_4_01_1_1
        ],
        FpiList::FPI_XHTML_1_STRICT => [
            UriList::URI_XHTML_1_STRICT,
        ],
        FpiList::FPI_XHTML_1_TRANSITIONAL => [
            UriList::URI_XHTML_1_TRANSITIONAL,
        ],
        FpiList::FPI_XHTML_1_FRAMESET => [
            UriList::URI_XHTML_1_FRAMESET,
        ],
        FpiList::FPI_XHTML_1_BASIC => [
            UriList::URI_XHTML_BASIC_1,
        ],
        FpiList::FPI_XHTML_1_PRINT => [
            UriList::URI_XHTML_PRINT_1,
        ],
        FpiList::FPI_XHTML_MOBILE_1 => [
            UriList::URI_XHTML_MOBILE_1
        ],
        FpiList::FPI_XHTML_MOBILE_1_1 => [
            UriList::URI_XHTML_MOBILE_1_1
        ],
        FpiList::FPI_XHTML_MOBILE_1_2 => [
            UriList::URI_XHTML_MOBILE_1_2
        ],
        FpiList::FPI_XHTML_1_1 => [
            UriList::URI_XHTML_1_1,
        ],
        FpiList::FPI_XHTML_1_1_BASIC => [
            UriList::URI_XHTML_BASIC_1_1,
        ],
        FpiList::FPI_XHTML_RDFA_1 => [
            UriList::URI_XHTML_RDFA_1
        ],
        FpiList::FPI_XHTML_RDFA_1_1 => [
            UriList::URI_XHTML_RDFA_1_1
        ],
        FpiList::FPI_XHTML_ARIA_1 => [
            UriList::URI_XHTML_ARIA_1,
        ],
    ];
}
