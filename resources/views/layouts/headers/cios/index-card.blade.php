<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="
@if(isset($title))
{{--         {{$title == 'Reproductive cycle management' ? "'background-image: url(../../argon/cards/longhorn-2386537_1920.jpg);'" : "'background-image: url(../../argon/cards/cows-954002_1920.jpg);'"}}--}}
@if($title == 'Reproductive cycle management')
    background-image: url(../../argon/cards/longhorn-2386537_1920.jpg);
@else
    background-image: url(../../argon/cards/cows-954002_1920.jpg);
@endif
@endif
    background-position: center; background-size: 100%">
    <span class="mask bg-gradient-indigo opacity-5"></span>
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
