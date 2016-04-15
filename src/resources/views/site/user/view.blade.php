@extends('ooglee-user::site.layouts.index')
@section('content')
   {{var_dump($user->getMetaDescription())}}
   {{var_dump($user->present()->createdAtDate())}}
   {{var_dump($user->present()->viewLink())}}
@stop