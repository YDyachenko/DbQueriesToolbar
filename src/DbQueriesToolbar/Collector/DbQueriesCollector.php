<?php

namespace DbQueriesToolbar\Collector;

use ZendDeveloperTools\Collector\CollectorInterface;
use Zend\Mvc\MvcEvent;
use Zend\Db\Adapter\Profiler\ProfilerInterface;

class DbQueriesCollector implements CollectorInterface
{

    /**
     * @var ProfilerInterface
     */
    protected $profiler;

    /**
     * @var array
     */
    protected $profiles = [];

    /**
     * @var int
     */
    protected $totalQueries = 0;

    /**
     * @var float
     */
    protected $totalTime = 0.0;

    /**
     * @param ProfilerInterface $profiler
     * @return DbQueriesCollector
     */
    public function setProfiler(ProfilerInterface $profiler)
    {
        $this->profiler = $profiler;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasProfiler()
    {
        return $this->profiler instanceof ProfilerInterface;
    }

    /**
     * @return ProfilerInterface
     */
    public function getProfiler()
    {
        return $this->profiler;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dbqueries.toolbar';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return 10;
    }

    /**
     * {@inheritdoc}
     */
    public function collect(MvcEvent $mvcEvent)
    {
        if (! $this->hasProfiler()) {
            return;
        }

        $this->profiles = $this->profiler->getProfiles();

        foreach ($this->profiles as $profile) {
            $this->totalQueries++;
            $this->totalTime += $profile['elapse'];
        }
    }

    /**
     * @return array
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @return int
     */
    public function getTotalQueries()
    {
        return $this->totalQueries;
    }

    /**
     * @return float
     */
    public function getTotalTime()
    {
        return $this->totalTime;
    }
}
