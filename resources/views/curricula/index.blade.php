<x-app-layout>

    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">
            @if ($curriculum)
            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">
                    <div class="w3-display-container">
                        <div style="min-height:333px;">
                            <div class="photo-frame" style="border: 1.5px solid gray; display: inline-block;border-radius:100%;padding: 4px">
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                    style="object-fit: cover; width: 100%; height: auto; max-width: 200px;max-height:200px; min-width: 200px; min-height: 200px; border-radius: 100%;"
                                    alt="Avatar"
                                    onerror="this.onerror=null; this.src='{{ asset('assets/img/default-user.svg') }}';">
                            </div>
                        </div>
                        <div class="w3-display-topright w3-text-black" style="margin:-15px">
                            <style>
                            .Btn {
                                display: flex;
                                align-items: center;
                                justify-content: flex-start;
                                width: 45px;
                                height: 45px;
                                border: none;
                                border-radius: 50%;
                                cursor: pointer;
                                position: relative;
                                overflow: hidden;
                                transition-duration: .3s;
                                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
                                background-color: rgb(255, 65, 65);
                                transition: 0.4s;
                            }

                            /* plus sign */
                            .sign {
                                width: 100%;
                                transition-duration: .3s;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            .sign svg {
                                width: 17px;
                            }

                            .sign svg path {
                                fill: white;
                            }

                            .Btn:hover {
                                background-color: rgb(255, 15, 15);
                            }

                            .Btn:hover {
                                rotate: 20deg;
                                border-radius: 40px;
                            }

                            .Btn:active {
                                transform: translate(2px, 2px);
                            }
                            </style>
                            <a href="{{ route('curricula.edit', ['curriculum' => $curriculum->id]) }}" class="Btn">
                                <div class="sign">
                                    <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                        <path
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                        </path>
                                    </svg>
                                </div>

                            </a>
                        </div>

                        <div class="w3-display-bottomleft w3-container w3-text-black"
                            style="background: rgba(255,255,255,.8);border-radius:12px;margin:4px">
                            <h4>{{ $curriculum->name }}</h4>
                        </div>
                    </div>
                    <div class="w3-container">
                        <!--Resumo/Objetivo -->
                        <p>{{ $curriculum->summary }}</p>
                        <hr>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->city }}
                            - {{ $curriculum->state }}</p>
                        <p><i
                                class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->email }}
                        </p>
                        <p><i
                                class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $curriculum->phone }}
                        </p>

                        @if ($curriculum->skills->count() > 0 || $curriculum->languages->count() > 0)
                        <hr>
                        @endif

                        <!-- Habilidades -->
                        @if ($curriculum->skills->count() > 0)
                        <h3>Habilidades</h3>
                        @foreach($curriculum->skills as $skill)
                        <p>{{ $skill->name }}</p>
                        <div class="w3-light-grey w3-round-xlarge w3-small">
                            <div class="w3-container w3-center w3-round-xlarge w3-teal"
                                style="width: {{ $skill->level * 20 }}%">{{ $skill->level * 20 }}%</div>
                        </div>
                        @endforeach
                        <br>
                        @endif

                        <!-- Idiomas -->
                        @if ($curriculum->languages->count() > 0)
                        <p class="w3-large w3-text-theme"><b><i
                                    class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Idiomas</b></p>
                        @foreach($curriculum->languages as $language)
                        <p>{{ $language->name }}</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal"
                                style="height:24px; width: {{ $language->level * 20 }}%"></div>
                        </div>
                        @endforeach
                        <br>
                        @endif
                    </div>
                </div>

                <!-- End Left Column -->
            </div>

            <!-- Right Column -->
            <div class="w3-twothird">
                @if ($curriculum->experiences->count() > 0)
                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Experiência
                        Profissional</h2>
                    @foreach($curriculum->experiences as $experience)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $experience->position }}</b></h5>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-building fa-fw w3-margin-right"></i>{{ $experience->employer }}</h6>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-map-marker fa-fw w3-margin-right"></i>{{ $experience->location }}</h6>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $experience->start_date }} -
                            @if($experience->is_current) Atual @else {{ $experience->end_date }} @endif</h6>
                        <p>{{ $experience->description }}</p>
                        <hr>
                    </div>
                    @endforeach
                </div>
                @endif

                @if ($curriculum->certifications->count() > 0)
                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Certificações
                    </h2>
                    @foreach($curriculum->certifications as $certification)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $certification->name }}</b></h5>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $certification->end_date }}</h6>
                        <p>{{ $certification->description }}</p>
                        <hr>
                    </div>
                    @endforeach
                </div>
                @endif

                @if ($curriculum->educations->count() > 0)
                <div class="w3-container w3-card w3-white">
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-graduation-cap fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Educação</h2>
                    @foreach($curriculum->educations as $education)
                    <div class="w3-container">
                        <h5 class="w3-opacity"><b>{{ $education->name }}</b></h5>
                        <h6 class="w3-text-teal"><i
                                class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $education->start_date }} -
                            {{ $education->end_date }}</h6>
                        <hr>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- End Right Column -->
            </div>
            @else
            <h1> Sem Currículo </h1>
            <button type="button" class="btn btn-primary"
                onclick="window.location='{{ route('curricula.create') }}'">Crie um agora mesmo</button>
            @endif
            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

</x-app-layout>