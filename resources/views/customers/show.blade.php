<h1>{{ $customer->first_name }} {{ $customer->last_name }}</h1>

<p>Заблокирован: {{ $customer->blocked ? 'Да' : 'Нет' }}</p>
<p>Email: {{ $customer->email }}</p>
<p>Телефон: {{ $customer->phone }}</p>
<p>Дата и время регистрации: {{ $customer->registration_date }}</p>

<h2>Адреса покупателя:</h2>
<ul>
    @foreach ($addresses as $address)
        <li>{{ $address->street }}, {{ $address->house }}, {{ $address->apartment }}</li>
    @endforeach
</ul>
