/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setupStoke2() {
  $('#stoke_calculate').on({
    click: function(e) {
      e.preventDefault();
      
      $table_body = $('#body');
      
      
      
    }
  });
}
function setupStoke() {
  $('#stoke_calculate').on({
    click: function(e) {
      e.preventDefault();
      var $href = $(this).attr('href');
      
      $('<div></div>').load($href+' form', function() {
        // set form
        var $form = $(this).children('form');
        
        //set checkbox
        var $cb = $form.find('input[type="checkbox"]');
        
        // toggle
        $cb.prop('checked', !$cb.prop('checked'));
        
        // form action url
        var $url = $form.attr('action');
        
        // set data
        var $data = $form.serialize();
        
        $.ajax({
          url: $url,
          data: $data,
          method: 'post',
          dataType: 'json',
          cache: false,
          success: function(obj) {
            doSomething();
            console.log(data);
          },
          complete: function() {
            console.log('complete!');
          },
          error: function(err) {
            console.log(err);
          }
        });
        
      });
    }
  });
}

function doSomething() {
  console.log('something done!');
}

$(function() {
  //doSomething();
  //setupStoke();
});


