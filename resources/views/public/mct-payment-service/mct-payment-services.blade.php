<x-guest-layout>
    @php
        $headingBg = $heading?->image ? "/storage/".$heading?->image : url('/images/portal/home-heading-bg.jpg');
    @endphp
    <div class="bg-blend-overlay bg-cover bg-center h-[766px] heading-bg flex items-center brightness"
         style="background-image: url('{{$headingBg}}')"
        {{--         style="background-image:  url('{{ asset($heading ? : 'images/portal/home-heading-bg.jpg') }}');"--}}
    >
    </div>

    <div class="flex flex-col justify-center items-center gap-32 pt-24 md:pt-32
{{--    w-[964px]--}}
        w-full
     mx-auto">
        @include('public.mct-payment-service.components.heading')
    </div>

    <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] py-[96px]">
        @include('public.mct-payment-service.components.fast-reliable')
    </div>

    <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] py-[96px]">
        @include('public.mct-payment-service.components.accelerate')
    </div>

    <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] py-[96px]">
        @include('public.mct-payment-service.components.global-connectivity')
    </div>

    <div class="bg-neutral-100 flex gap-10 w-full lg:px-[160px] py-[96px]">
        @include('public.mct-payment-service.components.component-331')
    </div>
</x-guest-layout>
