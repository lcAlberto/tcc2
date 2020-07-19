<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="background-image: url(../../argon/cards/medicaments.jpg);
     background-position: center; background-size: 100%">
    <span class="mask bg-gradient-purple opacity-3"></span>
    <div class="container">
        <div class="header-body text-left mb-1">
            <div class="row justify-content-left">
                <div class="col-lg-5 col-md-6 ml-lg-4">
                    <h1 class="text-white">@lang("labels.$title")</h1>
                    @if (isset($description) && $description)
                        <h7 class="text-white font-italic mt-0 mb-5">@lang("labels.$description")</h7>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
             xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-primary" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
