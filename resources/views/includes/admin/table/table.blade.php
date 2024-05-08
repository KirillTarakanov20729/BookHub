<table class="table table-bordered border-primary">
    <thead>
    <tr>
        @include('includes.admin.table.table-columns', ['columns' => $columns])
    </tr>
    </thead>

    <tbody>
    @foreach($entities as $entity)
        <tr>
            <th>{{ $entity->id }}</th>
            <td>{{ $entity->name }}</td>

            @if(isset($entity->email))
                <td>{{ $entity->email }}</td>
            @endif

            @if(isset($entity->genres))
                <td>
                    @foreach($entity->genres as $genre)
                        {{ $genre->name }} <hr>
                    @endforeach
                </td>
            @endif

            @if(isset($entity->authors))
                <td>
                    @foreach($entity->authors as $author)
                        {{ $author->name }} <hr>
                    @endforeach
                </td>
            @endif

            @if(isset($entity->publishers))
                <td>
                    @foreach($entity->publishers as $publisher)
                        {{ $publisher->name }} <hr>
                    @endforeach
                </td>
            @endif

            @if(isset($entity->age_limit))
                <td>{{ $entity->age_limit->age_limit }}+</td>
            @endif

            @if(isset($entity->release_date))
                <td>{{ $entity->release_date->format('Y') }}</td>
            @endif

            @if(isset($entity->subscription_type_id))
                @if($entity->subscription_type_id == 1)
                    <td>Без подписки</td>
                @elseif($entity->subscription_type_id == 2)
                    <td>Базовая подписка</td>
                @else
                    <td>Премиум подписка</td>
                @endif
            @endif

            @if(isset($entity->subscription->subscription_type_id))
                @if($entity->subscription->subscription_type_id == 1)
                    <td>Без подписки</td>
                @elseif($entity->subscription->subscription_type_id == 2)
                    <td>Базовая подписка</td>
                @else
                    <td>Премиум подписка</td>
                @endif
            @endif

            @if(empty($entity->email))
                <td class="col-3">
                    <div class="d-flex justify-content-center">

                        @include('includes.admin.table.table-buttons',['entity' => $entity, 'edit_route' => 'admin.'.$entity->getTable().'.edit',  'delete_route' => 'admin.'.$entity->getTable().'.delete'])

                    </div>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

{{ $entities->links() }}
