@extends('layouts.sideNav')
@section('content')
<div class="container">
    <h2 class="text-center" >QR Page</h2>

    <div class="image-container">
        <img src="{{ asset('images/qr.jpg') }}" alt="QR Code" class="centered-image">
    </div>


</div>

<form id="doneForm" action="{{ route('payments.index') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Done</button>
        </form>
<style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .centered-image {
        max-width: 100%;
        max-height: 100%;
    }

    .fixed-bottom-right {
        position: fixed;
        bottom: 100px;
        right: 20px;
    }
</style>
@endsection