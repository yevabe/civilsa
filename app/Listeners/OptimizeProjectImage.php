<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OptimizeProjectImage implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectSaved  $event
     * @return void
     */
    public function handle(ProjectSaved $event)
    {
        //Disparar un error en la optimización
        //throw new \Exception("Error optimizing the image", 1);

        //Optimización de imagen
        $image = Image::make(Storage::get($event->project->image))
            ->widen(600)
            ->limitColors(255)
            ->encode();

        Storage::put($event->project->image, (string) $image);
    }
}
