<nav class="nav">
    <img class="nav__logo" src="{{ asset('images/logo.svg') }}" alt="Logo">
    <img class="nav__mobile" src="{{ asset('images/burger.svg') }}" alt="Icone menu mobile">
    <ul class="nav__menu">
        <li class="nav__item"><a href="{{ route('products.index') }}">Explorer nos NFT</a></li>
        <li class="nav__item"><a href="#" class="btn btn__img btn--primary"><img src="{{ asset('images/github.svg') }}" alt="Icone github">Github du projet</a></li>
    </ul>
</nav>