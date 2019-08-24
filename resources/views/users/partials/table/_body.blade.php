<tr>
    <td><img src="<?php echo asset('profiles/' . $user->name) ?>"
             alt="image"
             width="80"
             height="80"
             class="rounded">
    </td>
    <td>{{ $user->name }}</td>
    <td>
        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
    </td>
    <td>{{ $user->created_at->format('d/m/Y as H:i') }}</td>
    <td>
        @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
                @if($v == 'client')
                    <label class="badge badge-primary">{{ $v }}</label>
                @else
                    <label class="badge badge-success">{{ $v }}</label>
                @endif
            @endforeach
        @endif
    </td>
    <td class="btn-group">
        @include('users.partials.table._buttons')
    </td>
</tr>
