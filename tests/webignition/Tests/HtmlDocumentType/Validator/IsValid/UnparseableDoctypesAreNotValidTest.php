<?php

namespace webignition\Tests\HtmlDocumentType\Validator\IsValid;

use webignition\Tests\HtmlDocumentType\Validator\BaseTest;

class UnparseableDoctypesAreNotValidTest extends BaseTest {
    
    public function setUp() {
        parent::setUp();
        $this->set = 'unparseable';
        $this->assertFalse($this->getValidator()->isValid($this->getCurrentTestDoctype()));
    }

    public function testNotADoctype() {}
    public function testFootype() {}
    public function testNoUriAndNoFpi() {}
    public function testHtml_401_StrictSystemInsteadOfPublic() {}
    public function testHtml_401_StrictIncorrectlyQuoted() {}
}