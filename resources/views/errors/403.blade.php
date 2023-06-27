@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('translate', __('Извините, но для вас доступ к указанному ресурсу ограничен '))
