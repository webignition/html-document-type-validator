<?php

namespace webignition\Tests\HtmlDocumentType\Validator;

use webignition\HtmlDocumentType\Validator;

abstract class BaseTest extends \PHPUnit_Framework_TestCase {  
    
    
    private $doctypeList = array(
        'html-2' => '<!DOCTYPE html PUBLIC "-//IETF//DTD HTML//EN">',
        'html-2-alternative' => '<!DOCTYPE html PUBLIC "-//IETF//DTD HTML 2.0//EN">',
        'html-32' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">',
        'html-32-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">',
        'html-32-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Draft//EN">',
        'html-4-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/strict.dtd">',
        'html-4-strict-alternative' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40-971218/strict.dtd">',
        'html-4-strict-401-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/strict.dtd">',
        'html-4-strict-401-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/strict.dtd">',
        'html-4-strict-401-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/strict.dtd">',
        'html-4-strict-401-alternative4' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/strict.dtd">',
        'html-4-transitional' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/loose.dtd">',
        'html-4-transitional-alternative' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40-971218/loose.dtd">',
        'html-4-transitional-401-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/loose.dtd">',
        'html-4-transitional-401-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/loose.dtd">',
        'html-4-transitional-401-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/loose.dtd">',
        'html-4-transitional-401-alternative4' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/loose.dtd">',
        'html-4-frameset' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/frameset.dtd">',
        'html-4-frameset-alternative' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN" "http://www.w3.org/TR/REC-html40-971218/frameset.dtd">',
        'html-4-frameset-401-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/frameset.dtd">',
        'html-4-frameset-401-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/frameset.dtd">',
        'html-4-frameset-401-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/frameset.dtd">',
        'html-4-frameset-401-alternative4' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN" "http://www.w3.org/TR/1998/REC-html40-19980424/frameset.dtd">',
        'html-401-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
        'html-401-strict-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">',
        'html-401-strict-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">',
        'html-401-strict-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html40/strict.dtd">',
        'html-401-transitional' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
        'html-401-transitional-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">',
        'html-401-transitional-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">',
        'html-401-transitional-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html40/loose.dtd">',
        'html-401-frameset' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">',
        'html-401-frameset-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/REC-html40/frameset.dtd">',
        'html-401-frameset-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/frameset.dtd">',
        'html-401-frameset-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html40/frameset.dtd">',
        'html-5' => '<!DOCTYPE html>',
        'html-5-legacy-compat' => '<!DOCTYPE html SYSTEM "about:legacy-compat">',
        'xhtml-1-strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
        'xhtml-1-strict-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/2002/REC-xhtml1-20020801/DTD/xhtml1-strict.dtd">',
        'xhtml-1-strict-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-strict.dtd">',
        'xhtml-1-strict-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/MarkUp/DTD/xhtml1-strict.dtd">',
        'xhtml-1-transitional' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
        'xhtml-1-transitional-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2002/REC-xhtml1-20020801/DTD/xhtml1-transitional.dtd">',
        'xhtml-1-transitional-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-transitional.dtd">',
        'xhtml-1-transitional-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/MarkUp/DTD/xhtml1-transitional.dtd">',
        'xhtml-1-frameset' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
        'xhtml-1-frameset-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/2002/REC-xhtml1-20020801/DTD/xhtml1-frameset.dtd">',
        'xhtml-1-frameset-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-frameset.dtd">',
        'xhtml-1-frameset-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/MarkUp/DTD/xhtml1-frameset.dtd">',
        'xhtml-11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
        'xhtml-11-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml11.dtd">',
        'xhtml-11-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/2010/REC-xhtml11-20101123/DTD/xhtml11.dtd">',
        'xhtml-11-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/2001/REC-xhtml11-20010531/DTD/xhtml11.dtd">',
        'xhtml-basic-1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic10.dtd">',
        'xhtml-basic-1-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" "http://www.w3.org/TR/2010/REC-xhtml-basic-20101123/xhtml-basic10.dtd">',
        'xhtml-basic-1-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" "http://www.w3.org/TR/2008/REC-xhtml-basic-20080729/xhtml-basic10.dtd">',
        'xhtml-basic-1-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-basic10.dtd">',
        'xhtml-basic-11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">',
        'xhtml-basic-11-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/2010/REC-xhtml-basic-20101123/xhtml-basic11.dtd">',
        'xhtml-basic-11-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/2008/REC-xhtml-basic-20080729/xhtml-basic11.dtd">',
        'xhtml-basic-11-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml-basic11.dtd">',
        'xhtml-print-1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN" "http://www.w3.org/TR/xhtml-print/DTD/xhtml-print10.dtd">',
        'xhtml-print-1-alternative1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN" "http://www.w3.org/TR/2010/REC-xhtml-print-20101123/DTD/xhtml-print10.dtd">',
        'xhtml-print-1-alternative2' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN" "http://www.w3.org/TR/2006/REC-xhtml-print-20060920/DTD/xhtml-print10.dtd">',
        'xhtml-print-1-alternative3' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-print10.dtd">',
        'xhtml-mobile-1' => '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">',
        'xhtml-mobile-11' => '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.1//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile11.dtd">',
        'xhtml-mobile-12' => '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">',
        'xhtml-rdfa-1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">',
        'xhtml-rdfa-11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-2.dtd">',
        'xhtml-aria-1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN" "http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">',
        'xhtml-aria-1-alternative' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-aria-1.dtd">',
        'html-aria-401' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+ARIA 1.0//EN" "http://www.w3.org/WAI/ARIA/schemata/html4-aria-1.dtd">',
        'html-rdfa-401-1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/html401-rdfa-1.dtd">',
        'html-rdfa-401-11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01+RDFa 1.1//EN" "http://www.w3.org/MarkUp/DTD/html401-rdfa11-1.dtd">',
        'html-rdfalite-401-11' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01+RDFa Lite 1.1//EN" "http://www.w3.org/MarkUp/DTD/html401-rdfalite11-1.dtd">',
        'html-iso15445-1' => '<!DOCTYPE html PUBLIC "ISO/IEC 15445:2000//DTD HTML//EN">',
        'html-iso15445-1-alternative' => '<!DOCTYPE html PUBLIC "ISO/IEC 15445:2000//DTD HyperText Markup Language//EN">',
    );

    /**
     *
     * @var \webignition\HtmlDocumentType\Validator
     */
    private $validator;   
 
    
    public function setUp() {        
        $this->validator = new Validator();        
    }
    
    /**
     * 
     * @return \webignition\HtmlDocumentType\Validator
     */
    protected function getValidator() {
        return $this->validator;
    }
    
    /**
     * 
     * @return string
     */
    protected function getKey() {
        return \ICanBoogie\hyphenate(str_replace('test', '', $this->getName()));        
    }  
    
    
    protected function getCurrentTestDoctype() {
        return $this->doctypeList[$this->getKey()];
    }
    
}