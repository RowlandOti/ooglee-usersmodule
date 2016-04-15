@extends('ooglee-user::site.layouts.index')
@section('content')
   {{var_dump($response->toJson())}}
   

   {{ $response->each(function($user)
   {
   		var_dump($user->present()->createdAtDate());
   		var_dump($user->present()->viewLink());
   }
   ) }}
@stop