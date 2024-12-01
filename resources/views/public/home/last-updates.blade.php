<div class="flex flex-col gap-[32px] md:gap-[64px]">

    <span class="font-extrabold text-[25px] md:text-[40px] mx-auto">Latest Updates</span>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-[32px] p-[20px]">

        @if(count($news) > 0)
            @foreach($news as $new)
                <div class="flex flex-col gap-[16px] p-[16px] border-2 shadow rounded-[20px]">
                    <div class="w-full">
                        <img src="{{asset('storage/'.$new?->image)}}" class="w-full" alt="Latest Updates" />
                    </div>
                    <p class="font-bold text-[16px]">
                        {{ $new?->title_locale }}
                    </p>
                    <p class="font-light text-[14px]">

                    </p>
                    <p class="font-light text-[16px]">
                        {{\Carbon\Carbon::parse($new?->created_at)->toFormattedDateString()}}
                    </p>
                </div>
            @endforeach
        @else
            <span> No Latest News...</span>
        @endif





        {{--<div class="flex flex-col gap-[16px] p-[16px] border-2 shadow rounded-[20px]">
            <div class="w-full">
                <img src="{{asset('images/portal/latest-update.png')}}" class="w-full" alt="Latest Updates" />
            </div>
            <p class="font-bold text-[16px]">
                Suspending settlement during the mid-autumn festival & national day
            </p>
            <p class="font-light text-[14px]">
                Suspending settlement during the mid-autumn festival & national day
            </p>
            <p class="font-light text-[16px]">
                October 3, 2024
            </p>
        </div>--}}
    </div>
</div>
