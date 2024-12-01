<div class="flex flex-col gap-[128px]">

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

        <div class="heading-content container grid grid-cols-12 gap-[32px]
{{--         h-[284px]--}}
          ">
            <img src="{{asset('images/portal/vector.svg')}}" class="h-[100px] mx-auto col-span-12" alt="MCT Logo" />
            <div class="flex flex-col gap-[8px] col-span-12 mx-auto">
                <span class="heading text-heading-text text-[20px] md:text-heading text-leading-9 tracking-tight-1 leading-[48px]">
                    Empowering Global Businesses with
                </span>

                <span class="heading-linear w-fit mx-auto px-1 text-[20px] md:text-heading text-leading-9">Seamless Payment Solutions</span>
                <div class="text-leading-32 w-3/4 md:w-3/3 text-center mx-auto">
                    <span class="text-leading-9 text-[16px] md:text-[24px] text-white">Optimize your financial operations with secure cross-border payments, virtual accounts, and tailored remittance services</span>
                </div>
            </div>
            <a href="#" class="bg-btn-primary col-span-12 px-[32px] py-[16px] rounded-[16px] mx-auto text-white text-leading-20"> Getting Started</a>

            <div class="flex gap-4 md:gap-2 my-4 col-span-12 md:justify-between sm:justify-center md:flex-row flex-col">
                <div class="w-[300px] md:h-[300px] rounded-[12px] flex-col justify-center bg-white shadow mx-auto">
                    <div class="w-full h-[15px] rounded-t-[12px] p-0 bg-[#F8676E]">
                    </div>

                    <div class="py-[16px]">
                        <img src="{{asset('images/portal/payment.svg')}}" class="h-[50px] w-[50px] mx-auto" alt="Payment" />
                    </div>

                    <div class="flex justify-center items-center flex-col p-[16px] gap-16">
                        <div class="flex justify-center items-center flex-col gap-[8px]">
                            <span class="text-primary-900 w-full font-bold text-[32px] leading-[40px]">Payment</span>
                            <span class="text-primary-900 w-5/6 size-[24px]">Harness the power of digital payments</span>
                        </div>
                        <div class="flex justify-center items-center flex-col font-bold text-[20px]">
                            <a href="#" class="text-btn-primary">Learn more </a>
                        </div>
                    </div>

                </div>

                <div class="w-[300px] md:h-[300px] rounded-[12px] flex-col justify-center bg-white shadow mx-auto">
                    <div class="w-full h-[15px] rounded-t-[12px] p-0 bg-[#9085FA]">
                    </div>

                    <div class="py-[16px]">
                        <img src="{{asset('images/portal/virtual-bank.svg')}}" class="h-[50px] w-[50px] mx-auto" alt="Payment" />
                    </div>

                    <div class="flex justify-center items-center flex-col p-[16px] gap-16">
                        <div class="flex justify-center items-center flex-col gap-[8px]">
                            <span class="text-primary-900 w-full font-bold text-[32px] leading-[40px]">Virtual Bank</span>
                            <span class="text-primary-900 w-5/6 size-[24px]">Comprehensive financial solutions for your business</span>
                        </div>
                        <div class="flex justify-center items-center flex-col font-bold text-[20px]">
                            <a href="#" class="text-btn-primary">Learn more </a>
                        </div>
                    </div>

                </div>

                <div class="w-[300px] md:h-[300px] rounded-[12px] flex-col justify-center bg-white shadow mx-auto">
                    <div class="w-full h-[15px] rounded-t-[12px] p-0 bg-[#B96FCC]">
                    </div>

                    <div class="py-[16px]">
                        <img src="{{asset('images/portal/remittance.svg')}}" class="h-[50px] w-[50px] mx-auto" alt="Payment" />
                    </div>

                    <div class="flex justify-center items-center flex-col p-[16px] gap-16">
                        <div class="flex justify-center items-center flex-col gap-[8px]">
                            <span class="text-primary-900 w-full font-bold text-[32px] leading-[40px]">Remittance</span>
                            <span class="text-primary-900 w-5/6 size-[24px]">Fast, secure and affordable remittance services</span>
                        </div>
                        <div class="flex justify-center items-center flex-col font-bold text-[20px]">
                            <a href="#" class="text-btn-primary">Learn more </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </div>
</div>
