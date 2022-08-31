<?php

namespace App\Traits;

/**
 * To manage image saving and update of models the implements spatie media
 */
trait ImageManager
{
    /**
     * To store image with input name 'image'
     * @param $model
     * @param $request
     * @param string $collectionName
     * @return void
     */
    public static function onStore($model, $request, string $collectionName): void
    {
        if ($request->hasFile('image') && $request->file('image')?->isValid()) {
            $model->addMediaFromRequest('image')->toMediaCollection($collectionName);
        }
    }

    /**
     * to store an image with precise image input name
     * @param string $file
     * @param $model
     * @param $request
     * @param string $collectionName
     * @return void
     */
    public static function onStoreFile(string $file, $model, $request, string $collectionName): void
    {
        if ($request->hasFile($file) && $request->file($file)?->isValid()) {
            $model->addMediaFromRequest($file)->toMediaCollection($collectionName);
        }
    }

    /**
     * to update an image with input name 'image'
     * @param $model
     * @param $request
     * @param string $collectionName
     * @return void
     */
    public static function onUpdate($model, $request, string $collectionName): void
    {
        if ($request->hasFile('image')) {
            $model->clearMediaCollection($collectionName . '-images');
            $model->addMediaFromRequest('image')->toMediaCollection($collectionName);
        }
    }

    /**
     * to update an image with precise image input name
     * @param $model
     * @param $request
     * @param $collectionName
     * @return void
     */
    public static function onUpdateFile($model, $request, $collectionName): void
    {
        if ($request->hasFile('image')) {
            $model->clearMediaCollection($collectionName . '-images');
            $model->addMediaFromRequest('image')->toMediaCollection($collectionName);
        }
    }

    public function getSmallImg($collectionName): string|null
    { return $this->getFirstMedia($collectionName)?->getUrl('small-thumb');  }

    public function getMediumImg($collectionName): string|null
    { return $this->getFirstMedia($collectionName)?->getUrl('medium-thumb');  }

    public function getImg($collectionName): string|null
    { return $this->getFirstMedia($collectionName)?->getUrl();  }

}
