<?php

namespace App\Observers;

use App\Helpers\CacheHelper;
use Illuminate\Database\Eloquent\Model;

class CacheObserver
{
    /**
     * Handle the model "created" event.
     */
    public function created(Model $model): void
    {
        $this->clearRelatedCaches($model);
    }

    /**
     * Handle the model "updated" event.
     */
    public function updated(Model $model): void
    {
        $this->clearRelatedCaches($model);
    }

    /**
     * Handle the model "deleted" event.
     */
    public function deleted(Model $model): void
    {
        $this->clearRelatedCaches($model);
    }

    /**
     * Clear related caches based on model type
     */
    private function clearRelatedCaches(Model $model): void
    {
        $modelClass = class_basename($model);
        
        switch ($modelClass) {
            case 'Operator':
                CacheHelper::clearModelCache('operator');
                break;
                
            case 'Kecamatan':
                CacheHelper::clearModelCache('kecamatan');
                // Also clear nagaris and jorongs since they depend on kecamatan
                CacheHelper::clearModelCache('nagari');
                CacheHelper::clearModelCache('jorong');
                break;
                
            case 'Nagari':
                CacheHelper::clearModelCache('nagari');
                // Also clear jorongs since they depend on nagari
                CacheHelper::clearModelCache('jorong');
                break;
                
            case 'Jorong':
                CacheHelper::clearModelCache('jorong');
                break;
                
            case 'Opd':
                CacheHelper::clearModelCache('opd');
                break;
                
            case 'Bts':
            case 'Lapor':
                // Clear statistics for these models
                CacheHelper::clearStatistics();
                break;
        }
    }
}