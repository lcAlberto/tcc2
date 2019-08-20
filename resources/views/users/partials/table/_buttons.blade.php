@if ($user->id != auth()->id())
    <form action="{{ route('user.destroy', $user) }}" method="GET">
        @csrf
        {{--@method('delete')--}}

        <a class="btn btn-success" href="{{ route('user.edit', $user) }}">
           <i class="fa fa-pen"></i> @lang('labels.Edit')
        </a>
        <a class="btn btn-danger text-white"
           onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
            <i class="fa fa-trash"></i>  @lang('labels.Delete')
        </a>
    </form>
@else
    <a class="btn  btn-success"
       href="{{ route('profile.edit') }}">
        <i class="fa fa-pen"></i> @lang('labels.Edit')</a>
@endif