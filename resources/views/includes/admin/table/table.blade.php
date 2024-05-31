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

            @if(isset($entity->name))
                <td>{{ $entity->name }}</td>
            @endif

            @if(isset($entity->full_name))
                <td>{{ $entity->full_name }}</td>
            @endif

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
                        {{ $author->full_name }} <hr>
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

            @if(isset($entity->features))
                <td>
                    @foreach($entity->features as $feature)
                        {{ $feature->name }} <hr>
                    @endforeach
                </td>
            @endif

            @if(isset($entity->age_limit))
                <td>{{ $entity->age_limit->age_limit }}+</td>
            @endif

            @if(isset($entity->price))
                <td>{{ $entity->price }}</td>
            @endif

            @if(isset($entity->release_date))
                <td>{{ $entity->release_date->format('Y') }}</td>
            @endif

            @if(isset($entity->subscription_type))
                <td>{{ $entity->subscription_type->name }}</td>
            @endif

            @if(isset($entity->subscription->subscription_type_id))
                <td> {{ $entity->subscription->subscription_type->name }}</td>
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
