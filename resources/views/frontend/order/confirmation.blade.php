@extends('frontend.layout.app')

@section('title')

confirmation page

@endsection

@section('content')

<h1>order confirmation page</h1>

<a href="{{ route('invoice.view-pdf', ['id' => $order->id]) }}">View Invoice</a>



@endsection
