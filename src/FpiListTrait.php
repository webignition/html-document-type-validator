<?php

namespace webignition\HtmlDocumentType;

trait FpiListTrait
{
    /**
     * @var array
     */
    private $fpiList = [
        'html-2' => FpiList::FPI_HTML_2,
        'html-2-alternative' => FpiList::FPI_HTML_2_ALTERNATIVE,
        'html-32' => FpiList::FPI_HTML_3_2,
        'html-32-alternative1' => FpiList::FPI_HTML_3_2_ALTERNATIVE1,
        'html-32-alternative2' => FpiList::FPI_HTML_3_2_ALTERNATIVE2,
        'html-4-strict' => FpiList::FPI_HTML_4_STRICT,
        'html-4-transitional' => FpiList::FPI_HTML_4_TRANSITIONAL,
        'html-4-frameset' => FpiList::FPI_HTML_4_FRAMESET,
        'html-401-strict' => FpiList::FPI_HTML_4_01_STRICT,
        'html-401-transitional' => FpiList::FPI_HTML_4_01_TRANSITIONAL,
        'html-401-frameset' => FpiList::FPI_HTML_4_01_FRAMESET,
        'html+aria-401' => FpiList::FPI_HTML_4_01_ARIA,
        'html+rdfa-401-1' => FpiList::FPI_HTML_4_01_RDFA_1,
        'html+rdfa-401-11' => FpiList::FPI_HTML_4_01_RDFA_1_1,
        'html+rdfalite-401-11' => FpiList::FPI_HTML_4_01_RDFALITE_1_1,
        'html+iso15445-1' => FpiList::FPI_HTML_ISO_15445,
        'html+iso15445-1-alternative' => FpiList::FPI_HTML_ISO_15445_ALTERNATIVE,
        'xhtml-1-strict' => FpiList::FPI_XHTML_1_STRICT,
        'xhtml-1-transitional' => FpiList::FPI_XHTML_1_TRANSITIONAL,
        'xhtml-1-frameset' => FpiList::FPI_XHTML_1_FRAMESET,
        'xhtml+basic-1' => FpiList::FPI_XHTML_1_BASIC,
        'xhtml+print-1' => FpiList::FPI_XHTML_1_PRINT,
        'xhtml+mobile-1' => FpiList::FPI_XHTML_MOBILE_1,
        'xhtml+mobile-11' => FpiList::FPI_XHTML_MOBILE_1_1,
        'xhtml+mobile-12' => FpiList::FPI_XHTML_MOBILE_1_2,
        'xhtml-11' => FpiList::FPI_XHTML_1_1,
        'xhtml+basic-11' => FpiList::FPI_XHTML_1_1_BASIC,
        'xhtml+rdfa-1' => FpiList::FPI_XHTML_RDFA_1,
        'xhtml+rdfa-11' => FpiList::FPI_XHTML_RDFA_1_1,
        'xhtml+aria-1' => FpiList::FPI_XHTML_ARIA_1
    ];
}
