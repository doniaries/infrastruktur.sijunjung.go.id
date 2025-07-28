<?php

namespace App\Traits;

trait LazyLoadable
{
    public $readyToLoad = false;

    /**
     * Load the component data
     */
    public function loadData()
    {
        $this->readyToLoad = true;
    }

    /**
     * Check if component is ready to load
     */
    public function isReadyToLoad()
    {
        return $this->readyToLoad;
    }

    /**
     * Render skeleton or loading state
     */
    public function renderSkeleton($count = 5)
    {
        return view('components.skeleton', compact('count'));
    }
}