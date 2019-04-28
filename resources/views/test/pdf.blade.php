kjsandkjasndkjasndkjasdnaksndakjsdnaksjdnaksjdnakjsdnaksjdnakjsdnaksjdnakjsdnajksdna



@php
    View::composer('*', function($view){
        View::share('view_name', $view->getName());
    });
@endphp
    {{ Html::linkAction('updateController@pdf', 'PDF', ['test.pdf'], ['class'=>'btn btn-primary pull-right mgright10']) }}