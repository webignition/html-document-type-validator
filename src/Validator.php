<?php

namespace webignition\HtmlDocumentType;

use webignition\HtmlDocumentType\Parser\Parser;

class Validator
{
    const DOCTYPE_HTML5_LEGACY_COMPAT_URI = 'about:legacy-compat';

    const MODE_STRICT = 'strict';
    const MODE_IGNORE_FPI_URI_VALIDITY = 'loose';

    /**
     * @var string
     */
    private $doctypeString = null;

    /**
     * @var array
     */
    private $fpiList = null;

    /**
     * @var string
     */
    private $fpi = null;

    /**
     * @var string
     */
    private $uri = null;

    /**
     * @var Parser
     */
    private $parser = null;

    /**
     * @var Generator
     */
    private $generator = null;

    /**
     * @var FpiToUriMap
     */
    private $fpiToUriMap = null;

    /**
     * @var string
     */
    private $mode = self::MODE_STRICT;

    /**
     * @param $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * Is the given doctype 100% valid?
     * Is valid if the FPI is known and the URI matches exactly
     *
     * @param string $doctypeString
     *
     * @return bool
     */
    public function isValid($doctypeString)
    {
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

        if (self::MODE_IGNORE_FPI_URI_VALIDITY === $this->mode) {
            return true;
        }

        return $this->hasValidUriForFpi();
    }

    /**
     *
     * @return bool
     */
    private function hasValidFpi()
    {
        if (is_null($this->fpi)) {
            return false;
        }

        return in_array($this->fpi, $this->getFpiList());
    }

    /**
     * @return bool
     */
    private function hasValidUriForFpi()
    {
        return in_array($this->uri, $this->getFpiToUriMap()->getForFpi($this->fpi));
    }

    /**
     * @return array
     */
    private function getFpiList()
    {
        if (is_null($this->fpiList)) {
            $this->fpiList = $this->getGenerator()->getFpis();
        }

        return $this->fpiList;
    }

    /**
     * @return Generator
     */
    private function getGenerator()
    {
        if (is_null($this->generator)) {
            $this->generator = new Generator();
        }

        return $this->generator;
    }

    /**
     * @return bool
     */
    private function hasFpi()
    {
        return !is_null($this->fpi);
    }

    /**
     * @return bool
     */
    private function hasUri()
    {
        return !is_null($this->uri);
    }

    /**
     * @return Parser
     */
    private function getParser()
    {
        if (is_null($this->parser)) {
            $this->parser = new Parser();
        }

        return $this->parser;
    }

    /**
     * @return FpiToUriMap
     */
    private function getFpiToUriMap()
    {
        if (is_null($this->fpiToUriMap)) {
            $this->fpiToUriMap = new FpiToUriMap();
        }

        return $this->fpiToUriMap;
    }
}
