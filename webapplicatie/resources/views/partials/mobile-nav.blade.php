@auth
<div class="fixed app--manu justify-evenly  " >
    <div class="grid grid-cols-4 w-full md:block md:w-auto mx-4 md:mx-0">
    <div class="pb-8 flex items-center md:block justify-center md:justify-start">
        <a href="/index" class="flex items-center justify-center md:justify-start">
        <div class="img-wrapper img-app-nav md:mr-8">
            <img class="img" src="/storage/icons/home.svg"> 
        </div>   
        <span class="hidden md:inline-block fake-h4">Dashboard</span></a>
    </div>
    <div  class="pb-8 flex items-center justify-center md:justify-start ">
        <a href="/profiles/{{ Auth::user()->username }}/my-events" class="flex items-center justify-center md:justify-start">
        <div class="img-wrapper img-app-nav md:mr-8">
            <img class="img" src="/storage/icons/ball.svg"> 
        </div> 
        <span class="hidden md:inline-block fake-h4">Mijn evenementen</span></a>
    </div>
    <div class="pb-8 flex items-center justify-center md:justify-start md:block">
        <a href="/notifications" class="flex  items-center justify-center md:justify-start">
        <div class="img-wrapper   img-app-nav md:mr-8">
            <img class="img" src="/storage/icons/notifications.svg">  
        </div>
        <span class="hidden md:inline-block fake-h4">Notificaties</span></a>
    </div>
    <div class="pb-8 flex items-center md:block justify-center md:justify-start">
        <a href="/profiles/{{ Auth::user()->username }}"  class="flex  items-center justify-center md:justify-start">
        <div class="img-wrapper img-wrapper--circle profile-img img-app-nav md:mr-5 pr-2 profile-shadow">
                    <img class="img" src="/storage/{{Auth::user()->profile->profil_photo}}">
                </div>
            <span class="hidden md:inline-block fake-h4">Profile</span></a>
    </div>
</div>
    <hr class="py-2 line-behind">
    <div class="pb-8 hidden md:block">
        <a href="/events/create"  class="flex  items-center">
            <span class="fake-h4 btn btn--orange btn--inline pt-fix-5">Oproep maken</span></a>
    </div>
</div>

@endauth
