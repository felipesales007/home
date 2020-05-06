<!-- notificação -->
@if (session('notify') || isset($notify))
    <script>window.onload = function () { notify(JSON.parse('{!! $notify ?? session('notify') !!}')) }</script>
@endif

<!-- ajax jquery -->
<script src="{{ asset('js/jquery/ajax.jquery.min.js') }}"></script>
