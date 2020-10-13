<?php

use Illuminate\Support\Facades\Blade;

// directive
Blade::directive('test_directive', function($val){
    return 'Test Text directive' . $val;
});

// Blade if  ---> call in Welcome
Blade::if('check', function(){
    return auth()->check();
});