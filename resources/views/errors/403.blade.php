@extends('errors::minimal')

@section('title', __('Zugriff verboten'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Der Zugriff auf diese Seite ist verboten.'))
