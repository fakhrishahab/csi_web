<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Presenters
    |--------------------------------------------------------------------------
    |
    | Define your objects and their corrosponding presenters here to have them
    | automatically decorated when resolved in a view. The array key should
    | be your object and the value will be the presenter. Remember to use
    | the class names and not actual instances.
    |
    */

    csi\Page::class => csi\Presenters\PagePresenter::class,
    csi\Post::class => csi\Presenters\PostPresenter::class,
    csi\User::class => csi\Presenters\UserPresenter::class,
];
