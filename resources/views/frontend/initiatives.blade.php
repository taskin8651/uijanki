@extends('frontend.master')
@section('content')


@if(isset($websiteServices) && $websiteServices->count())

    @foreach($websiteServices as $index => $service)

        @php
            $sectionTypes = [
                'education-awareness',
                'skill-development',
                'vocational-training',
                'career-guidance',
                'women-empowerment',
                'youth-empowerment',
                'community-welfare',
                'social-awareness',
            ];

            $sectionClass = $sectionTypes[$index % count($sectionTypes)];

            $isReverse = $index % 2 == 1;

            $mainBtnClass = str_replace('-', '', $sectionClass) . '-btn-main';
            $softBtnClass = str_replace('-', '', $sectionClass) . '-btn-soft';
        @endphp

        <section class="{{ $sectionClass }}-section">
            <div class="{{ explode('-', $sectionClass)[0] }}-bg-shape {{ explode('-', $sectionClass)[0] }}-bg-shape-1"></div>
            <div class="{{ explode('-', $sectionClass)[0] }}-bg-shape {{ explode('-', $sectionClass)[0] }}-bg-shape-2"></div>

            <div class="container">

                <div class="{{ $sectionClass }}-wrapper">

                    @if($isReverse)
                        {{-- LEFT VISUAL --}}
                        <div class="{{ $sectionClass }}-visual">

                            <div class="{{ explode('-', $sectionClass)[0] }}-image-card">
                                <img src="{{ $service->service_image }}" alt="{{ $service->badge_text ?? 'Service Program' }}">
                            </div>

                            <div class="{{ explode('-', $sectionClass)[0] }}-floating-card {{ explode('-', $sectionClass)[0] }}-card-1">
                                <div class="{{ explode('-', $sectionClass)[0] }}-floating-icon">
                                    <i class="bi bi-book-fill"></i>
                                </div>

                                <div>
                                    <strong>{{ $service->floating_one_title ?? 'Learning Support' }}</strong>
                                    <span>{{ $service->floating_one_subtitle ?? 'Awareness • Motivation' }}</span>
                                </div>
                            </div>

                            <div class="{{ explode('-', $sectionClass)[0] }}-floating-card {{ explode('-', $sectionClass)[0] }}-card-2">
                                <div class="{{ explode('-', $sectionClass)[0] }}-floating-icon green">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>

                                <div>
                                    <strong>{{ $service->floating_two_title ?? 'Better Future' }}</strong>
                                    <span>{{ $service->floating_two_subtitle ?? 'Guidance • Confidence' }}</span>
                                </div>
                            </div>

                            <div class="{{ explode('-', $sectionClass)[0] }}-stats-card">
                                <div>
                                    <h3>{{ $service->stats_title ?? $service->badge_text }}</h3>
                                    <p>{{ $service->stats_subtitle ?? 'Awareness for social change' }}</p>
                                </div>

                                <i class="bi bi-stars"></i>
                            </div>

                        </div>
                    @endif

                    {{-- CONTENT --}}
                    <div class="{{ $sectionClass }}-content">
                        <div class="section-badge">
                            <span><i class="bi bi-book-half"></i></span>
                            {{ $service->badge_text }}
                        </div>

                        <h2>
                            {{ $service->title }}
                            <span>{{ $service->highlight_title }}</span>
                        </h2>

                        <p>
                            {{ $service->description }}
                        </p>

                        <div class="{{ $sectionClass }}-list">

                            <div class="{{ $sectionClass }}-item">
                                <div class="{{ $sectionClass }}-icon">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>

                                <div>
                                    <h4>{{ $service->point_one_title }}</h4>
                                    <p>{{ $service->point_one_text }}</p>
                                </div>
                            </div>

                            <div class="{{ $sectionClass }}-item">
                                <div class="{{ $sectionClass }}-icon green">
                                    <i class="bi bi-people-fill"></i>
                                </div>

                                <div>
                                    <h4>{{ $service->point_two_title }}</h4>
                                    <p>{{ $service->point_two_text }}</p>
                                </div>
                            </div>

                            <div class="{{ $sectionClass }}-item">
                                <div class="{{ $sectionClass }}-icon sky">
                                    <i class="bi bi-compass-fill"></i>
                                </div>

                                <div>
                                    <h4>{{ $service->point_three_title }}</h4>
                                    <p>{{ $service->point_three_text }}</p>
                                </div>
                            </div>

                        </div>

                        <div class="{{ $sectionClass }}-actions">
                            @if($service->button_one_text)
                                <a href="{{ url($service->button_one_link ?? '#') }}" class="btn {{ explode('-', $sectionClass)[0] }}-btn-main">
                                    {{ $service->button_one_text }}
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            @endif

                            @if($service->button_two_text)
                                <a href="{{ url($service->button_two_link ?? '#') }}" class="btn {{ explode('-', $sectionClass)[0] }}-btn-soft">
                                    <i class="bi bi-person-heart"></i>
                                    {{ $service->button_two_text }}
                                </a>
                            @endif
                        </div>
                    </div>

                    @if(!$isReverse)
                        {{-- RIGHT VISUAL --}}
                        <div class="{{ $sectionClass }}-visual">

                            <div class="{{ explode('-', $sectionClass)[0] }}-image-card">
                                <img src="{{ $service->service_image }}" alt="{{ $service->badge_text ?? 'Service Program' }}">
                            </div>

                            <div class="{{ explode('-', $sectionClass)[0] }}-floating-card {{ explode('-', $sectionClass)[0] }}-card-1">
                                <div class="{{ explode('-', $sectionClass)[0] }}-floating-icon">
                                    <i class="bi bi-book-fill"></i>
                                </div>

                                <div>
                                    <strong>{{ $service->floating_one_title ?? 'Learning Support' }}</strong>
                                    <span>{{ $service->floating_one_subtitle ?? 'Awareness • Motivation' }}</span>
                                </div>
                            </div>

                            <div class="{{ explode('-', $sectionClass)[0] }}-floating-card {{ explode('-', $sectionClass)[0] }}-card-2">
                                <div class="{{ explode('-', $sectionClass)[0] }}-floating-icon green">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>

                                <div>
                                    <strong>{{ $service->floating_two_title ?? 'Better Future' }}</strong>
                                    <span>{{ $service->floating_two_subtitle ?? 'Guidance • Confidence' }}</span>
                                </div>
                            </div>

                            <div class="{{ explode('-', $sectionClass)[0] }}-stats-card">
                                <div>
                                    <h3>{{ $service->stats_title ?? $service->badge_text }}</h3>
                                    <p>{{ $service->stats_subtitle ?? 'Awareness for social change' }}</p>
                                </div>

                                <i class="bi bi-stars"></i>
                            </div>

                        </div>
                    @endif

                </div>

            </div>
        </section>

    @endforeach

@else

    <section class="section-padding">
        <div class="container">
            <div class="text-center">
                <h2>No Services Found</h2>
                <p>Please add services from admin panel.</p>
            </div>
        </div>
    </section>

@endif


@endsection