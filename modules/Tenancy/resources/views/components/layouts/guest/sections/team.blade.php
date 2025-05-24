<section id="team">
    <div class="bg-holder z-index-2"
        style="background-image:url(../../assets/img/bg/bg-left-17.png);background-size:auto;background-position:left center;">
    </div>
    <!--/.bg-holder-->
    <div class="bg-holder z-index-2"
        style="background-image:url(../../assets/img/bg/bg-right-17.png);background-size:auto;background-position:right center;">
    </div>
    <!--/.bg-holder-->

    <div class="position-absolute end-0 start-0 top-0">
        <svg class="w-100 text-white" fill="none" preserveAspectRatio="none" viewBox="0 0 1920 368"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M1920 0.44L0 367.74V0H1920V0.44Z" fill="currentColor"></path>
        </svg>
    </div>

    <div class="position-absolute bottom-0 end-0 start-0">
        <svg class="w-100 text-white" fill="none" viewBox="0 0 1920 368" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 368L1920 0.730011L1920 368L0 368Z" fill="currentColor"></path>
        </svg>
    </div>

    <div class="container-small position-relative px-lg-7 px-xxl-3 py-1" style="z-index:10">
        <div class="row">
            <div class="col-12 text-sm-start mb-4 text-center">
                <h4 class="text-primary fw-bolder mb-3">Our Team</h4>
                <h2>Our small team behind our success</h2>
            </div>
            <div class="col-md-6 text-sm-start text-center">
                <p>We have a small but strong development team to follow up on the development process.
                    Reach out to us for further information.</p>
            </div>
            <div class="col-md-6 text-sm-start text-center">
                <p>The team is ready to answer all your questions within minutes. The efficient team is
                    always at your beck and call.</p>
            </div>
        </div>

        <div class="row align-items-center ps-lg-11 pe-lg-9">
            @php
                $team = [
                    [
                        'name' => 'Michael Burton',
                        'position' => 'President, Sr. Developer',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                    [
                        'name' => 'Pastor. Wendy',
                        'position' => 'Product Manager',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                    [
                        'name' => 'Solomon Ochepa',
                        'position' => 'Director of ICT, Sr. Developer',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                    [
                        'name' => 'Edmund Moses',
                        'position' => 'Sr. Developer',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                    [
                        'name' => 'Betty Polycarp',
                        'position' => 'Mid-level. Developer',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                    [
                        'name' => 'Elisha Mustapha',
                        'position' => 'Developer',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                    [
                        'name' => 'Donald Argalma',
                        'position' => 'DevOps, Developer',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                    [
                        'name' => 'Timothy Eldon',
                        'position' => 'Developer',
                        'image' => asset('unknown.webp'),
                        'social' => [
                            'facebook' => '',
                            'x' => '',
                            'linkedin' => '',
                        ],
                    ],
                ];
            @endphp

            @foreach ($team ?? [] as $member)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="position-relative mt-5 text-center">
                        <div class="team-avatar-container d-inline-block position-relative">
                            <div class="bg-holder"
                                style="background-image:url(../../assets/img/bg/bg-21.png);background-size:contain;">
                            </div>
                            <!--/.bg-holder-->
                            <img alt="..." class="img-fluid position-relative mb-3 rounded"
                                src="{{ asset('unknown.webp') }}" />
                        </div>
                        <h4>{{ $member['name'] }}</h4>
                        <h6 class="fw-semi-bold mb-3">{{ $member['position'] }}</h6>

                        <!-- Social -->
                        <a href="javescript://">
                            <span class="fa-brands fa-facebook text-primary me-3"></span>
                        </a>
                        <a href="javescript://">
                            <span class="fa-brands fa-twitter text-primary me-3"></span>
                        </a>
                        <a href="javescript://">
                            <span class="fa-brands fa-linkedin-in text-primary"></span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
