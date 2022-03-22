<script>
    $(document).ready(function(){

    @error('email1')
            $('html, body').animate({
                scrollTop: $('#section5').offset().top
            }, 'fast');
    @enderror
    @error('message1')
            $('html, body').animate({
                scrollTop: $('#section5').offset().top
            }, 'fast');
    @enderror
    @if (session('status-feedback'))
        $('html, body').animate({
                    scrollTop: $('#section5').offset().top
        }, 'slow');

    @endif
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        },100, 'swing', function () {
        });
    });

    });


    var varCount = 1;
        $(function () {
            $('#addVar').on('click', function(){
                varCount++;
                $node = '<p>'
                  + '<input class="form-control "placeholder="Card number" type="number" name="card_number[]" id="var1">'
                  + '<br>'
                  + '<span class = "removeVar"> Удалить </span> </p>';
                $(this).parent().before($node);
            });
          $('form').on('click', '.removeVar', function(){
            $(this).parent().remove();
          });
        });
    </script>
