<x-app-layout>

    <!-- Page Container -->
    <div class="container mt-5">
        <!-- The Grid -->
        <div class="row justify-content-center">
            @if ($curriculum)
            <!-- Left Column -->
            <div class="col-md-4">
                <div class="card shadow-sm" style="border-radius:20px;">
                    <div class="card-body text-center">
                        <div class="photo-frame mb-3"
                            style="border: 1.5px solid gray; display: inline-block;border-radius:100%;padding: 4px">
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                style="object-fit: cover; width: 100%; height: auto; max-width: 200px; max-height: 200px; min-width: 200px; min-height: 200px; border-radius: 100%;"
                                alt="Avatar"
                                onerror="this.onerror=null; this.src='{{ asset('assets/img/default-user.svg') }}';">
                        </div>
                        <div class="w3-display-topright w3-text-black" style="position: absolute; top: 10px; right: 10px;">
                            <style>
                            .Btn {
                                display: flex;
                                width: 45px;
                                height: 45px;
                                align-items: center;
                                justify-content: center;
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

                        <h4>{{ $curriculum->name }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Resumo/Objetivo -->
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
                        <h5>Habilidades</h5>
                        @foreach($curriculum->skills as $skill)
                        <p>{{ $skill->name }}</p>
                        <div class="progress mb-2">
                            <div class="progress-bar bg-teal" role="progressbar"
                                style="width: {{ $skill->level * 20 }}%" aria-valuenow="{{ $skill->level * 20 }}"
                                aria-valuemin="0" aria-valuemax="100">{{ $skill->level * 20 }}%</div>
                        </div>
                        @endforeach
                        <br>
                        @endif

                        <!-- Idiomas -->
                        @if ($curriculum->languages->count() > 0)
                        <h5><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Idiomas</h5>
                        @foreach($curriculum->languages as $language)
                        <p>{{ $language->name }}</p>
                        <div class="progress mb-2">
                            <div class="progress-bar bg-teal" role="progressbar"
                                style="width: {{ $language->level * 20 }}%" aria-valuenow="{{ $language->level * 20 }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @endforeach
                        <br>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-8">
                @if ($curriculum->experiences->count() > 0)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><i
                                class="fa fa-suitcase fa-fw w3-margin-right w3-text-teal"></i>Experiência Profissional
                        </h2>
                        <hr />
                        @foreach($curriculum->experiences as $experience)
                        <div class="mb-3">
                            <h4 class="card-text"><i
                                    class="fa fa-building fa-fw w3-margin-right"></i>{{ $experience->employer }}</h4>
                            <p class="card-subtitle mb-2 text-muted">{{ $experience->position }}</p>
                            <p class="card-text"><i
                                    class="fa fa-map-marker fa-fw w3-margin-right"></i>{{ $experience->location }}</p>
                            <p class="card-text"><i
                                    class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $experience->start_date }} -
                                @if($experience->is_current) Atual @else {{ $experience->end_date }} @endif</p>
                            <p>{{ $experience->description }}</p>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if ($curriculum->certifications->count() > 0)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><i
                                class="fa fa-certificate fa-fw w3-margin-right w3-text-teal"></i>Certificações</h2>
                        @foreach($curriculum->certifications as $certification)
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $certification->name }}</h6>
                            <p class="card-text"><i
                                    class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $certification->end_date }}</p>
                            <p>{{ $certification->description }}</p>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if ($curriculum->educations->count() > 0)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><i
                                class="fa fa-graduation-cap fa-fw w3-margin-right w3-text-teal"></i>Educação</h2>
                        @foreach($curriculum->educations as $education)
                        <div class="mb-3">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $education->name }}</h6>
                            <p class="card-text"><i
                                    class="fa fa-calendar fa-fw w3-margin-right"></i>{{ $education->start_date }} -
                                {{ $education->end_date }}</p>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            @else
            <div class="col-md-8 text-center">
                <h1>Sem Currículo</h1>
                <button type="button" class="btn btn-primary"
                    onclick="window.location='{{ route('curricula.create') }}'">Crie um agora mesmo</button>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>