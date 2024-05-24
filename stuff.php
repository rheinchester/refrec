<?php

public function register()
{
    $this->app->bind('path.public', function(){
        return base_path('public_html')
    })
}