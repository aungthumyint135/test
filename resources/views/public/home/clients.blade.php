<div class="flex flex-col lg:gap-[64px]">
    <span class="font-extrabold text-[40px] pb-12 lg:pb-2 mx-auto">Clients</span>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[64px] p-[20px]">

        @if(count($clients) == 0)
            <span> Clients are not added yet.</span>
            @else
            @foreach($clients as $client)
                <div class="w-[200px] lg:h-[200px]">
                    <img src="{{asset('storage/'.$client?->image)}}" class=" mx-auto w-[200px] h-[150px] " alt={{$client->name}} />
                </div>
            @endforeach
            @endif
{{--        <div class="w-[200px] lg:h-[200px]">--}}
{{--            <img src="{{asset('images/portal/j-hotel.png')}}" class=" mx-auto" alt="MCT Logo" />--}}
{{--        </div>--}}
{{--        <div class="w-[200px] lg:h-[200px]">--}}
{{--            <img src="{{asset('images/portal/red-house.png')}}" class=" mx-auto" alt="MCT Logo" />--}}
{{--        </div>--}}
{{--        <div class="w-[200px] lg:h-[200px]">--}}
{{--            <img src="{{asset('images/portal/poh-heng.png')}}" class=" mx-auto" alt="MCT Logo" />--}}
{{--        </div>--}}
{{--        <div class="w-[200px] lg:h-[200px]">--}}
{{--            <img src="{{asset('images/portal/philipp.png')}}" class=" mx-auto" alt="MCT Logo" />--}}
{{--        </div>--}}
{{--        <div class="w-[200px] lg:h-[200px]">--}}
{{--            <img src="{{asset('images/portal/uomo.png')}}" class=" mx-auto" alt="MCT Logo" />--}}
{{--        </div>--}}
{{--        <div class="w-[200px] lg:h-[200px]">--}}
{{--            <img src="{{asset('images/portal/the-bespoke.png')}}" class=" mx-auto" alt="MCT Logo" />--}}
{{--        </div>--}}
{{--        <div class="w-[200px] lg:h-[200px]">--}}
{{--            <img src="{{asset('images/portal/stefano.png')}}" class=" mx-auto" alt="MCT Logo" />--}}
{{--        </div>--}}
    </div>
</div>
