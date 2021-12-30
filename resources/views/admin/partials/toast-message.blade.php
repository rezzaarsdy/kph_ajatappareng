@if (session('f_msg'))
    <input type="hidden" name="f_bg"  value="{{ session('f_bg') }}" disabled>
    <input type="hidden" name="f_title"  value="{{ session('f_title') }}" disabled>
    <input type="hidden" name="f_msg"  value="{{ session('f_msg') }}" disabled>

    <script>
        $(document).ready(function() {
            let bg = $("input[name=f_bg]").val();
            let title = $("input[name=f_title]").val();
            let msg = $("input[name=f_msg]").val();
    
            $(document).Toasts('create', {
                class: bg,
                title: title,
                body: msg
            })
        });
    </script>
@endif

@if ($errors->any())

    <div class="error_msgs">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        $(document).ready(function() {
            let msg = $('.error_msgs').clone();
            $('.error_msgs').hide();
    
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Oops, There is something wrong!',
                body: msg
            })
        });
    </script>
@endif