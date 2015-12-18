@extends('emails.layouts.default')
@section('content')

<p>The Following Post Has been Flagged</p>

ID#: {{ $id }} 
Title: {{ $title }}

@stop