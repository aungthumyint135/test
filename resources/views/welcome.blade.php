<x-guest-layout>
    <div class="w-full transition-all ">
        {{--        home--}}
        <div class="heading w-full pb-12 mb-12">
            @include('public.home.heading')
        </div>


        {{--        frame 931--}}
        <div class="bg-white mt-12 flex gap-10 w-full px-12 lg:px-[160px] py-[70px] lg:py-[128px] animated animatedFadeInUp fadeInUp"
             x-intersect:enter="document.getElementById('box1').classList.add('animate-fadeUp')"
             id="box1" >
            @include('public.home.frame931')
        </div>

        {{--        mct payment service 01--}}
        <div class="heading-bg-1 grid grid-cols-12 pt-[32px] pl-4 lg:px-40 lg:pt-[64px] pb-[160px]">
            <div class="col-span-10 md:col-span-6 lg:col-span-4">
                @include('public.home.mct-payment-service01')
            </div>
            <div class="col-auto md:col-span-6 lg:col-span-8"></div>
        </div>


        <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] pt-[64px]">
            @include('public.home.your-mobile-pos')
        </div>

        <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] pt-[64px]">
            @include('public.home.api')
        </div>

        {{--        mct payment service 01--}}
        <div class="w-full ">
            {{--            <div class="col-span-10 w-full md:col-span-6 lg:col-span-4">--}}
            @include('public.home.secure-global-transactions')
            {{--            </div>--}}
            {{--            <div class="col-auto md:col-span-6 lg:col-span-8"></div>--}}
        </div>


        <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] py-[64px]">
            @include('public.home.one-platform-unlimited-global-reach')
        </div>

        <div class="bg-neutral-100 flex gap-10 w-full lg:px-[180px] py-[64px]">
            @include('public.home.why-us')
        </div>


        {{--        mct payment service 01--}}
{{--        <div class="w-full ">--}}
{{--            --}}{{--            <div class="col-span-10 w-full md:col-span-6 lg:col-span-4">--}}
{{--            @include('public.home.remittance-service')--}}
{{--            --}}{{--            </div>--}}
{{--            --}}{{--            <div class="col-auto md:col-span-6 lg:col-span-8"></div>--}}
{{--        </div>--}}

        <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] py-[64px]">
            @include('public.home.seamless-payment')
        </div>




        <div class="bg-neutral-200 flex gap-10 justify-center w-full lg:px-[160px] py-[64px]">
            @include('public.home.clients')
        </div>

        <div class="bg-neutral-100 flex gap-10 justify-center w-full py-[64px]  lg:px-[160px] py-[64px]
        ">
            @include('public.home.last-updates')
        </div>
    </div>

</x-guest-layout>
