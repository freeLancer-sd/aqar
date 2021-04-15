<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">@lang('models/notifications.fields.title')</th>
        <th scope="col">@lang('models/notifications.fields.type')</th>
        <th scope="col">@lang('models/notifications.fields.stats')</th>
        <th scope="col">@lang('models/notifications.fields.updated_at')</th>
      </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
      <tr>
        <th scope="row">{{$message->id}}</th>
        <td>{{$message->title}}</td>
        <td>{{$message->type}}</td>
        <td>{{$message->stats}}</td>
        <td>{{$message->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
</table>