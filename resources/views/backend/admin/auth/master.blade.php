<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="@if(LaravelLocalization::getCurrentLocale() == 'en') ltr @else rtl @endif">
@include('backend.admin.auth.partials.head')
    @yield('content')
@include('backend.admin.auth.partials.scripts')
</html>
