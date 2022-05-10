@section('title', 'Test')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
    <body class="antialiased">
        @include('partials.header')
        <main class="main" id="app">
            <section class="container mx-auto">
                <article class="grid grid-cols-2 bg-white w-full">
                    <div>
                        <h1>Spontaan Ploegsporten? Dat kan met Gruppo!</h1>
                    </div>
                    <div>
                        <div id="login" class="@if(Session::has('register_validation_form') == true) hidden @endif">
                        @include('auth.login');
                            <p>{{ __('Nog geen account?') }} <button id="register-trigger">{{ __('Register') }}</button></p>
                        </div>
                    
                        <div id="register" class="@if(Session::has('register_validation_form') == true) active @else hidden @endif">
                        @include('auth.register');
                            <p>{{ __('Al een account?') }} <button id="login-trigger">{{ __('Inloggen') }}</button></p>
                        </div>
                    </div>
                </article>
                <article id="over">
                    <div>
                        <div>
                            <h2>{{ __('Wat is Gruppo?') }}</h2>
                                <p>{{ __('Gruppo is een webapplicatie die 	&#40;een groep&#41; mensen verbindt als ze interesse hebben in dezelfde ploegsport en in een bepaalde radius wonen') }}  </p>
                        </div>
                        <div>
                            <h2>{{ __('Onze missie') }}</h2>
                            <p>{{ __('Ploegsporten meer toegankelijk maken door mensen die geïnteresseerd zijn in dezelfde ploegsport met elkaar te verbinden.') }}</p>
                        </div>
                    </div>
                </article>
                <article id="features">
                    <h2>{{ __('Features') }}</h2>
                    <div>
                        <div>
                            <img src="/storage/icons/ball.svg" alt="gruppo feature teamsports">
                            <p>{{ __('Kies je fevoriete ploegsport uit de lijst van populaire ploegsporten') }}</p>
                        </div>
                        <div>
                            <img src="/storage/icons/location.svg" alt="gruppo feature location">
                            <p>{{ __('Vind een speel in je buurt') }}</p>
                        </div>
                        <div>
                            <img src="/storage/icons/ball.svg" alt="gruppo feature smileys">
                            <p>{{ __('Wordt beste speler en verdiend smileys') }}</p>
                        </div>
                    </div>
                </article>
                <article id="team">
                    <div>
                        <h2>{{ __('Maak kennis met ons team?') }} </h2>
                        <div class="flex justify-center items-center">
                        <div class="card">
                            <div class="img-wrapper team-img border-md">
                                <img class="img" src="/storage/home/michiel.jpg" alt="Michiel webdesigner ux/ui expert Gruppo">
                            </div>
                            <p class="fake-h2">Michiel</p>
                                <p>UI/UX webdesigner</p>
                                <div class="flex space-x-5">
                                <a href="https://machtmaal.be/index.html"  rel="no_opener" target="_blank" rel="author">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </a>
                                    <a href="https://dribbble.com/michiel8x/about" rel="no_opener" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-6 w-6">
                                            <path d="M24 4C12.972066 4 4 12.972074 4 24C4 35.027926 12.972066 44 24 44C35.027934 44 44 35.027926 44 24C44 12.972074 35.027934 4 24 4 z M 24 7C28.142307 7 31.929518 8.4763377 34.875 10.927734C32.122374 13.351092 28.974768 15.323142 25.580078 16.835938C23.811529 13.61959 21.891654 10.500767 19.736328 7.5585938C21.100562 7.2070927 22.524179 7 24 7 z M 16.785156 8.6171875C18.997535 11.542724 20.949628 14.664262 22.746094 17.886719C19.050465 19.170625 15.137713 20 11 20C9.8323552 20 8.6813446 19.922155 7.5390625 19.810547C8.7969115 14.835264 12.230939 10.75149 16.785156 8.6171875 z M 37.001953 13.046875C39.461176 15.964926 40.9535 19.721786 40.992188 23.837891C38.832662 23.296195 36.575941 23 34.25 23C32.4219 23 30.655764 23.235969 28.925781 23.574219C28.323231 22.178362 27.663283 20.821807 26.984375 19.46875C30.643681 17.813906 34.040456 15.676234 37.001953 13.046875 z M 24.177734 20.570312C24.811258 21.821635 25.45011 23.063845 26.015625 24.353516C19.953229 26.24965 14.749259 30.09875 11.257812 35.238281C8.6153572 32.243192 7 28.319322 7 24C7 23.585614 7.0335222 23.180292 7.0625 22.773438C8.3577913 22.906235 9.665848 23 11 23C15.643379 23 20.045102 22.063249 24.177734 20.570312 z M 34.25 26C36.498791 26 38.668342 26.319367 40.738281 26.882812C39.953494 31.489342 37.336086 35.457573 33.644531 38.001953C32.755328 34.064901 31.510607 30.269114 30.085938 26.5625C31.460152 26.325929 32.807024 26 34.25 26 z M 27.091797 27.125C28.662683 31.125628 30.006215 35.241408 30.90625 39.53125C28.795754 40.468547 26.462824 41 24 41C20.010678 41 16.357113 39.622608 13.460938 37.332031C16.608874 32.477365 21.430763 28.841138 27.091797 27.125 z"></path>
                                        </svg>
                                    </a>
                                </div>
                        </div>
                        <div class="card">
                            <div class="img-wrapper team-img border-md">
                                <img class="img" src="/storage/home/marlena.jpg" alt="Marlena webdeveloper front-end back-end Gruppo">
                            </div>
                            <p class="fake-h2">Marlena</p>
                                <p>webdeveloper</p>
                                <div class="flex space-x-5">
                                    <a href="https://machtmaal.be/index.html"  rel="no_opener" target="_blank" rel="author">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </a>
                                    <a href="https://github.com/brovnie"  rel="no_opener" target="_blank" rel="author">
                                        <svg width="24" height="24" fill="currentColor" class=" mr-3 text-opacity-50 transform" stroke-width="2">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.463 2 11.97c0 4.404 2.865 8.14 6.839 9.458.5.092.682-.216.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.337-3.369-1.337-.454-1.151-1.11-1.458-1.11-1.458-.908-.618.069-.606.069-.606 1.003.07 1.531 1.027 1.531 1.027.892 1.524 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.332-2.22-.251-4.555-1.107-4.555-4.927 0-1.088.39-1.979 1.029-2.675-.103-.252-.446-1.266.098-2.638 0 0 .84-.268 2.75 1.022A9.606 9.606 0 0112 6.82c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.372.202 2.386.1 2.638.64.696 1.028 1.587 1.028 2.675 0 3.83-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.332-.012 2.407-.012 2.734 0 .267.18.577.688.48C19.137 20.107 22 16.373 22 11.969 22 6.463 17.522 2 12 2z"></path>
                                        </svg>
                                    </a>
                                </div>
                        </div>
                    </div>
</div>
                </article>
                <article id="contact">
                    <h2 class="heading">{{ __('Contact') }} </h2>
                    <form action="" method="post" class="contact-form">
                        <div class="form-row">
                                <input
                                    type="text"
                                    name="firstName"
                                    placeholder="Voornaam"
                                />
                                <input
                                    type="text"
                                    name="lastName"
                                    placeholder="Achternaam"
                                />
                            </div>
                            <div class="form-row">
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="E-mailadres"
                                />
                            </div>
                            <div class="form-row">
                                <textarea
                                    name="message"
                                    id=""
                                    placeholder="Typ hier je vraag"
                                ></textarea>
                            </div>
                            <input
                                type="submit"
                                value="Verstuur bericht"
                                class="btn"
                            />
                        </form>
                </article>
            </section>
        </main>   
        @include('partials.footer')     
    </body>
</html>
