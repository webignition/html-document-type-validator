<?php

namespace webignition\Tests\HtmlDocumentType\Validator;

use webignition\HtmlDocumentType\Validator;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValidFailureNoMatchingParser()
    {
        $validator = new Validator();
        $this->assertFalse($validator->isValid('<!DOCTYPE html PUBLIC>'));
    }

    /**
     * @dataProvider docTypeDataProvider
     *
     * @param string $docTypeString
     */
    public function testIsValidSuccessStrictMode($docTypeString)
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid($docTypeString));
    }

    /**
     * @dataProvider isValidSuccessLooseModeDataProvider
     *
     * @param string $docTypeString
     */
    public function testIsValidSuccessLooseMode($docTypeString)
    {
        $validator = new Validator();
        $validator->setMode(Validator::MODE_IGNORE_FPI_URI_VALIDITY);

        $this->assertTrue($validator->isValid($docTypeString));
    }

    /**
     * @return array
     */
    public function isValidSuccessLooseModeDataProvider()
    {
        $dataSet = $this->docTypeDataProvider();

        foreach ($dataSet as $key => $value) {
            $value['docTypeString'] = preg_replace(
                '/http:\/\/.+$/i',
                'http://foo.example.com/foo.dtd">',
                $value['docTypeString']
            );
            $dataSet[$key] = $value;
        }

        return $dataSet;
    }

    /**
     * @dataProvider isValidFailureIncorrectFpiDataProvider
     *
     * @param string $docTypeString
     */
    public function testIsValidFailureIncorrectFpi($docTypeString)
    {
        $validator = new Validator();
        $this->assertFalse($validator->isValid($docTypeString));
    }

    /**
     * @return array
     */
    public function isValidFailureIncorrectFpiDataProvider()
    {
        $dataSet = $this->docTypeDataProvider();

        foreach ($dataSet as $key => $value) {
            $value['docTypeString'] = str_replace('DTD', 'foo', $value['docTypeString']);
            $dataSet[$key] = $value;
        }

        unset($dataSet['html-5']);
        unset($dataSet['html-5-legacy-compat']);

        return $dataSet;
    }

    /**
     * @return array
     */
    public function docTypeDataProvider()
    {
        return [
            'html-2' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//IETF//DTD HTML//EN">',
            ],
            'html-32' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">',
            ],
            'html-4-strict' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC '
                    .'"-//W3C//DTD HTML 4.0//EN" '
                    .'"http://www.w3.org/TR/1998/REC-html40-19980424/strict.dtd">',
            ],
            'html-4-transitional' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC '
                    .'"-//W3C//DTD HTML 4.0 Transitional//EN" '
                    .'"http://www.w3.org/TR/1998/REC-html40-19980424/loose.dtd">',
            ],
            'html-4-frameset' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN" '
                    .'"http://www.w3.org/TR/1998/REC-html40-19980424/frameset.dtd">',
            ],
            'html-401-strict' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" '
                    .'"http://www.w3.org/TR/html4/strict.dtd">',
            ],
            'html-401-transitional' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" '
                    .'"http://www.w3.org/TR/html4/loose.dtd">',
            ],
            'html-401-frameset' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" '
                    .'"http://www.w3.org/TR/html4/frameset.dtd">',
            ],
            'html-5' => [
                'docTypeString' => '<!DOCTYPE html>',
            ],
            'html-5-legacy-compat' => [
                'docTypeString' => '<!DOCTYPE html SYSTEM "about:legacy-compat">',
            ],
            'xhtml-1-strict' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" '
                    .'"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
            ],
            'xhtml-1-transitional' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" '
                    .'"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
            ],
            'xhtml-1-frameset' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" '
                    .'"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
            ],
            'xhtml-11' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" '
                    .'"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
            ],
            'xhtml+basic-1' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.0//EN" '
                    .'"http://www.w3.org/TR/xhtml-basic/xhtml-basic10.dtd">',
            ],
            'xhtml+basic-11' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" '
                    .'"http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">',
            ],
            'xhtml+print-1' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML-Print 1.0//EN" '
                    .'"http://www.w3.org/TR/xhtml-print/DTD/xhtml-print10.dtd">',
            ],
            'xhtml+mobile-1' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" '
                    .'"http://www.wapforum.org/DTD/xhtml-mobile10.dtd">',
            ],
            'xhtml+mobile-11' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.1//EN" '
                    .'"http://www.openmobilealliance.org/tech/DTD/xhtml-mobile11.dtd">',
            ],
            'xhtml+mobile-12' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" '
                    .'"http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">',
            ],
            'xhtml+rdfa-1' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" '
                    .'"http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">',
            ],
            'xhtml+rdfa-11' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.1//EN" '
                    .'"http://www.w3.org/MarkUp/DTD/xhtml-rdfa-2.dtd">',
            ],
            'xhtml+aria-1' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+ARIA 1.0//EN" '
                    .'"http://www.w3.org/WAI/ARIA/schemata/xhtml-aria-1.dtd">',
            ],
            'html+aria-401' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+ARIA 1.0//EN" '
                    .'"http://www.w3.org/WAI/ARIA/schemata/html4-aria-1.dtd">',
            ],
            'html+rdfa-401-1' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01+RDFa 1.0//EN" '
                    .'"http://www.w3.org/MarkUp/DTD/html401-rdfa-1.dtd">',
            ],
            'html+rdfa-401-11' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01+RDFa 1.1//EN" '
                    .'"http://www.w3.org/MarkUp/DTD/html401-rdfa11-1.dtd">',
            ],
            'html+rdfalite-401-11' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01+RDFa Lite 1.1//EN" '
                    .'"http://www.w3.org/MarkUp/DTD/html401-rdfalite11-1.dtd">',
            ],
            'html+iso15445-1' => [
                'docTypeString' => '<!DOCTYPE html PUBLIC "ISO/IEC 15445:2000//DTD HTML//EN">',
            ],
        ];
    }
}