<h1>Список покупателей</h1>

<form action="{{ route('customers.index') }}" method="GET">
    <div class="form-group">
        <label for="blocked">Заблокирован</label>
        <select name="blocked" id="blocked" class="form-control">
            <option value="">Все</option>
            <option value="1"{{ Request::input('blocked') === '1' ? ' selected' : '' }}>Да</option>
            <option value="0"{{ Request::input('blocked') === '0' ? ' selected' : '' }}>Нет</option>
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" value="{{ Request::input('email') }}">
    </div>

    <div class="form-group">
        <label for="phone">Телефон</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ Request::input('phone') }}">
    </div>

    <div class="form-group">
        <label for="name">Имя или фамилия</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ Request::input('name') }}">
    </div>

    <button type="submit" class="btn btn-primary">Применить фильтры</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th>Идентификатор</th>
        <th>Заблокирован</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Телефон</th>
        <th>Email</th>
        <th>Дата и время регистрации</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->blocked ? 'Да' : 'Нет' }}</td>
            <td>{{ $customer->first_name }}</td>
            <td>{{ $customer->last_name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $customers->appends(request()->except('page'))->links() }}
