<?php

namespace PhpAb;

use PhpAb\Participation\Strategy\StrategyInterface;

/**
 * The definition of a test.
 */
class AbTest
{
    /**
     * The name of the test.
     *
     * @var string
     */
    private $name;

    /**
     * The callback that should be executed when the A-case is executed.
     *
     * @var callback
     */
    private $callbackA;

    /**
     * The callback that should be executed when the B-case is executed.
     *
     * @var callback
     */
    private $callbackB;

    /**
     * A strategy that decides wheter case A or case B should be executed.
     *
     * @var StrategyInterface
     */
    private $participationStrategy;

    /**
     * Initializes a new instance of this class.
     *
     * @param string $name The name of the test case.
     * @param callable $callbackA The A-case callback.
     * @param callable $callbackB The B-case callback.
     * @param StrategyInterface $participationStrategy The strategy that decides the case to execute.
     */
    public function __construct(
        $name,
        callable $callbackA,
        callable $callbackB,
        StrategyInterface $participationStrategy = null
    ) {
        $this->name = $name;
        $this->callbackA = $callbackA;
        $this->callbackB = $callbackB;
        $this->participationStrategy = $participationStrategy;
    }

    /**
     * Gets the name of this test.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the A-case callback of this test.
     *
     * @return callable
     */
    public function getCallbackA()
    {
        return $this->callbackA;
    }

    /**
     * Gets the B-case callback of this test.
     *
     * @return callable
     */
    public function getCallbackB()
    {
        return $this->callbackB;
    }

    /**
     * Gets the participation strategy.
     *
     * @return StrategyInterface
     */
    public function getParticipationStrategy()
    {
        return $this->participationStrategy;
    }
}