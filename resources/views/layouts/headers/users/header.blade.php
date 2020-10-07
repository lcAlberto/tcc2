<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="background-size: 100%; background-position: center; background-repeat: no-repeat;
         background-image: url({{asset('/argon/cards/SEMA.Tangren.farmer.grain_.corn_.harvest.ag_.Minn-02.jpg')}});">
    <span class="mask bg-gradient-purple opacity-5"></span>
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h1 class="display-2 text-white"> @lang("labels.$title")</h1>
                @if (isset($description) && $description)
                    <h7 class="text-white font-italic mt-0 mb-5">
                        @lang("labels.$description")
</h7>
                @endif
            </div>
        </div>
    </div>
</div>
