@extends('errors::minimal')

@section('title', __('Server-Fehler'))
@section('code', '500')
@section('message', __('Ihre Anfrage an den Server konnte nicht verarbeitet werden.'))
