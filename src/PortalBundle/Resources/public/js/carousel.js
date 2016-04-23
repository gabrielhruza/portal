      $(function() {
        /*$('#carousel-zw').carouFredSel({
          auto: false,
          items: {
            visible: 1,
            start: 1
          }
        });*/
        $a = $('#carousel-txt');
        $b = $('#carousel-fc');

        if( ($a.length + $b.length) != 0)
        {

          $('#carousel-txt').carouFredSel({
            auto: false,
            items: 1,
            scroll: {
              fx: 'fade',
              duration: 2000
            }
          });
          $('#carousel-fc').carouFredSel({
            synchronise: [ ['#carousel-zw'], ['#carousel-txt', false] ],
            items: 1,
            scroll: {
              fx: 'fade',
              duration: 1000,
              timeoutDuration: 3000
            },
            pagination: '#pager',
            prev: '#prev',
            next: '#next'
          });
         }

                
      });

