@if ($user->id != auth()->id())
    <form action="{{ route('admin.user.destroy', $user) }}" method="GET">
        @csrf
{{--        @method('delete')--}}

        <a class="btn btn-success" href="{{ route('admin.user.edit', $user) }}">
            <i class="fa fa-pen"></i> @lang('labels.Edit')
        </a>
        <button class="btn btn-danger text-white" type="submit"
           onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
            <i class="fa fa-trash"></i> @lang('labels.Delete')
        </button>
        <a class="btn  btn-primary"
           href="#">
            <i class="fa fa-pen"></i> Ver
        </a>
    </form>
@else
    <a class="btn  btn-success"
       href="{{ route('profile.edit') }}">
        <i class="fa fa-pen"></i> @lang('labels.Edit')
    </a>
@endif