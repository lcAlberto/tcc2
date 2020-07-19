@if(isset($user->id))
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="background-size: cover;
             background-position: center;
             background-image: url('{{asset($user->thumbnail) }}')">
        <span class="mask bg-gradient-success opacity-5"></span>
        @elseif(($title = 'Detalhes do Tratamento') && isset($animal))
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
                 style="background-size: 100%;
                     background-position: center;
                     background-image: url({{asset('animals/' . $animal->name)}});">
                <span class="mask bg-gradient-dark opacity-3"></span>
                @else
                    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
                         style="background-size: cover;
                             background-position: center;
                             background-image: url({{asset('/argon/close-up-photo-of-brown-cattle-2747287.jpg')}});">
                        <span class="mask bg-gradient-danger opacity-5"></span>
                    @endif
                    <!-- Mask -->
                        <!-- Header container -->
                        <div class="container-fluid d-flex align-items-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="display-2 text-white">{{ $title }}</h1>
                                    @if (isset($description) && $description)
                                        <h7 class="text-white font-italic mt-0 mb-5">{{ $description }}</h7>
                                    @endif
                                    @if(isset($animal) && ($animal->name))
                                        <h2 class="text-white mt-0 mb-2">
                                            <strong>Animal: </strong>
                                            [{{$animal->code}}] - {{$animal->name}}
                                        </h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
