<?php
return[
    'name'=>'required|string|max:10',
    'last_name'=>'required|string|max:15',
    'email'=>'required|string|email|max:255',
    'password' => 'required|string|min:6',

];