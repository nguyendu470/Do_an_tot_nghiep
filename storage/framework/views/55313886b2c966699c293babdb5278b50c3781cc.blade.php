    <div style="display: none;">
        <form action="{{ $endpoint }}" id="payment_form" method="POST">
            @foreach($fields as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
        </form>
    </div>

    <script>
        document.getElementById('payment_form').submit();
    </script>