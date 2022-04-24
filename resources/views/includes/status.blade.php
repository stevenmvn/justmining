@if (session('status'))
    <div class="status">
        <img src="{{ asset('images/success.svg') }}" alt="Icone message de confirmation">
        <span>{{ session('status') }}</span>
    </div>
@endif