<x-navbar></x-navbar>

@if (isset($success))
    @if ($success)
        <h2>Token gerado com sucesso!</h2>
        <p>Access Token: {{ $response['access_token'] }}</p>
        <p>Expira em: {{ $response['expires_in'] }} segundos</p>
            @else
                <h2>Erro ao obter token</h2>
                <pre>{{ print_r($response, true) }}</pre>
    @endif
@endif



<form method="POST" action="{{ route('spotify.accesstoken') }}">
    @csrf
    <button type="submit">Obter Token</button>
    </div>
</form>