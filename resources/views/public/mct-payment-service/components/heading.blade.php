<div class="flex flex-col gap-[128px]">

    @php
        $headingBg = $heading?->image ? "/storage/".$heading?->image : url('/images/portal/home-heading-bg.jpg');
    @endphp
    <div class="bg-blend-overlay bg-cover bg-center h-[766px] heading-bg flex items-center brightness"
         style="background-image: url('{{$headingBg}}')"
        {{--         style="background-image:  url('{{ asset($heading ? : 'images/portal/home-heading-bg.jpg') }}');"--}}
    >
    </div>

    <div class="flex flex-col justify-center items-center gap-32
{{--    w-[964px]--}}
        w-full
     mx-auto">

        <div class="heading-content container grid grid-cols-12 gap-[32px]
{{--         h-[284px]--}}
          ">
{{--            <img src="{{asset('images/portal/vector.svg')}}" class="h-[100px] mx-auto col-span-12" alt="MCT Logo" />--}}

            <div class="flex flex-col gap-[8px] col-span-12 mx-auto">
                <span class="sub-heading mx-auto">
                MCTPay Payment
            </span>
                <div class="service-heading">
                    Harness the Power of
                    <span class="heading-linear w-fit mx-auto px-1 text-[20px] md:text-heading text-leading-9">Digital Payments</span>
                        and Maximize Your Financial Returns
                </div>

                <span class="service-normal">
                    seamless borderless payments, efficient remittance processing, and robust expense management – all from a single account.
                </span>
            </div>
            <a href="#" class="bg-btn-primary col-span-12 px-[32px] py-[16px] rounded-[16px] mx-auto text-white text-leading-20"> Getting Started</a>

            <div class="flex gap-4 md:gap-2 my-4 col-span-12 md:justify-between sm:justify-center md:flex-row flex-col">
                <img src="{{asset('images/portal/payment-services/heading.png')}}" alt="MCT Payment Service" />
            </div>

        </div>


    </div>
</div>
