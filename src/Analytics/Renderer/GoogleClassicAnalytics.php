<?php

namespace PhpAb\Analytics\Renderer;

/**
 * This class will only work for Classic Analytics Experiments ran as External
 * @see https://developers.google.com/analytics/devguides/collection/gajs/experiments#cxjs-setchosen
 */
class GoogleClassicAnalytics extends AbstractGoogleAnalytics
{

    /**
     * @var array Test identifiers and variation indexes
     */
    private $participations = [];

    /**
     * @param array $participations
     */
    public function __construct(array $participations)
    {
        $this->participations = $participations;
    }

    /**
     * @inheritDoc
     */
    public function getScript()
    {
        if (empty($this->participations)) {
            return '';
        }

        $script = [];

        $script[] = '<script>';

        foreach ($this->participations as $testIdentifier => $variationIndex) {
            $script[] = "cxApi.setChosenVariation(" . (int) $variationIndex . ", '" . (string) $testIdentifier . "')";
        }

        $script[] = '</script>';

        return implode("\n", $script);
    }

    /**
     * @return @inheritDoc
     */
    public function getParticipations()
    {

        return $this->participations;
    }
}