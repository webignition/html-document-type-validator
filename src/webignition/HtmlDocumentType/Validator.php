<?php
namespace webignition\HtmlDocumentType;

class Validator {     

    const DOCTYPE_HTML5_LEGACY_COMPAT_URI = 'about:legacy-compat';
    
    /**
     *
     * @var string
     */
    private $doctypeString = null;
    
    
    /**
     *
     * @var array
     */
    private $fpiList = null;
    
    
    private $fpi = null;
    private $uri = null;
    
    
    /**
     *
     * @var \webignition\HtmlDocumentType\Parser\Parser
     */
    private $parser = null;
    
    
    /**
     *
     * @var \webignition\HtmlDocumentType\Generator
     */
    private $generator = null;
    
    
    /**
     *
     * @var \webignition\HtmlDocumentType\FpiToUriMap
     */
    private $fpiToUriMap = null;
    
    
    /**
     * Is the given doctype 100% valid?
     * Is valid if the FPI is known and the URI matches exactly
     * 
     * @param string $doctypeString
     * @return boolean
     */
    public function isValid($doctypeString) {        
        $this->doctypeString = trim($doctypeString);
        
        try {
            $this->getParser()->setSourceDoctype($this->doctypeString);
            $this->fpi = $this->getParser()->getFpi();
            $this->uri = $this->getParser()->getUri();
        } catch (\RuntimeException $runtimeException) {
            return false;
        }
        
        if (!$this->hasFpi() && ! $this->hasUri()) {
            return true;
        }
        
        if ($this->hasValidFpi() && !$this->hasUri()) {
            return true;
        }
        
        if (!$this->hasFpi() && $this->uri === self::DOCTYPE_HTML5_LEGACY_COMPAT_URI) {
            return true;
        }
        
        return $this->hasValidUriForFpi();
    }    
    
    
    /**
     * 
     * @return boolean
     */
    private function hasValidFpi() {
        if (is_null($this->fpi)) {
            return false;
        }
        
        return in_array($this->fpi, $this->getFpiList());
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function hasValidUriForFpi() {        
        return in_array($this->uri, $this->getFpiToUriMap()->getForFpi($this->fpi));
    }
    
    
    /**
     * 
     * @return array
     */
    private function getFpiList() {
        if (is_null($this->fpiList)) {
            $this->fpiList = $this->getGenerator()->getFpis();
        }
        
        return $this->fpiList;
    }
    
    
    /**
     * 
     * @return \webignition\HtmlDocumentType\Generator
     */
    private function getGenerator() {
        if (is_null($this->generator)) {
            $this->generator = new Generator();            
        }
        
        return $this->generator;
    }

    /**
     * 
     * @return boolean
     */
    private function hasFpi() {
        return !is_null($this->fpi);
    }    
    
    
    /**
     * 
     * @return boolean
     */
    private function hasUri() {
        return !is_null($this->uri);
    }
    
    
    /**
     * 
     * @return \webignition\HtmlDocumentType\Parser\Parser
     */
    private function getParser() {
        if (is_null($this->parser)) {
            $this->parser = new \webignition\HtmlDocumentType\Parser\Parser();
        }
        
        return $this->parser;
    }
    
    
    /**
     * 
     * @return \webignition\HtmlDocumentType\FpiToUriMap
     */
    private function getFpiToUriMap() {
        if (is_null($this->fpiToUriMap)) {
            $this->fpiToUriMap = new FpiToUriMap();
        }
        
        return $this->fpiToUriMap;
    }
    
}