@if(App\Models\About\Information\Description::getDescription()['whatsapp'])
    <div class="fe-wa-phone fe-wa-green fe-wa-static">
        <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^0-9]/', '', App\Models\About\Information\Description::getDescription()['whatsapp']) }}" target="_blank">
            <div class="fe-wa-circle"></div>
            <div class="fe-wa-circle-fill"></div>
            <div class="fe-wa-img"></div>
        </a>
    </div>
@endif
