<?php

namespace webignition\Tests\HtmlDocumentType\Validator\IsValid;

use webignition\Tests\HtmlDocumentType\Validator\BaseTest;

class IncorrectUriIsNotValidTest extends BaseTest {
    
    public function setUp() {
        parent::setUp();        
        $this->assertFalse($this->getValidator()->isValid(
            str_replace('http://', 'HTTP://', $this->getCurrentTestDoctype())
        ));
    }

    public function testHtml_4_Strict() {}
    public function testHtml_4_Strict_Alternative() {}
    public function testHtml_4_Strict_401_Alternative1() {}
    public function testHtml_4_Strict_401_Alternative2() {}
    public function testHtml_4_Strict_401_Alternative3() {}
    public function testHtml_4_Strict_401_Alternative4() {}
    public function testHtml_4_Transitional() {}
    public function testHtml_4_Transitional_Alternative() {}
    public function testHtml_4_Transitional_401_Alternative1() {}
    public function testHtml_4_Transitional_401_Alternative2() {}
    public function testHtml_4_Transitional_401_Alternative3() {}
    public function testHtml_4_Transitional_401_Alternative4() {} 
    public function testHtml_4_Frameset() {}
    public function testHtml_4_Frameset_Alternative() {}
    public function testHtml_4_Frameset_401_Alternative1() {}
    public function testHtml_4_Frameset_401_Alternative2() {}
    public function testHtml_4_Frameset_401_Alternative3() {}
    public function testHtml_4_Frameset_401_Alternative4() {}     
    public function testHtml_401_Strict() {}
    public function testHtml_401_Strict_Alternative1() {}
    public function testHtml_401_Strict_Alternative2() {}
    public function testHtml_401_Strict_Alternative3() {}
    public function testHtml_401_Transitional() {}
    public function testHtml_401_Transitional_Alternative1() {}
    public function testHtml_401_Transitional_Alternative2() {}
    public function testHtml_401_Transitional_Alternative3() {}
    public function testHtml_401_Frameset() {}
    public function testHtml_401_Frameset_Alternative1() {}
    public function testHtml_401_Frameset_Alternative2() {}
    public function testHtml_401_Frameset_Alternative3() {}    
    public function testXhtml_1_Strict() {}
    public function testXhtml_1_Strict_Alternative1() {}
    public function testXhtml_1_Strict_Alternative2() {}
    public function testXhtml_1_Strict_Alternative3() {}
    public function testXhtml_1_Transitional() {}
    public function testXhtml_1_Transitional_Alternative1() {}
    public function testXhtml_1_Transitional_Alternative2() {}
    public function testXhtml_1_Transitional_Alternative3() {}
    public function testXhtml_1_Frameset() {}
    public function testXhtml_1_Frameset_Alternative1() {}
    public function testXhtml_1_Frameset_Alternative2() {}
    public function testXhtml_1_Frameset_Alternative3() {}    
    public function testXhtml_11() {}
    public function testXhtml_11_Alternative1() {}
    public function testXhtml_11_Alternative2() {}
    public function testXhtml_11_Alternative3() {}
    public function testXhtml_Basic_1() {}
    public function testXhtml_Basic_1_Alternative1() {}
    public function testXhtml_Basic_1_Alternative2() {}
    public function testXhtml_Basic_1_Alternative3() {}
    public function testXhtml_Basic_11() {}
    public function testXhtml_Basic_11_Alternative1() {}
    public function testXhtml_Basic_11_Alternative2() {}
    public function testXhtml_Basic_11_Alternative3() {}    
    public function testXhtml_Print_1() {}
    public function testXhtml_Print_1_Alternative1() {}
    public function testXhtml_Print_1_Alternative2() {}
    public function testXhtml_Print_1_Alternative3() {}
    public function testXhtml_Mobile_1() {}
    public function testXhtml_Mobile_11() {}
    public function testXhtml_Mobile_12() {}
    public function testXhtml_Rdfa_1() {}
    public function testXhtml_Rdfa_11() {}
    public function testXhtml_Aria_1() {}
    public function testXhtml_Aria_1_Alternative() {}
    public function testHtml_Aria_401() {}
    public function testHtml_Rdfa_401_1() {}
    public function testHtml_Rdfa_401_11() {}
    public function testHtml_Rdfalite_401_11() {}
}